<?php 

	if ($this->session->flashdata('sukses')) {
		echo '<div class="alert alert-success">';
		echo $this->session->flashdata('sukses');
		echo '</div>';
	}

 ?>

<p>
    <a href="<?php echo base_url() ?>admin/user/tambah" class="btn btn-primary">
        <i class="fa fa-plus"></i> Tambah
    </a>
</p>
<!-- Advanced Tables -->
    <div class="panel panel-default">
        <div class="panel-heading">
                Data User
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username - Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; foreach ($user as $user) { ?>

                        <tr class="odd gradeX">
                            <td width="5"><?php echo $i; ?></td>
                            <td><?php echo $user->nama; ?></td>
                            <td><?php  echo $user->username; ?> - <?php echo $user->akses_level; ?></td>
                            <td width="150">
                                <?php if ($user->akses_level != 'admin') { ?>
                                <a href="<?php echo base_url('admin/user/edit/'.$user->id_user) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>Edit</a>
                                <?php } ?>

                                <?php if ($user->akses_level != 'admin') { include('delete.php'); } ?>
                            </td>
                        </tr>
                        <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>


            