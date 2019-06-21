    <button class="btn btn-primary btn-md" data-toggle="modal" data-target="#Tambah">
        <i class="fa fa-plus"></i> Tambah 
    </button>
<div class="modal fade" id="Tambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Tambah Data</h4>
            </div>
            <div class="modal-body">
                <?php echo form_open(base_url('admin/kategori')); ?>

                <div class="form-group">
                    <label for="nama_kategori">Nama Kategori</label>
                    <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" required="required">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary" value="Tambah Kategori">
                </div>



                <?php echo form_close(); ?>
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal">X Batal</button>
            </div>
        </div>
    </div>
</div>
