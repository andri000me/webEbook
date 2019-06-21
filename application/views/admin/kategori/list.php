<?php 
if ($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    }
echo validation_errors('<div class="alert alert-warning">','</div>');

include 'tambah.php'; 

?>
<!-- Advanced Tables -->
    <div class="panel panel-default" style="margin-top: 10px;">
        <div class="panel-heading">
                Data Kategori
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kategori</th>
                            <th>Slug Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                         <?php $i=1; foreach ($kategori as $kategori) { ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $kategori->nama_kategori ?></td>
                            <td><?php echo $kategori->slug_kategori ?></td>
                            <td width="150">
                                <?php include 'edit.php'; ?>
                                <?php include 'delete.php'; ?>
                            </td>
                        </tr>
                         <?php $i++; } ?>
                    </tbody>
                </table>
            </div>
            
        </div>
    </div>