<?php

class Model_auth extends CI_Model{

	public function cek_login($uname="",$pass="")
	{
		//$username = set_value('username');
		//$password = set_value('password');

		//$password = $this->input->post('password');
		//$data['value']=$this->input->post('password');	 

		$result = $this->db->where('username',$uname)
							//->where('password',$password)
							->limit(1)
							->get('tb_user');


		//$pass = $result->row("password");

			if($result->num_rows() > 0){
				$user = $result->row('user_id');
				$hash = $result->row('password');

				$this->_updateLastLogin($user);
				//$cek = set_value(mysqli_query("SELECT password from tb_user where username = '$username'"));
				//$newpass = sha1($pass);
				if($pass == $hash){
					return $result->row();
				//return TRUE;
				}
				else{
					return array();
				}

			}
			else{
				//return FALSE;
				return array();
			}

	}

	private function _updateLastLogin($user_id){
        $sql = "UPDATE tb_user SET user_last_login=now() WHERE user_id='$user_id'";
        $this->db->query($sql);
    }
}