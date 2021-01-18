<?php 

public function send_email()
	{
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
		   	$config['smtp_user']= "gmail@gmail.com"; // isi dengan email kamu
		   	$config['smtp_pass']= "gmailpass"; // isi dengan password kamu

		    $config['crlf']="\r\n"; 
		    $config['newline']="\r\n"; 
		    $config['wordwrap'] = TRUE;
		    //memanggil library email dan set konfigurasi untuk pengiriman email
		   
		    $this->email->initialize($config);
		    //konfigurasi pengiriman
		    $this->email->from($config['smtp_user']);
			// $this->email->from('syndicatemore@gmail.com', 'Administrator PPID');
			$this->email->to($_POST['reg_email']);
			
			$this->email->subject('Mohon Aktifasi Akun Pemohon Informasi PPID user');
			$message = "<html><head>
						<style>
						table { border-collapse: collapse; width: 100%;	}
						th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd;	}
						hr{	background: #ccc; }
						</style>
						</head><body>
						<div style='border:1px #ccc solid;padding:5px 15px;margin:auto;width:600px;height:auto;font-family: Arial, Helvetica, sans-serif'>
						<div style='background:#007cc4;width:100%;height:5px'></div>
						<p><img src='".base_url()."assets/images/logoppid.png'></p>

						<p>kepada calon user Pemohon PPID, NIK = <b> ".$_POST['reg_nik']."</b><hr>
								Mohon verifikasi alamat email Anda dengan cara menekan tombol di bawah. Email yang telah diverifikasi akan mempermudah kami untuk mengaktifkan akun Anda.<br><br>
								<table >
									<tr>
										<td>NIK</td>
										<td>:</td>
										<td><b>".$_POST['reg_nik']."</b></td>
									</tr>
									<tr>
										<td>Nama</td>
										<td>:</td>
										<td><b>".$_POST['reg_nama']."</b></td>
									</tr>
									<tr>
										<td>username</td>
										<td>:</td>
										<td><b>".$_POST['reg_email']."</b></td>
									</tr>
									<tr>
										<td>password</td>
										<td>:</td>
										<td><b>**</b></td>
									</tr>
								</table>
									<br><br>
									<a style='padding: 10px 25px; background: #42b549; color: #fff; text-decoration: none; display: inline-block; border-radius: 2px;margin-left:230px' href='".base_url()."permohonan/verification/".$_POST['reg_nik']."' target='_blank'>Verifikasi E-mail</a> 
									<br><br>
									Mohon segera mengisi berkas data diri untuk validasi Pemohon. 
									<hr>
									<span style='font-size:0.7em'>Email dibuat secara otomatis. Mohon tidak mengirimkan balasan ke email ini.</span> <br> <br>
									Terima Kasih. Admin PPID</p>
						</div>
						</body></html>";			
			$this->email->message($message);

			if($this->email->send()){
				$hasil = "TRUE";
				
			}else{
				$hasil = "FALSE";
				
			}
			return $hasil;
	}
?>