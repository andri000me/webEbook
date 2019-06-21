<!-- content -->

	<div class="container">
		<div class="judul pl-3 mb-5">
			<h6>Latest Book</h6>
		</div>
		<div class="row">
			<div class="col-md-10">
				<div class="row">
					<?php foreach ($buku as $buku) { ?>
					<div class="col-md-4">
						<div class="card d-flex flex-sm-column align-items-start" style="width: 18rem;border: 0px;">
							<img class="card-img-right flex-auto d-none d-sm-block gambar" src="<?php echo base_url('assets/upload/img/'.$buku->gambar) ?>" alt="<?php echo $buku->judul_buku ?>">

						</div>
						<div class="card" style="width: 18rem;border: 0px;margin-top: 10px;">
							<h5 class="card-title"><?php echo $buku->judul_buku ?></h5>
							<p><i class="fa fa-calendar"></i> <?php echo $buku->tanggal_post ?></p>
							<p>Penulis : <?php echo $buku->penulis ?></p>
							<p class="deskripsi">Penerbit : <?php echo $buku->penerbit ?></p>
							<p class="deskripsi">Tahun : <?php echo $buku->tahun_buku ?></p>
							<a href="<?php echo base_url('assets/upload/buku/'.$buku->buku) ?>"> Mari Baca >> </a>
						</div>
					</div>

					<?php } ?>

				</div>
			</div>

			<div class="col-md-2">
				<div class="kategori">
					<h5>kategori <i class="fa fa-tag" style="color:red;"></i></h5>
				</div>
			<?php foreach ($kategori as $kategori) { ?>

				<li><a href="<?php echo base_url('kategori/kategori/'.$kategori->slug_kategori) ?>"><i class="fa fa-book" style="color:green;"></i> <?php echo $kategori->nama_kategori ?> </a></li>

			<?php } ?>
				
			</div>
		</div>
	</div>