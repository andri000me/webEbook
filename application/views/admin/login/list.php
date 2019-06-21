<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/book_icon.png') ?>">
    <!-- Core CSS - Include with every page -->
    <link href="<?php echo base_url() ?>assets/siminta/assets/plugins/bootstrap/bootstrap.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/siminta/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/siminta/assets/plugins/pace/pace-theme-big-counter.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/siminta/assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url() ?>assets/siminta/assets/css/main-style.css" rel="stylesheet" />

</head>

<body class="body-Login-back">

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4 text-center logo-margin ">
                <?php 
    
                    if ($this->session->flashdata('sukses')) {
                        echo '<div class="alert alert-success">';
                        echo $this->session->flashdata('sukses');
                        echo '</div>';
                    }

                    echo validation_errors('<div class="alert alert-warning">','</div>');

                 ?>
              <img src="<?php echo base_url() ?>assets/img/book_lovers1.png" alt="logo" style="width: 400px;margin-bottom: -50px; margin-left: -20px;"/>
                </div>
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">                  
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <?php echo form_open(base_url('login')); ?>
                            <fieldset>
                                <div class="form-group input-group">
                                    <input class="form-control" placeholder="Username" name="username" type="username" autofocus>
                                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                </div>
                                <div class="form-group input-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
                                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                </div>
                                <!-- <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div> -->
                                <!-- Change this to a button or input when using this as a form -->
                                <button class="btn btn-lg btn-success btn-block">Login</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

     <!-- Core Scripts - Include with every page -->
    <script src="<?php echo base_url() ?>assets/siminta/assets/plugins/jquery-1.10.2.js"></script>
    <script src="<?php echo base_url() ?>assets/siminta/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="<?php echo base_url() ?>assets/siminta/assets/plugins/metisMenu/jquery.metisMenu.js"></script>

</body>

</html>
