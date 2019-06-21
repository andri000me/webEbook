<?php 
if ($this->session->flashdata('sukses')) {
        echo '<div class="alert alert-success">';
        echo $this->session->flashdata('sukses');
        echo '</div>';
    }
echo validation_errors('<div class="alert alert-warning">','</div>');
?>


<p>
    <a href="<?php echo base_url() ?>admin/buku/tambah" class="btn btn-primary">
        <i class="fa fa-plus"></i> Tambah
    </a>
</p>

<div class="panel panel-default">
    <div class="panel-heading">
            Data Buku
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Buku</th>
                        <th>Penulis | Penerbit</th>
                        <th>Gambar</th>
                        <th>Kode Buku</th>
                        <th>Tahun Buku</th>
                        <th>Buku</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; foreach ($buku as $buku) { ?>
                    <tr>
                        <td class="font"><?php echo $i; ?></td>
                        <td class="font"><?php echo $buku->judul_buku; ?></td>
                        <td class="font"><?php echo $buku->penulis; ?> | <?php echo $buku->penerbit; ?></td>
                        <td><img src="<?php echo base_url('assets/upload/thumbs/'.$buku->gambar) ?>" alt="Gambar" width="40" class="img img-thumbnail"></td>
                        <td class="font"><?php echo $buku->jenis_buku; ?></td>
                        <td class="font"><?php echo $buku->tahun_buku; ?></td>
                        <td class="font"><?php echo $buku->buku; ?></td>
                        <td class="font"><?php echo $buku->status_buku; ?></td>
                        <td class="font"><?php echo $buku->tanggal_post; ?> </td>
                        <td>
                            <a href="<?php echo base_url('admin/buku/edit/'.$buku->id_buku) ?>" class="btn btn-warning btn-circle btn-xs"><i class="fa fa-edit"></i></a>
                            <?php include 'delete.php'; ?>                            
                        </td>
                    </tr>
                    <?php $i++; } ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>