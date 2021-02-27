<div class="container-fluid" style="padding-bottom: 300px">
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
			<div class="btn btn-sm btn-success">
				<?php
				$grand_total = 0;
				if ($keranjang = $this->cart->contents()) 
					{
						foreach ($keranjang as $item)
						{
							$grand_total = $grand_total + $item['subtotal'];
						}
						echo "<h4>Total Belanja Anda: Rp. ".number_format($grand_total,0,',','.');
						 
						  ?>
			</div><br><br>

			<h3>Konfirmasi Alamat Pengiriman dan Pembayaran</h3>
			<?php foreach ($akun as $bel) { ?>
			
			<form method="post" action="<?php echo base_url('dashboard/proses_pesanan');?>">
				
				 
				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama" class="form-control" value="<?php echo $bel->nama ?>">
				</div>

				<div class="form-group">
					<label>Alamat Lengkap</label>
					<input type="text" name="alamat" class="form-control" value="<?php echo $bel->user_alamat ?>">
				</div>

				<div class="form-group">
					<label>No. Telepon</label>
					<input type="text" name="no_telp" class="form-control" value="<?php echo $bel->user_no_hp ?>">
				</div>
				<?php } ?>

				<div class="form-group">
					<label>Metode Pembayaran</label>
					<i class="fas fa-credit-card"></i><input type="text" name="pembayaran" class="form-control" value="Rekening Bersama" disabled>
				</div>
				
				<div class="form-group">
					<label>Jasa Pengiriman</label>
					<select class="form-control">
						<option>JNE</option>
						<option>TIKI</option>
						<option>POS</option>
					</select>
				</div>
				<button type="submit" class="btn btn-sm btn-primary mb-3">Pesan</button>
			</form>
			 <?php
		}else
		{
			 echo "<h5>Keranjang Belanja Anda Masih Kosong";
		}
			?>
		</div>



		<div class="col-md-2"></div>
	</div>
</div>