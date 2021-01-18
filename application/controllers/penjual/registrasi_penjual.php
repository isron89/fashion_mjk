<?php

class Registrasi_penjual extends CI_Controller{

	public function index()
	{
		$this->form_validation->set_rules('nama','Nama','required',['required' => 'Nama Wajib diisi!']);
		$this->form_validation->set_rules('nik','NIK','required',['required' => 'NIK Wajib diisi!']);
		$this->form_validation->set_rules('alamat','Alamat','required',['required' => 'Alamat Wajib diisi!']);
		$this->form_validation->set_rules('no_hp','No HP','required',['required' => 'No HP Wajib diisi!']);
		$this->form_validation->set_rules('email','Email','required',['required' => 'Email Wajib diisi!']);
		$this->form_validation->set_rules('username','Username','required',['required' => 'Username Wajib diisi!']);
		$this->form_validation->set_rules('password_1','Password','required|matches[password_2]',['required' => 'Password Wajib diisi!',
			'matches' => 'Password tidak cocok']);
		$this->form_validation->set_rules('password_2','Password','required|matches[password_1]');
		if($this->form_validation->run() == FALSE){
		$this->load->view('templates_penjual/header');
		$this->load->view('penjual/registrasi_penjual');
		$this->load->view('templates_penjual/footer2');
	}else { 
		//$pepper = getConfigVariable("pepper");
		$pwd = $_POST['password_1'];
		//$pwd_peppered = hash_hmac("sha256", $pwd, $pepper);
		$pwd_hashed = md5($pwd*89);
		$data = array(
			'user_id' => '',
			'nama' => $this->input->post('nama'),
			'nik' => $this->input->post('nik'),
			'user_alamat' => $this->input->post('alamat'),
			'user_no_hp' => $this->input->post('no_hp'),
			'email' => $this->input->post('email'),
			'username' => $this->input->post('username'),
			'password' => $pwd_hashed,
			'role_id' => 3,
		);
		$this->db->insert('tb_user',$data);

		$this->load->library('email');

			$config = array();
		    $config['charset'] = 'utf-8';
		    $config['useragent'] = 'Codeigniter';
		    $config['protocol']= "smtp";
		    $config['mailtype']= "html";
		    // $config['smtp_host']= "ssl://smtp.mojokertokota.go.id";//pengaturan smtp
		    // $config['smtp_port']= "25";
		    $config['smtp_host']= "ssl://smtp.gmail.com";//pengaturan smtp
		    $config['smtp_port']= "465";
		    $config['smtp_timeout']= "400";
		    // $config['smtp_user']= "diskominfo@mojokertokota.go.id"; // isi dengan email kamu
		   	// $config['smtp_pass']= "d1skom1nf"; // isi dengan password kamu
		   	$config['smtp_user']= "noobtester89@gmail.com"; // isi dengan email kamu
		   	$config['smtp_pass']= "isronARBOT89"; // isi dengan password kamu

		    $config['crlf']="\r\n"; 
		    $config['newline']="\r\n"; 
		    $config['wordwrap'] = TRUE;
		    //memanggil library email dan set konfigurasi untuk pengiriman email
		   
		    $this->email->initialize($config);
		    //konfigurasi pengiriman
		    $this->email->from($config['smtp_user']);
			// $this->email->from('syndicatemore@gmail.com', 'Administrator PPID');
			$this->email->to($_POST['email']);
			
			$this->email->subject('Mohon Aktivasi Akun Fashion Mojokerto');
			$message = "<html><head>
						<style>
						table { border-collapse: collapse; width: 100%;	}
						th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd;	}
						hr{	background: #ccc; }
						</style>
						</head><body>
						<div style='border:1px #ccc solid;padding:5px 25px;margin:auto;width:600px;height:auto;font-family: Arial, Helvetica, sans-serif'>
						<div style='background:#007cc4;width:100%;height:50px'></div>
						<p><img src='".base_url()."assets/img/mojo.png'></p>

						<p>Kepada member Ecommerce Fashion Mojokerto, <b> ".$_POST['nama']."</b><hr>
								Mohon tunggu, tim Fashion Mojokerto akan verifikasi akun. Silahkan tekan tombol verifikasi dibawah untuk memastikan ini akun anda.<br><br>
								<table >
									<tr>
										<td>Nama</td>
										<td>:</td>
										<td><b>".$_POST['nama']."</b></td>
									</tr>
									<tr>
										<td>NIK</td>
										<td>:</td>
										<td><b>".$_POST['nik']."</b></td>
									</tr>
									<tr>
										<td>Nomor Telepon</td>
										<td>:</td>
										<td><b>".$_POST['no_hp']."</b></td>
									</tr>
									<tr>
										<td>username</td>
										<td>:</td>
										<td><b>".$_POST['username']."</b></td>
									</tr>
									<tr>
										<td>password</td>
										<td>:</td>
										<td><b>".$_POST['password_1']."</b></td>
									</tr>
								</table>
									<br><br>
									<a style='padding: 10px 25px; background: #42b549; color: #fff; text-decoration: none; display: inline-block; border-radius: 2px;margin-left:230px' href='".base_url()."api/oke".$_POST['username']."' target='_blank' rel='noopener'rel='norefferer'>Verifikasi E-mail</a> 
									<br><br>
									
									<hr>
									<span style='font-size:0.7em'>Email dibuat secara otomatis. Mohon tidak mengirimkan balasan ke email ini.</span> <br> <br>
									Terima Kasih. Admin Fashion Mojokerto</p>
						</div>
						</body>
						</div>
						</body></html>";			
			$this->email->message($message);

			if($this->email->send()){
				$hasil = "TRUE";
				redirect('auth/login');
			}else{
				$hasil = "FALSE";
				redirect('penjual/register_penjual');
			}
			return $hasil;

	}
}
}