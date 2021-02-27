<?php

class Data_barang extends CI_Controller{
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
		$usr = $this->session->userdata('username');
		$userr = $this->model_user->tampil_data_pembelian($usr);
		$userrr = $userr->user_id;

		$data['datambah'] = $this->model_barang->tampil_kat();
		$data['barang'] = $this->model_barang->tampil_data_penjual($userrr)->result();

		$this->load->view('templates_penjual/header');
		$this->load->view('templates_penjual/sidebar');
		$this->load->view('penjual/data_barang', $data);
		$this->load->view('templates_penjual/footer');
	}
	public function tambah_aksi()
	{
		$usr = $this->session->userdata('username');
		$userr = $this->model_user->tampil_data_pembelian($usr);
		$userrr = $userr->user_id;

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
			'id_penjual' => $userrr,
			'nama_brg'	=> $nama_brg,
			'keterangan'	=> $keterangan,
			'kategori'	=> $kategori,
			'harga'	=> $harga,
			'stok'	=> $stok,
			'gambar'	=> $gambar
		);
		$this->model_barang->tambah_barang($data, 'tb_barang');
		redirect('penjual/data_barang/index');
	}
	public function edit($id)
	{
		$where = array('id_brg'	=>$id);
		$data['barang'] = $this->model_barang->edit_barang($where,'tb_barang')->result();
		$data['dataku'] = $this->model_barang->tampil_kat();
		$this->load->view('templates_penjual/header');
		$this->load->view('templates_penjual/sidebar');
		$this->load->view('penjual/edit_barang', $data);
		$this->load->view('templates_penjual/footer');
	}
	public function update(){
		$id 	= $this->input->post('id_brg');
		$nama_brg 	= $this->input->post('nama_brg');
		$keterangan 	= $this->input->post('keterangan');
		$kategori 	= $this->input->post('kategori');
		$harga 	= $this->input->post('harga');
		$stok 	= $this->input->post('stok');
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
			'kategori'		=> $kategori,
			'harga'		=> $harga,
			'stok'	=> $stok,
			//'gambar'	=> $gambar
		);
		$where = array (
			'id_brg' => $id
		);
		$this->model_barang->update_data($where,$data,'tb_barang');
		redirect('penjual/data_barang/index');
	}
	public function hapus($id)
	{
		$where = array('id_brg' => $id);
		$this->model_barang->hapus_data($where, 'tb_barang');
		redirect('penjual/data_barang/index');
	}
}