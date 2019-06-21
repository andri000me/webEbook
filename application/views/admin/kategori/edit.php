    <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#Edit<?php echo $kategori->id_kategori; ?>">
        <i class="fa fa-edit"></i> Edit 
    </button>
<div class="modal fade" id="Edit<?php echo $kategori->id_kategori; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ubah Kategori</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('admin/kategori/edit/'.$kategori->id_kategori)); ?>

                    
                <div class="form-group">
                    <label>Nama Kategori : </label>
                    <input type="text" name="nama_kategori" class="form-control" value="<?php echo $kategori->nama_kategori; ?>" required="required">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                </div>



                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">X Batal</button>
            </div>
        </div>
    </div>
</div>