<?php

class Invoice extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id') != '2'){
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
		$data['invoice'] = $this->model_invoice->tampil_data_beli();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar3');
		$this->load->view('invoice', $data);
		$this->load->view('templates/footer');
	}
	
	public function detail($id_invoice)
	{
		$id_pembeli = $this->session->userdata('user_id');
		$data['invoice'] = $this->model_invoice->ambil_id_invoice_beli($id_invoice);
		$data['pesanan'] = $this->model_invoice->ambil_id_pesanan_beli($id_pembeli, $id_invoice);
		$data['invoice'] = $this->model_invoice->tampil_data_beli();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar3');
		$this->load->view('detail_invoice', $data);
		$this->load->view('templates/footer');
	}

	public function upload_bukti()
	{
		$catatan	= $this->input->post('catatan');
		$id_invoice	= $this->input->post('id_invoice');

		$gambar	= $_FILES['buktibayar']['name'];
		if ($gambar =''){}else{
			$config['upload_path'] = './uploads/bukti';		
			$config['allowed_types'] ='jpg|jpeg|png|gif';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('buktibayar')){
				echo "bukti bayar gagal di upload!";

			}else {
				$gambar=$this->upload->data('file_name');

			}
		}
		$data = array(
			'id_invoice' => $id_invoice,
			'catatan'	=> $catatan,
			'buktibayar'	=> $gambar
		);
		// var_dump($data);
		// exit();
		//$this->model_invoice->upload_bukti($data, 'tb_bukti');

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
			$this->email->to("isrongans21@gmail.com");
			
			$this->email->subject('Pembayaran pesanan sudah terkonfirmasi');
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

						<p>Kepada admin Ecommerce Fashion Mojokerto, <b></b><hr>
								Silahkan terima data pembayaran.<br><br>
								
									
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
				redirect('invoice');
			}else{
				$hasil = "FALSE";
				//redirect('invoice');
				$this->load->view('invoice_upload');
			}
			return $hasil;

		//redirect('invoice');
	}
}