<?php

class Kategori extends CI_Controller{
	public function lemari_baju()
	{
		$data['lemari_baju'] = $this->model_kategori->data_lemari_baju()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('lemari_baju',$data);
		$this->load->view('templates/footer');
	}

	public function rak_piring()
	{
		$data['rak_piring'] = $this->model_kategori->data_rak_piring()->result();
		$this->load->view('templates/header');
		$this->load->view('templates/sidebar');
		$this->load->view('rak_piring',$data);
		$this->load->view('templates/footer');
	}
}