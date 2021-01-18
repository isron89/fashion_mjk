<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>Edit Data Barang</h3>

	<?php foreach($barang as $brg) : ?>
		<form method="post" action="<?php echo base_url(). 'penjual/data_barang/update' ?>">
			<div class="for-group">
				<div class="card ml-3" style="width: 32rem;">
				<label>Gambar Barang</label>
				<img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="card-img-top" >
				<input type="file" id="gambar" name="gambar" class="form-control-file" >
				</div>
			</div>
			<div class="for-group">
				<label>Nama Barang</label>
				<input type="text" name="nama_brg" class="form-control" value="<?php echo $brg->nama_brg ?>">
			</div>
			<div class="for-group">
				<label>Keterangan</label>
				<input type="hidden" name="id_brg" class="form-control" value="<?php echo $brg->id_brg ?>">
				<input type="text" name="keterangan" class="form-control" value="<?php echo $brg->keterangan ?>">
			</div>

			<div class="for-group">
				<label>Kategori</label>
				<select name="kategori" class="form-control">
					<?php foreach ($dataku->result() as $tabel){
                	echo "<option value=".$tabel->kat_nama.">".$tabel->kat_nama."</option>";
                	} ?>
        		</select>
			</div>

			<div class="for-group">
				<label>Harga</label>
				<input type="text" name="harga" class="form-control" value="<?php echo $brg->harga ?>">
			</div>
			<div class="for-group">
				<label>Stok</label>
				<input type="text" name="stok" class="form-control" value="<?php echo $brg->stok ?>">
			</div>

			<button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
		</form>

	<?php endforeach; ?>
</div>