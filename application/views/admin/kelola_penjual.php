<div class="container-fluid">
	<h4>Pengelolaan Penjual</h4>

	<table class="table table-bordered table-hover table-striped">
		<tr>
			<th>Id Penjual</th>
			<th>NIK Penjual</th>
			<th>Nama Penjual</th>
			<th>Alamat Penjual</th>
			<th>Email Penjual</th>
			<th>Terakhir Login</th>
			<th>Tanggal Pendaftaran</th>
			<th colspan="3">AKSI</th>
			
		</tr>

		<?php foreach ($penjual as $jual) : ?>
			<tr>
				<td><?php echo $jual->user_id ?></td>
				<td><?php echo $jual->nik ?></td>
				<td><?php echo $jual->nama ?></td>
				<td><?php echo $jual->user_alamat ?></td>
				<td><?php echo $jual->email ?></td>
				<td><?php echo $jual->user_last_login ?></td>
				<td><?php echo $jual->user_create ?></td>
				<td><?php echo anchor('admin/kelola_penjual/ceknik/' .$jual->nik, '<div class="btn btn-success btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
				<td><?php echo anchor('admin/kelola_penjual/edit/' .$jual->user_id, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
				<td><a onclick="return confirm('Are you sure ?')"><?php echo anchor('admin/kelola_pembeli/hapus/' .$jual->user_id, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></a></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<!-- <script>
	let swbtn = document.getElementById("swbtn");
	let status = document.getElementById("status");
	swbtn.addEventListener("click", function(){
		if (swbtn.checked) {
			status.innerHTML = "Aktif";
		} else if (!swbtn.checked)	{
			status.innerHTML = "Nonaktif";
		}
	});
	</script> -->
</div>