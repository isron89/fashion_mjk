<?php

class Cari_barang extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->helper("url");
		$this->load->model('Model_cari');
	}
	public function index()
	{
		$data = $this->model_cari->tampil_data()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar3');
		$this->load->view('cari_barang', $data);
		$this->load->view('templates/footer');
	}

	public function cari() 
	{
		$this->load->view('cari_barang');
	}

	public function hasil()
	{
		$data2['cari'] = $this->Model_cari->cariBrg();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar3');
		$this->load->view('result', $data2);
		$this->load->view('templates/footer');
	}

	public function tambah_aksi()
	{
		$nama_brg	= $this->input->post('nama_brg');
		$keterangan	= $this->input->post('keterangan');
		$kategori	= $this->input->post('kategori');
		$harga	= $this->input->post('harga');
		$stok	= $this->input->post('stok');
		$gambar	= $_FILES['gambar']['name'];
		if ($gambar =''){}else{
			$config['upload_path'] = './uploads';		
			$config['allowed_types'] ='jpg|jpeg|png|gif';
			$this->load->library('upload', $config);
			if(!$this->upload->do_upload('gambar')){
				echo "gambar gagal di upload!";

			}else {
				$gambar=$this->upload->data('file_name');

			}
		}
		$data = array(
			'nama_brg'	=> $nama_brg,
			'keterangan'	=> $keterangan,
			'kategori'	=> $kategori,
			'harga'	=> $harga,
			'stok'	=> $stok,
			'gambar'	=> $gambar
		);
		$this->model_barang->tambah_barang($data, 'tb_barang');
		redirect('admin/data_barang/index');
	}
	public function edit($id)
	{
		$where = array('id_brg'	=>$id);
		$data['barang'] = $this->model_barang->edit_barang($where,'tb_barang')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar3');
		$this->load->view('admin/edit_barang', $data);
		$this->load->view('templates_admin/footer');
	}
	public function update(){
		$id 	= $this->input->post('id_brg');
		$nama_brg 	= $this->input->post('nama_brg');
		$keterangan 	= $this->input->post('keterangan');
		$kategori 	= $this->input->post('kategori');
		$harga 	= $this->input->post('harga');
		$stok 	= $this->input->post('stok');
		$data = array(
			'nama_brg'	=> $nama_brg,
			'keterangan'	=> $keterangan,
			'kategori'		=> $kategori,
			'harga'		=> $harga,
			'stok'	=> $stok

		);
		$where = array (
			'id_brg' => $id
		);
		$this->model_barang->update_data($where,$data,'tb_barang');
		redirect('admin/data_barang/index');
	}
	public function hapus($id)
	{
		$where = array('id_brg' => $id);
		$this->model_barang->hapus_data($where, 'tb_barang');
		redirect('admin/data_barang/index');
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
	public function detail_keranjang()
	{
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
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar3');
		$this->load->view('pembayaran');
		$this->load->view('templates/footer');
	}
	public function proses_pesanan()
	{
		$is_processed = $this->model_invoice->index();
		if($is_processed){
			$this->cart->destroy();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar3');
		$this->load->view('proses_pesanan');
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
}