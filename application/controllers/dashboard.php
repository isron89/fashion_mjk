<?php

class Dashboard extends CI_Controller{
	

	public function index()
	{
		$data=array();
		$data['barang'] = $this->model_barang->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar3');
		$this->load->view('dashboard', $data);
		$this->load->view('templates/footer');
	}
	
	public function tambah_ke_keranjang($id)
	{
		$barang = $this->model_barang->find($id);

		$data = array(
        'id'      => $barang->id_brg,
        'qty'     => 1,
        'price'   => $barang->harga,
        'name'    => $barang->nama_brg
        
		);

	$this->cart->insert($data);
	redirect('dashboard');
	}

	public function tambah_keranjang_det()
	{
		
		$id = $this->input->post('id_brg');
		$qt = $this->input->post('qtyy');
		// var_dump($id);
		// exit();
		$barang = $this->model_barang->find($id);
		$data = array(
        'id'      => $id,
        'qty'     => $qt,
        'price'   => $barang->harga,
        'name'    => $barang->nama_brg
        
		);
		$this->cart->insert($data);
		redirect('dashboard/index');
	}

	public function detail_keranjang()
	{
		//$hasil = $this->cart->contents();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar3');
		$this->load->view('keranjang');
		$this->load->view('templates/footer');
	}

	public function hapus_keranjang()
	{
		$this->cart->destroy();
		redirect('dashboard/index');
	}

	public function pembayaran()
	{
		if($this->session->userdata('role_id') != '2'){
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  				Anda Belom Login!
  				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    			<span aria-hidden="true">&times;</span>
  			</button>
		</div>');
			redirect('auth/login');
		}

		$sesi = $this->session->userdata('username');
		// var_dump($sesi);
		// exit();
		//$data['beli'] = $this->model_user->tampil_data_pembelian($sesi)->result();
		$where = array('username' => $sesi);
		$data['akun'] = $this->model_user->tampil_user_beli($where,'tb_user')->result();

		$this->load->view('templates/header');
		$this->load->view('templates/sidebar3');
		$this->load->view('pembayaran',$data);
		$this->load->view('templates/footer');
	}

	public function proses_pesanan()
	{
		$hasil = $this->cart->contents();
		// echo "<pre>";
		// var_dump($hasil);
		// echo "</pre>";
		// exit();
		$is_processed = $this->model_invoice->index();
		if($is_processed){
			$this->cart->destroy();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar3');
		$this->load->view('pembayaran');
		$this->load->view('templates/footer');
	}else{
		echo "Maaf,Pesanan Anda Gagal Diproses ";
		
	}
	}

	public function detail($id_brg)
	{
		$data['barang'] = $this->model_barang->detail_brg($id_brg);
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar3');
		$this->load->view('detail_barang',$data);
		$this->load->view('templates/footer');
	}

	function remove($id) {  
	$this->load->library('cart');
    $data = array(
        'rowid'   		=> $id,
        'qty'     	=> 0
    );

    $this->cart->update($data);
    // var_dump($data);
    // exit;
    redirect('dashboard/detail_keranjang');
	}

}