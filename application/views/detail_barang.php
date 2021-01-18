<div class="container-fluid" style="padding-bottom: 50px">
	
	<div class="card">
  <h5 class="card-header">Detail Produk</h5>
  <div class="card-body">

  	<?php foreach($barang as $brg): ?>
    <div class="row">
    	<div class="col-md-4">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            </ol>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="<?php echo base_url().'/uploads/'.$brg->gambar ?>" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="<?php echo base_url('assets/img/slider2.jpg') ?>" class="d-block h-100" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
    </a>
    </div>
    	</div>
    	<div class="col-md-24" >
            <form class="form" method="post" action="<?php echo base_url('dashboard/tambah_keranjang_det')?>">
    		<table class="table" >
    			<tr>
    				<td>Nama Produk</td>
                    <input type="hidden" name="id_brg" class="form-control" value="<?php echo $brg->id_brg ?>">
    				<td>
                        <strong><?php echo $brg->nama_brg ?></strong>
                    </td>
    			</tr>

    			<tr>
    				<td>Keterangan</td>
    				<td><strong><?php echo $brg->keterangan ?></strong></td>
    			</tr>

    			<tr>
    				<td>Kategori</td>
    				<td><strong><?php echo $brg->kategori ?></strong></td>
    			</tr>
    			
    			<tr>
    				<td>Stok</td>
    				<td><strong><?php echo $brg->stok ?></strong></td>
    			</tr>

    			<tr>
    				<td>Harga</td>
    				<td><strong><div class="btn btn-sm btn-success">Rp. <?php echo number_format($brg->harga,0,',','.')  ?></div></strong></td>
    			</tr>

                <tr>
                    <td>Jumlah Beli</td>
                    <div class="for-group">
                    <td><input type="number" name="qtyy" class="form-control" required="" value=""></td>
                    </div>
                </tr>
                
    		</table>

    		 <button class="btn-sm btn-success" type="submit" >Tambah</button>
                <!-- <?php echo anchor('dashboard/tambah_ke_keranjang/' .$brg->id_brg ,'<div class="btn btn-sm btn-success">Tambah</div>') ?> -->
    		  <?php echo anchor('dashboard/index/'  ,'<div class="btn btn-sm btn-danger">Kembali</div>') ?>
             </form>
    	   </div>
    </div>
<?php endforeach; ?>

  </div>
</div>
</div>