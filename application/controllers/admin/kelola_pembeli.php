<?php
/**
  * 
  */
 class kelola_pembeli extends CI_Controller{
 	
 	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id') != '1'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  				Anda Belom Login!
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
		</div>');
			redirect('auth/login');
		}
	}

	public function index()
	{
		$data['pembeli'] = $this->model_user->tampil_data_pembeli()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/kelola_pembeli',$data);
		$this->load->view('templates_admin/footer');
	}
	public function edit($id)
	{
		$where = array('user_id'	=>$id);
		$data['akun'] = $this->model_user->edit_user($where,'tb_user')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_pembeli', $data);
		$this->load->view('templates_admin/footer');
 	}

 	public function update(){
		$user_id 	= $this->input->post('user_id');
		$nama 	= $this->input->post('nama');
		$email 	= $this->input->post('email');
		$password 	= $this->input->post('password');
		$username	= $this->input->post('username');
		$user_alamat 	= $this->input->post('user_alamat');
		$user_no_hp 	= $this->input->post('user_no_hp');
		$user_last_login 	= $this->input->post('user_last_login');
		$user_create 	= $this->input->post('user_create');

		$passmd5 = md5($password*89);
		$data = array(
			'nama'	=> $nama,
			'email'	=> $email,
			'username'	=> $username,
			'password'	=> $passmd5,
			'user_alamat'	=> $user_alamat,
			'user_no_hp'		=> $user_no_hp,
			'user_last_login'		=> $user_last_login,
			'user_create'	=> $user_create
		);
		$where = array (
			'user_id' => $user_id
		);
		$this->model_user->update_data($where,$data,'tb_user');
		redirect('admin/kelola_pembeli/index');
	}

	public function hapus($id)
	{
		$where = array('user_id' => $id);
		$this->model_user->hapus_data($where, 'tb_user');
		redirect('admin/kelola_pembeli/index');
	}

	} 
 ?>