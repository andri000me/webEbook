    <button class="btn btn-danger btn-sm btn-circle" data-toggle="modal" data-target="#Delete<?php echo $buku->id_buku; ?>">
        <i class="fa fa-trash-o"></i> 
    </button>
<div class="modal fade" id="Delete<?php echo $buku->id_buku; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Menghapus Data</h4>
            </div>
            <div class="modal-body">
                    Apakah Anda yakin ingin menghapus data ini ?
            </div>
            <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">X Batal</button>
                    <a href="<?php echo base_url('admin/buku/delete/' . $buku->id_buku) ?>" class="btn btn-outline btn-danger pull-right"><i class="fa fa-trash-o"></i> Hapus </a>
            </div>
        </div>
    </div>
</div>
