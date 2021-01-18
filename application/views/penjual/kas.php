<div class="container-fluid">
    <!-- <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_kas"><i class="fas fa-plus fa-sm"></i>Tambah</button> -->

    <table class="table table-bordered">
    	<tr>
    		<th>No</th>
    		<th>Tanggal</th>
    		<th>Keterangan</th>
    		<th>Saldo</th>
    		<th colspan="">Aksi</th>
    	</tr>
    	
    	<?php
        $no=1;
    	foreach($kas as $kass) : ?>
    		<tr>
    			<td><?php echo $no++ ?></td>
    			<td><?php echo $kass->tanggal ?></td>
    			<td><?php echo $kass->keterangan ?></td>
    			<td><?php echo $kass->saldo ?></td>
    			
    			<td><?php echo anchor('penjual/kas/edit/' .$kass->id_kas, '<div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div>') ?></td>
				<!-- <td><?php echo anchor('penjual/kas/hapus/' .$kass->id_kas, '<div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div>') ?></td> -->
    			<!--<td><div class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></div></td>
                <td><div class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></div></td> -->
    		</tr>
    	<?php endforeach; ?>
    </table>
	</div>


    <!-- Modal -->
<div class="modal fade" id="tambah_kas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url(). 'penjual/kas/tambah_aksi'; ?>" method="post" enctype="multpart/form-data">
            
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control">
                
            </div>

             <div class="form-group">
                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control">
            </div>
             <div class="form-group">
                <label>Saldo</label>
                <input type="text" name="saldo" class="form-control">
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
  </div>
</div>