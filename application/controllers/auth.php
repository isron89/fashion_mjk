<?php

class Auth extends CI_Controller {

	public function login()
	{


		$this->form_validation->set_rules('username','Username','required',['required' => 'Username wajib diisi!']);
		$this->form_validation->set_rules('password','Password','required',['required' => 'Password wajib diisi!']);
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('templates/header');
			$this->load->view('form_login');
			$this->load->view('templates/footer2');
		}else{
			$uname = $this->input->post('username');
			$pass = $this->input->post('password');
			$pwd_hashed = md5($pass*89);
			
			$auth = $this->model_auth->cek_login($uname,$pwd_hashed);
			if($auth == FALSE)
			{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  				Username atau Password Anda Salah!
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
		</div>');
				redirect('auth/login');
			}else{
				if($auth->user_aktif == 1){
				$this->session->set_userdata('user_id',$auth->user_id);
				$this->session->set_userdata('username',$auth->username);
				$this->session->set_userdata('role_id',$auth->role_id);
				switch($auth->role_id){
					case 1 : redirect('admin/dashboard_admin');
						break;
					case 2 : redirect('dashboard');
						break;
					case 3 : redirect('penjual/dashboard_penjual');
						break;
					default: break;
					}
				}
				else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  				Akun anda belum aktif!
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
		</div>');
				redirect('auth/login');
				}
			}
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login');
	}
}