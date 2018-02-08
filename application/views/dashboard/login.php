<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>OKAYsion</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="<?php echo base_url();?>assets/dashboard/css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon
    <link rel="shortcut icon" href="img/favicon.ico">-->
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
        <?php 
          if($this->session->flashdata('login_failed')): ?>
          <?php echo "<p class='alert alert-danger'>".$this->session->flashdata('login_failed')."</p>"?>
         <?php endif;?>

         <?php
          if($this->session->flashdata('user_loggedin')): ?>
          <?php echo "<p class='alert alert-success'>".$this->session->flashdata('user_loggedin')."</p>"?>
         <?php endif;?>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                  <div class="logo">
                    <h1>OKAYsion</h1>
                  </div>
                  <p>A Multi-tenant system that will help you have your own website.</p>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <?php echo validation_errors(); ?>

                  <form id="login-form" action="login" method="post">
                    <div class="form-group">
                      <input id="login-email" type="email" name="lemail" required class="input-material">
                      <label for="lemail" class="label-material">Email Address      </label>
                    </div>
                    <div class="form-group">
                      <input id="lpass" type="password" name="lpassword" required class="input-material">
                      <label for="login-passowrd" class="label-material">Password </label>
                    </div>
                    <input id="loginr" type="submit" value="Login" class="btn btn-primary">
                  </form><small>Doesn't have an account? </small><a href="<?php echo base_url();?>register" class="signup">Register</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
   
       <!-- <p>Design by <a href="https://bootstrapious.com/admin-templates" class="external">Bootstrapious</a>-->
          <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
        
    </div>
    <!-- Javascript files-->
    <script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/dashboard/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="<?php echo base_url();?>assets/dashboard/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/dashboard/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="<?php echo base_url();?>assets/dashboard/vendor/chart.js/Chart.min.js"></script>
    <script src="<?php echo base_url();?>assets/dashboard/vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="<?php echo base_url();?>assets/dashboard/js/front.js"></script>
  </body>
</html>