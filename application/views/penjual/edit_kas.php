<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>Withdraw Kas</h3>

	<?php foreach($kas as $kass) : ?>
		<form method="post" action="<?php echo base_url(). 'penjual/kas/update' ?>">
			<div class="for-group">
				<label>Tanggal</label>
				<input type="text" name="tanggal" class="form-control" value="<?php echo $kass->tanggal ?>">
			</div>
			<div class="for-group">
				<label>Keterangan</label>
				<input type="hidden" name="id" class="form-control" value="<?php echo $kass->id_kas ?>">
				<input type="text" name="Keterangan" class="form-control" value="<?php echo $kass->keterangan ?>">
			</div>

			<div class="for-group">
				<label>Saldo</label>
				<input type="text" name="saldo" class="form-control" value="<?php echo $kass->saldo ?>">
			</div>
			<button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
		</form>

	<?php endforeach; ?>
</div>