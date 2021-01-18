<?php

class Invoice extends CI_Controller{
	public function __construct(){
		parent::__construct();
		if($this->session->userdata('role_id') != '3'){
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
		$data['invoice'] = $this->model_invoice->tampil_data_jual();
		// var_dump($data);
		// exit();
		if($data['invoice']){
		$this->load->view('templates_penjual/header');
		$this->load->view('templates_penjual/sidebar');
		$this->load->view('penjual/invoice', $data);
		$this->load->view('templates_penjual/footer');
		}
		else{
			$this->load->view('templates_penjual/header');
			$this->load->view('templates_penjual/sidebar');
			$this->load->view('penjual/invoice_false');
			$this->load->view('templates_penjual/footer');
		}
		
	}
	
	public function detail($id_invoice)
	{
		$id_penjual = $this->session->userdata('user_id');
		$data['invoice'] = $this->model_invoice->ambil_id_invoice_jual($id_invoice);
		$data['pesanan'] = $this->model_invoice->ambil_id_pesanan_jual($id_penjual, $id_invoice);
		$data['invoice'] = $this->model_invoice->tampil_data_jual();
		$this->load->view('templates_penjual/header');
		$this->load->view('templates_penjual/sidebar');
		$this->load->view('penjual/detail_invoice', $data);
		$this->load->view('templates_penjual/footer');
	}
}