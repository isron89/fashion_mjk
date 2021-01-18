
<div class="container-fluid">
	<h4>Pengelolaan Pembeli</h4>

	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>Id Pembeli</th>
			<th>Nama Pembeli</th>
			<th>Email Pembeli</th>
			<th>Alamat Pembeli</th>
			<th>Terakhir Login</th>
			<th>Tanggal Pendaftaran</th>
			<th colspan="2">AKSI</th>
			
		</tr>

		<?php foreach ($pembeli as $beli) : ?>
			<tr>
				<td><?php echo $beli->user_id ?></td>
				<td><?php echo $beli->nama ?></td>
				<td><?php echo $beli->email ?></td>
				<td><?php echo $beli->user_alamat ?></td>
				<td><?php echo $beli->user_last_login ?></td>
				<td><?php echo $beli->user_create ?></td>
				<td><?php echo anchor('admin/kelola_pembeli/edit/' .$beli->user_id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
				<td><a onclick="return confirm('Are you sure ?')"><?php echo anchor('admin/kelola_pembeli/hapus/' .$beli->user_id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></a></td>
			</tr>
		<?php endforeach; ?>
	</table>

</div>