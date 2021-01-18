<?php 

class Model_kategori extends CI_Model{

	public function data_baju(){
		return $this->db->get_where("tb_barang",array('kategori' =>'Baju'));
	}

	public function data_jaket(){
		return $this->db->get_where("tb_barang",array('kategori' =>'Jaket'));
	}

	public function data_celana(){
		return $this->db->get_where("tb_barang",array('kategori' =>'Celana'));
	}
	public function data_sepatu(){
		return $this->db->get_where("tb_barang",array('kategori' =>'Sepatu'));
	}
	public function data_batik(){
		return $this->db->get_where("tb_barang",array('kategori' =>'Batik'));
	}
}