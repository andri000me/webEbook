<?php 

    $id_user    = $this->session->userdata('id_user');
    $user_aktif = $this->user_model->detail($id_user);
 ?>

<!-- navbar side -->
        <nav class="navbar-default navbar-static-side" role="navigation">
            <!-- sidebar-collapse -->
            <div class="sidebar-collapse">
                <!-- side-menu -->
                <ul class="nav" id="side-menu">
                    <li>
                        <!-- user image section-->
                        <div class="user-section">
                            <div class="user-section-inner">
                                <img src="<?php echo base_url() ?>assets/siminta/assets/img/user.jpg" alt="gambar">
                            </div>
                            <div class="user-info">
                                <div><strong><?php echo $user_aktif->nama ?></strong></div>
                                <div class="user-text-online">
                                    <span class="user-circle-online btn btn-success btn-circle "></span>&nbsp;Online
                                </div>
                                <div><a href="<?php echo base_url('admin/profile') ?>" style="font-size: 11px; margin-left: 5px; "><i class="fa fa-edit"></i> Edit Profile</a></div>
                            </div>
                        </div>
                        <!--end user image section-->
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/dasbor"><i class="fa fa-dashboard fa-fw"></i> Dasbor</a>
                    </li>
                    <?php if($user_aktif->akses_level=='admin') { ?>

                    <li>
                        <a href="<?php echo base_url() ?>admin/user"><i class="fa fa-users fa-fw"></i> Users Administrasi</a>
                    </li>

                    <?php }else{ ?>

                    <li>
                        <a href="#" onclick="Swal('Maaf !','Anda tidak memiliki hak akses','warning')"><i class="fa fa-users fa-fw"></i> Users Administrasi</a>
                    </li>

                    <?php } ?>
                    <li>
                        <a href="<?php echo base_url() ?>admin/buku"><i class="fa fa-book fa-fw"></i> Buku</a>                      
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>admin/kategori"><i class="fa fa-tags fa-fw"></i> Kategori</a>                      
                    </li>
                     
                </ul>
                <!-- end side-menu -->
            </div>
            <!-- end sidebar-collapse -->
        </nav>
        <!-- end navbar side -->

        <!--  page-wrapper -->
        <div id="page-wrapper">

            <div class="row">
                <!-- Page Header -->
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $title; ?></h1>
                </div>
                <!--End Page Header -->
            </div>