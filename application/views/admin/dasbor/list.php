<?php 

    $id_user    = $this->session->userdata('id_user');
    $user_aktif = $this->user_model->detail($id_user);
    $user = $this->user_model->listing();
    $buku = $this->buku_model->listing();
    $kategori = $this->kategori_model->listing();
 ?>

            <div class="row">
                <!-- Welcome -->
                <div class="col-lg-12">
                    <div class="alert alert-info">
                        <i class="fa fa-folder-open"></i><b>&nbsp;Hello ! </b>Welcome Back <b><?php echo $user_aktif->nama ?></b>
                        <i>updated: <?php echo date('d M Y',strtotime($user_aktif->tanggal)) ?></i>
                    </div>
                </div>
                <!--end  Welcome -->
            </div>

        <div class="row">
           <div class="col-lg-6">
                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body blue">
                            <i class="fa fa-users fa-3x"></i>
                            <h3><?php echo count($user); ?> Users </h3>
                        </div>                    
                    </div>

                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body green">
                            <i class="fa fa fa-book fa-3x"></i>
                            <h3><?php echo count($buku); ?> Buku</h3>
                        </div>                  
                    </div>

                    <div class="panel panel-primary text-center no-boder">
                        <div class="panel-body red">
                            <i class="fa fa-tags fa-3x"></i>
                            <h3><?php echo count($kategori); ?> Kategori</h3>
                        </div>
                    </div>
            </div>
            <div class="col-lg-6">
                <div id="my-calendar"></div>
            </div>

        </div>


            