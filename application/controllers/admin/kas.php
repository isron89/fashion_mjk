<?php

class Kas extends CI_Controller{
	
	public function index()
	{
		$data['kas'] = $this->model_kas->tampil_data()->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/kas',$data);
		$this->load->view('templates_admin/footer');
	}
	public function tambah_aksi()
	{
		$tanggal	= $this->input->post('tanggal');
		$keterangan	= $this->input->post('keterangan');
		$saldo	= $this->input->post('saldo');
	
		$data = array(
			'tanggal'	=> $tanggal,
			'keterangan'	=> $keterangan,
			'saldo'	=> $saldo,
		);
		$this->model_kas->tambah_kas($data, 'tb_kas');
		redirect('admin/kas/index');
	}
	public function edit($id)
	{
		$where = array('id_kas'	=>$id);
		$data['kas'] = $this->model_kas->edit_kas($where,'tb_kas')->result();
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/edit_kas', $data);
		$this->load->view('templates_admin/footer');
	}
	public function update(){
		$id 	= $this->input->post('id_kas');
		$tanggal 	= $this->input->post('tanggal');
		$keterangan 	= $this->input->post('keterangan');
		$saldo 	= $this->input->post('saldo');
		
		$data = array(
			'tanggal'	=> $tanggal,
			'keterangan'	=> $keterangan,
			'saldo'		=> $saldo,
			

		);
		$where = array (
			'id_kas' => $id
		);
		$this->model_kas->update_data($where,$data,'tb_kas');
		redirect('admin/kas/index');
	}
	public function hapus($id)
	{
		$where = array('id_kas' => $id);
		$this->model_kas->hapus_data($where, 'tb_kas');
		redirect('admin/kas/index');
	}

}