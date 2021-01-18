<?php

class Model_invoice extends CI_Model{
	public function index()
	{


		date_default_timezone_set('Asia/Jakarta');
		$nama = $this->input->post('nama');
		$alamat = $this->input->post('alamat');
		$pembeli = $this->session->userdata('user_id');
		foreach($this->cart->contents() as $itemm){
		$query = $this->db//->select('id_penjual')
                			->where('id_brg', $itemm['id'])
                			->get('tb_barang');

        $hasil = $query->row();

        // var_dump($hasil->id_penjual);
        // exit();
		$invoice = array (
			'id_pembeli' => $pembeli,
			'id_penjual' => $hasil->id_penjual,
			'nama' => $nama,
			'alamat' => $alamat,
			'tgl_pesan' => date('Y-m-d H:i:s'),
			'batas_bayar' => date('Y-m-d H:i:s', mktime(date('H'),date('i'),date('s'),date('m'),date('d') + 1, date('Y'))),
			'konfirmasi' => 0,
		);
		$this->db->insert('tb_invoice', $invoice);
		$id_invoice = $this->db->insert_id();
		}

		foreach($this->cart->contents() as $item){
			$pembeli = $this->session->userdata('user_id');
			$query = $this->db//->select('id_penjual')
                			->where('id_brg', $itemm['id'])
                			->get('tb_barang');

        	$hasil = $query->row();

			$data = array(
				'id_invoice' => $id_invoice,
				'id_brg' => $item['id'],
				'id_pembeli' => $pembeli,
				'id_penjual' => $hasil->id_penjual,
				'nama_brg' => $item['name'],
				'jumlah' => $item['qty'],
				'harga' => $item['price'],
			);
			$this->db->insert('tb_pesanan', $data);
		}
		return TRUE;
	}

	public function tampil_data()
	{
		$result = $this->db->get('tb_invoice');
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	}

	public function tampil_data_jual()
	{
		$id_penjual = $this->session->userdata('user_id');
		$result = $this->db->where('id_penjual',$id_penjual)
							->get('tb_invoice');
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	}

	public function tampil_data_beli()
	{
		$id_pembeli = $this->session->userdata('user_id');
		$result = $this->db->where('id_pembeli',$id_pembeli)
							->get('tb_invoice');
		if($result->num_rows() > 0){
			return $result->result();
		}else{
			return false;
		}
	}

	public function ambil_id_invoice($id_invoice)
	{
		$result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
		if($result->num_rows() > 0){
			return $result->row();
		}else {
			return false;
		}
	}

	public function ambil_id_invoice_jual($id_invoice)
	{
		$result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
		if($result->num_rows() > 0){
			return $result->row();
		}else {
			return false;
		}
	}

	public function ambil_id_invoice_beli($id_invoice)
	{
		$result = $this->db->where('id', $id_invoice)->limit(1)->get('tb_invoice');
		if($result->num_rows() > 0){
			return $result->row();
		}else {
			return false;
		}
	}

	public function ambil_id_pesanan($id_invoice)
	{
		$result = $this->db->where('id_invoice', $id_invoice)
							->get('tb_pesanan');
		if($result->num_rows() > 0){
			return $result->result();
		}else {
			return false;
		}
	}

	public function ambil_id_pesanan_jual($id_penjual, $id_invoice)
	{
		$result = $this->db->where('id_penjual', $id_penjual)
							->where('id_invoice', $id_invoice)
							->get('tb_pesanan');
		if($result->num_rows() > 0){
			return $result->result();
		}else {
			return false;
		}
	}

	public function ambil_id_pesanan_beli($id_pembeli, $id_invoice)
	{
		$result = $this->db->where('id_pembeli', $id_pembeli)
							->where('id_invoice', $id_invoice)
							->get('tb_pesanan');
		if($result->num_rows() > 0){
			return $result->result();
		}else {
			return false;
		}
	}

	public function upload_bukti($data,$table){
		$this->db->insert($table,$data);
	}
}