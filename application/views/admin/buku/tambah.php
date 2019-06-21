<?php 

	// erorr warning
	echo validation_errors('<div class="alert alert-warning">','</div>');
 	
 	if(isset($erorr_upload)){
 		echo '<div class="alert alert-warning">'.$erorr_upload.'</div>';
 	}

	// attribut
	// $attribut = 'class="alert alert-info"';

	echo form_open_multipart(base_url('admin/buku/tambah'));
 ?>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="judul_buku">Judul Buku</label>
				<input type="text" name="judul_buku" class="form-control" placeholder="Judul Buku"value="<?php echo set_value('judul_buku') ?>">
			</div>

			<div class="form-group">
				<label for="penulis">Penulis</label>
				<input type="text" name="penulis" class="form-control" placeholder="Penulis" value="<?php echo set_value('penulis') ?>">
			</div>

			<div class="form-group">
				<label for="penerbit">Penerbit</label>
				<input type="text" name="penerbit" class="form-control" placeholder="Penerbit" value="<?php echo set_value('penerbit') ?>">
			</div>

			<div class="form-group">
				<label for="id_kategori">Kategori Buku</label>
				<select name="jenis_buku" class="form-control">
					<?php foreach ($kategori as $kategori) { ?>
						<option value="<?php echo $kategori->id_kategori; ?>"><?php echo $kategori->nama_kategori; ?></option>
					<?php } ?>
				</select>
			</div>


		</div>

		<div class="col-md-6">

			<div class="form-group">
				<label for="tahun_buku">Tahun_buku</label>
				<input type="number" name="tahun_buku" class="form-control" placeholder="1945" >
			</div>

			<div class="form-group">
				<label for="buku">Buku</label>
				<input type="file" name="buku" class="form-control" placeholder="Buku" >
			</div>
			
			<div class="form-group">
				<label for="status_buku">Status Buku</label>
				<select name="status_buku" class="form-control">
					<option value="publish">Publish</option>
					<option value="draft">Draft</option>
				</select>
			</div>

			<div class="form-group">
				<label for="gambar">Gambar Buku</label>
				<input type="file" name="gambar" class="form-control" placeholder="Gambar Buku" >
			</div>

			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-success" value="Simpan">
				<input type="reset" name="reset" class="btn btn-warning" value="Reset">
			</div>
		</div>
	</div>

 <?php echo form_close(); ?>

 