<?php 
	// erorr warning
	echo validation_errors('<div class="alert alert-warning">','</div>');

	// attribut
	// $attribut = 'class="alert alert-info"';

	echo form_open(base_url('admin/user/tambah'));
 ?>
	<div class="row">
		<div class="col-md-6">
			<div class="form-group">
				<label for="nama">Nama</label>
				<input type="text" name="nama" class="form-control" placeholder="Nama" value="<?php echo set_value('nama'); ?>" required >
			</div>

			<div class="form-group">
				<label for="username">Username</label>
				<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>" required >
			</div>

		</div>

		<div class="col-md-6">

			<div class="form-group">
				<label for="password">Password</label>
				<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password'); ?>" required >
			</div>

			<div class="form-group">
				<label for="akses_level">Akses_level</label>
				<input type="text" name="akses_level" class="form-control" placeholder="Nama" value="user" readonly="user" >
			</div>

			<div class="form-group">
				<input type="submit" name="submit" class="btn btn-success" value="Simpan">
				<input type="reset" name="reset" class="btn btn-warning" value="Reset">
			</div>
		</div>
	</div>

 <?php echo form_close(); ?>

 