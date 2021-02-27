<div class="container-fluid">
	<h3><i class="fas fa-edit"></i>Edit Data Penjual</h3>
	<?php foreach($akun as $penjual) : ?>
		<form method="post" action="<?php echo base_url(). 'admin/kelola_penjual/update' ?>">
			<div class="for-group">
				<label>Nama Penjual</label>
				<input type="text" name="nama" class="form-control" value="<?php echo $penjual->nama ?>">
			</div>
			<div class="for-group">
				<label>NIK Penjual</label>
				<input type="text" name="nik" class="form-control" value="<?php echo $penjual->nik ?>">
			</div>
			<div class="for-group">
				<label>Email</label>
				<input type="email" name="email" class="form-control" value="<?php echo $penjual->email ?>">
			</div>
			<div class="for-group">
				<label>Username</label>
				<input type="text" name="username" class="form-control" value="<?php echo $penjual->username ?>">
			</div>
			<div class="for-group">
				<label>Password</label>
				<input type="password" name="password" class="form-control" value="<?php echo $penjual->password ?>">
			</div>
			<div class="for-group">
				<label>Alamat</label>
				<input type="hidden" name="user_id" class="form-control" value="<?php echo $penjual->user_id ?>">
				<input type="text" name="user_alamat" class="form-control" value="<?php echo $penjual->user_alamat ?>">
			</div>
			<div class="for-group">
				<label>No HP</label>
				<input type="text" name="user_no_hp" class="form-control" value="<?php echo $penjual->user_no_hp ?>">
			</div>
			<div class="for-group">
				<label>Login Terakhir</label>
				<input type="text" name="user_last_login" class="form-control" disabled value="<?php echo $penjual->user_last_login ?>">
			</div>
			<div class="for-group">
				<label>Tanggal Daftar</label>
				<input type="text" name="user_create" class="form-control" disabled value="<?php echo $penjual->user_create ?>">
			</div>
			<button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
		</form>
	<?php endforeach; ?>
</div>