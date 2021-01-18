<div class="container-fluid">
	<h4>Invoice Pemesanan Produk</h4>
	<table class="table table-bordered ">
		<tr>
			<th>Id Invoice</th>
			<th>Nama Pemesan</th>
			<th>Alamat Pengiriman</th>
			<th>Tanggal Pemesanan</th>
			<th>Batas Pembayaran</th>
			<th colspan="2" style="text-align: center;">Konfirmasi Pembayaran</th>
		</tr>

		<?php foreach ($invoice as $inv): ?>
			<tr>
				<td><?php echo $inv->id ?></td>
				<td><?php echo $inv->nama ?></td>
				<td><?php echo $inv->alamat ?></td>
				<td><?php echo $inv->tgl_pesan ?></td>
				<td><?php echo $inv->batas_bayar ?></td>
				<td><button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_barang"><i class="fas fa-plus fa-sm"></i>Upload Bukti Bayar</button></td>
				<td><?php echo anchor('invoice/detail/'.$inv->id, '<div class="btn btn-sm btn-primary">Detail</div>') ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</div>

<!-- Modal -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      	<div class="modal-header">
        	<h5 class="modal-title" id="exampleModalLabel">Upload Bukti Pembayaran</h5>
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          	<span aria-hidden="true">&times;</span>
        	</button>
      	</div>
      	<div class="modal-body">
        <form action="<?php echo base_url(). 'invoice/upload_bukti'; ?>" method="post" enctype="multipart/form-data">
        	
        	<?php foreach ($invoice as $invv): ?>
        	<div class="form-group">
        		<label>Foto Bukti Bayar</label><br>
        		<input type="file" name="buktibayar" class="form-control" required="">
        	</div>
        	<div class="form-group">
        		<label>Catatan</label>
        		<input type="text" name="catatan" class="form-control" required="">
 			</div>
 			<div class="form-group">
        		<input type="number" name="id_invoice" class="form-control" value="<?php echo $inv->id ?>" hidden="" >
 			</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        		<button type="submit" class="btn btn-primary">Simpan</button>
      		</div>
      		<?php endforeach; ?>

        </form>
    	</div>
  	</div>
	</div>
</div>