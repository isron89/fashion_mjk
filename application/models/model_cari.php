<?php
class Model_cari extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}
	public function cariBrg()
	{
		$cari = $this->input->GET('cari', TRUE);
		$data = $this->db->query("SELECT * from tb_barang where nama_brg like '%$cari%' ");
		return $data->result();
	}
 
}