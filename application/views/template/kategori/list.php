 <div class="container">
        <div class="judul pl-3 mb-5">
            <h6><?php echo $kategori->nama_kategori ?></h6>
        </div>
        <div class="row mb-2">
            <?php foreach ($buku as $buku) { ?>
            <div class="col-md-6">
                <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                        <strong class="d-inline-block mb-2 text-primary"><?php echo $buku->nama_kategori ?></strong>
                        <h3 class="mb-0">
                            <a class="text-dark" href="#"><?php echo $buku->judul_buku ?></a>
                        </h3>
                        <div class="mb-1 text-muted"><p><i class="fa fa-calendar"></i> <?php echo $buku->tanggal_post ?></p></div>
                        <p class="card-text"><?php echo $buku->penulis ?></p>
                        <p class="card-text deskripsi"><?php echo $buku->penerbit ?></p>
                        <p class="card-text deskripsi"><?php echo $buku->tahun_buku ?></p>
                        <a href="<?php echo base_url('assets/upload/buku/'.$buku->buku) ?>">Mari Baca >> </a>
                    </div>
                    <img class="card-img-right flex-auto d-none d-lg-block p-3" src="<?php echo base_url('assets/upload/img/'.$buku->gambar) ?>" alt="<?php echo $buku->judul_buku ?>">
                </div>
            </div>
            <?php } ?>
           
        </div>

        
<div>
    <nav>
        <div class="paginasi text-center col-md-12">
            <?php if(isset($paginasi) && $total > $limit) {echo $paginasi;} ?>
        </div>
    </nav>
</div>
       <!--  <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
 -->
    </div>