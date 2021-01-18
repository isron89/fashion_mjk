<?php
/**
  * 
  */
 class kelola_penjual extends CI_Controller{
 	
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
		$data['penjual'] = $this->model_user->tampil_data_penjual()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/kelola_penjual',$data);
		$this->load->view('templates_admin/footer');
	}

	public function edit($id)
	{
		$where = array('user_id'	=>$id);
		$data['akun'] = $this->model_user->edit_user($where,'tb_user')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_penjual', $data);
		$this->load->view('templates_admin/footer');
 	}

 	public function update(){
		$user_id 	= $this->input->post('user_id');
		$nama 	= $this->input->post('nama');
		$nik 	= $this->input->post('nik');
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
			'nik'	=> $nik,
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
		redirect('admin/kelola_penjual/index');
	}

	public function hapus($id)
	{
		$where = array('user_id' => $id);
		$this->model_user->hapus_data($where, 'tb_user');
		redirect('admin/kelola_penjual/index');
	}

	

	public function ceknik($nik){
		// var_dump($nik);
		// exit();
		function callAPI($method, $url, $data){
   		$curl = curl_init();
   		switch ($method){
      	case "POST":
        	curl_setopt($curl, CURLOPT_POST, 1);
        	if ($data)
            	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
         	break;
      	case "PUT":
         	curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
         	if ($data)
            	curl_setopt($curl, CURLOPT_POSTFIELDS, $data);			 			
        	break;
      	default:
         	if ($data)
            	$url = sprintf("%s?%s", $url, http_build_query($data));
   		}
   		// OPTIONS:
   		curl_setopt($curl, CURLOPT_URL, $url);
   		curl_setopt($curl, CURLOPT_HTTPHEADER, array(
      		'x-api-key: f99aecef3d12e02dcbb6260bbdd35189c89e6e73',
      		'Content-Type: application/json',
   		));
   		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   		curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   		// EXECUTE:
   		$result = curl_exec($curl);
   		if(!$result){die("Connection Failure");}
   		curl_close($curl);
   		return $result;
		}

		$get_data = callAPI('GET', '192.168.33.204/rest-dummy/Kota?nik='.$nik, false);
		$response = json_decode($get_data, true);
		//$respon = 3516123008990001;
		// var_dump($response);
		// exit();
		if($response == true){

			$status = 1;
			$data = array(
				'user_aktif'	=> 1		
			);
			$where = array (
				'nik' => $nik
			);
			$this->model_user->update_data($where,$data,'tb_user');
			redirect('admin/kelola_penjual/index');
		}else{
			$status = 0;
			redirect('admin/kelola_penjual/index');

		}
		//$errors = $response['response']['errors'];
		//$data = $response['response']['data'][0];
		
	}
 } 
 ?>