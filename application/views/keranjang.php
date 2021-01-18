<div class="container-fluid" style="padding-bottom: 300px">
	<h4>Keranjang Belanja</h4>

	<table class="table table-bordered table-striped table-hover">
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Sub-Total</th>
			<th>Aksi</th>
		</tr>

		<?php
		$no=1;
		foreach ($this->cart->contents() as $items) : ?>

			<tr>
				<td><?php echo $no++ ?></td>
				<td><?php echo $items['name'] ?></td>
				<td><?php echo $items['qty'] ?></td>
				<td align="right">Rp. <?php echo number_format($items['price'], 0,',','.')  ?></td>
				<td align="right">Rp. <?php echo number_format($items['subtotal'], 0,',','.') ?></td>
				<td>
					<!-- <?php echo anchor('dashboard/plus/' .$items['rowid'], '<div class="btn btn-primary btn-sm"><i class="fa fam_plus(fam)">+</i></div>') ?> -->
					<?php echo anchor('dashboard/remove/' .$items['rowid'], '<div class="btn btn-danger btn-sm"><i class="fa fam_close(fam)">Hapus</i></div>') ?>
				</td>
		</tr>
		

	<?php endforeach; ?>

	<tr>
		<td colspan="4"></td>
			<td align="right">Rp. <?php echo number_format($this->cart->total(), 0,',','.') ?></td>
		</tr>
		
	</table>

	<div align="right">
		<a href="<?php echo base_url('dashboard/hapus_keranjang') ?>"><div class="btn btn-sm btn-danger">Hapus Keranjang</div></a>
		<a href="<?php echo base_url('dashboard/index') ?>"><div class="btn btn-sm btn-primary">Lanjutkan Belanja</div></a>
		<a href="<?php echo base_url('dashboard/pembayaran') ?>"><div class="btn btn-sm btn-success">Pembayaran</div></a>
	</div>
</div>