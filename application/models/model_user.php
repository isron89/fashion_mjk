<?php 

/**
 * 
 */
class Model_user extends CI_Model{
	
	public function tampil_data_pembeli()
	{
		return $this->db->where('role_id',2)
						->get('tb_user');
	}

	public function tampil_data_pembelian($user)
	{
		$result = $this->db->where('username', $user) 
							->limit(1)
							->get('tb_user');
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}
	}

	public function tampil_data_penjual()
	{
		return $this->db->where('role_id',3)
						->get('tb_user');
	}

	public function edit_user($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function tampil_user_beli($where,$table){
		return $this->db->get_where($table,$where);
	}

	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function user($uname) 
        {
            //$user_id = $this->session->userdata('id');
            // $query = $this->db->query("SELECT user_id FROM tb_user WHERE username = $uname "); 
            // return $query;
            return $this->db->get_where("tb_user",array('username' =>$uname));

        }
}

 ?>