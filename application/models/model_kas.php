<?php

class Model_kas extends CI_Model{
	public function tampil_data(){
		return $this->db->get('tb_kas');
	}
	public function tambah_kas($data,$table){
		$this->db->insert($table,$data);
	}
	
	public function edit_kas($where,$table){
		return $this->db->get_where($table,$where);
	}
	public function update_data($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}
	public function hapus_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function find($id)
	{
		$result = $this->db->where('id_kas', $id) 
						->limit(1)
						->get('tb_kas');
		if($result->num_rows() > 0){
			return $result->row();
		}else{
			return array();
		}
	}
	public function detail_kas($id_kas)
	{
		$result = $this->db->where('id_kas',$id_kas)->get('tb_kas');
		if($result->num_rows() > 0){
			return $result->result();
		}else {
			return false;

		}
	}
}