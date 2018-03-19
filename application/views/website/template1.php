<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $web['cname'];?></title>

    <link href="<?php echo base_url().'assets/img/logo/'.$web['clogo'];?>" rel="icon">
    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/template1/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/template1/css/heroic-features.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/template1/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/template1/lib/animate/animate.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/template1/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/template1/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
	<link href="<?php echo base_url();?>assets/template1/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><?php echo $web['cname'];?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
            <?php if(!$this->session->userdata($web['cid'].'logged_in')){?>
            <li class="nav-item" >
              <a class="nav-link" href="" data-toggle="modal" data-target="#register">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#login" href="">Login</a>
            </li>
            <?php } else{?>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#logout" href="">Logout</a>
            </li>
            <?php }?>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">

      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
        <h1 class="display-3"><?php echo $web['cwelcome'];?></h1>
        <p class="lead"><?php echo $web['cabout'];?></p>
        <a href="#" class="btn-get-started scrollto">Get Started</a>
      </header>

     
       <!-- Page Features -->
      <div class="row text-center">
      <?php foreach($services as $service){?>
        <div class="col-lg-3 col-md-6 mb-4">
          <div class="card">
              <img class="card-img-top" src='data:image;base64,<?php echo $service["simage"];?>' alt='no image'/>
            <div class="card-body">
              <h4 class="card-title"><?=$service['sname']?></h4>
              <p class="card-text"><?=$service['sdescription']?></p>
            </div>
            <div class="card-footer">
              <a href="#" class="btn btn-primary">Find Out More!</a>
            </div>
          </div>
        </div>
      <?php }?>

      </div>
      <!-- /.row -->

    </div>
 <section class="md-section" id="id-5">
					<div class="container">
						<div class="row">
							<div class="col-lg-6 col-md-6 ">
								
								<!-- title -->
								<div class="title">
									<h2 class="title__title">CONTACT US</h2>
								</div><!-- End / title -->
								
								<div class="mb-40">
									
									<!-- contact -->
									<div class="contact">
										<h4 class="contact__title">Address</h4>
										<div><?php echo $web['caddress'];?></div>
									</div><!-- End / contact -->
									
									
									<!-- contact -->
									<div class="contact">
										<h4 class="contact__title">Email</h4>
										<div><a href="<?php echo $web['cemail'];?>"><?php echo $web['cemail'];?></a></div>
									</div><!-- End / contact -->
									
									
									<!-- contact -->
									<div class="contact">
										<h4 class="contact__title">Phone</h4>
										<div><?php echo $web['ccontact'];?></div>
									</div><!-- End / contact -->
									
									 <div class="social-links">
										<a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
										<a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
										<a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
										<a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
										<a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
										</div>

								</div>
							</div>
							<div class="col-lg-6 col-md-6 ">
								
								<!-- title -->
								<div class="title">
									<h2 class="title__title">SEND US A MESSAGE</h2>
								</div><!-- End / title -->
								
                <form action="cmessage/send" method="post" role="form" >
  								<div class="form-wrapper">
  									
  									<!-- form-item -->
  									<div class="form-item form-item--half">
  										<label class="form__label">Email<span>*</span>
  										</label>
  										<input class="form-control" type="email" required name=email placeholder="" value="<?php echo $this->session->userdata($web['cid'].'cuemail')?>" />
  									</div><!-- End / form-item -->
  									
  									
  									<!-- form-item -->
  									<div class="form-item form-item--half">
  										<label class="form__label">Name<span>*</span>
  										</label>
  										<input class="form-control" type="text" name="name" required placeholder="" value="<?php echo $this->session->userdata($web['cid'].'cuname')?>" />
  									</div><!-- End / form-item -->
  									
  									
  									<!-- form-item -->
  									<div class="form-item">
  										<label class="form__label">Message<span>*</span>
  										</label>
  										<textarea class="form-control" required name="message"></textarea>
  									</div><!-- End / form-item -->
  									
                    <input value="<?php echo $web['cid'];?>" name="cid" type="hidden">
  									<input value="<?php echo $web['curl'];?>" name="curl" type="hidden">
  									<!-- form-item -->
  									<div class="form-item" style="margin-top: 10px;">
                      <input type="submit" value="Send" class="btn btn-primary btn-block">
  									</div><!-- End / form-item -->
  									
  								</div>
                </form>
							</div>
						</div>
					</div>
				</section>
  <!-- Footer -->
    <footer class="py-5 bg-dark">
      <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy;2018 <?php echo $web['cname'];?>, All Rights Reserved</p>
      </div>
      <!-- /.container -->

    </footer>

<!-- Modal -->
  <div class="modal fade" id="login" role="dialog">
    <div class="modal-dialog  modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form method="post" action="<?php echo base_url();?>customer/login" id="loginForm">
          <div class="modal-body">
            <p id="invalid" class="help-block text-danger"></p>
                    <div class="form-group"  id="lemailForm" >
                      <label class="form-control-label">Email</label>
                      <input required type="email" value="" name="email" class="form-control" id="lemail">
                      <small class="help-block text-danger"></small>
                    </div>
                    <div class="form-group"  id="lpasswordForm" >
                      <label class="form-control-label">Password</label>
                      <input required id="lpassword" type="password" value="" name="password" class="form-control">
                      <small class="help-block text-danger"></small>
                    </div>

                    <input type="hidden" name="cid" value="<?php echo $web['cid'];?>">
                    <input type="hidden" name="curl" value="<?php echo $web['curl'];?>">
          </div>
          <div class="modal-footer">
            <div class="form-group">     
                <input type="button" id="loginbtn" value="Login" class="btn btn-success">
            </div>
          </div>

        </form>
      </div>
      
    </div>
  </div>

  <div class="modal fade" id="register" role="dialog">
    <div class="modal-dialog  modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Register</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <form method="post" action="<?php echo base_url();?>customer/register" id="registerForm">
          <div class="modal-body">
                    <div class="form-group"  id="rnameForm" >
                      <label class="form-control-label">Name</label>
                      <input required type="text" value="" name="name" class="form-control" id="rname">
                      <small class="help-block text-danger"></small>
                    </div>
                    <div class="form-group"  id="remailForm" >
                      <label class="form-control-label">Email</label>
                      <input required type="email" value="" name="email" class="form-control" id="remail">
                      <small class="help-block text-danger"></small>
                    </div>
                    <div class="form-group"  id="rpasswordForm" >
                      <label class="form-control-label">Password</label>
                      <input required id="rpassword" type="password" value="" name="password" class="form-control">
                      <small class="help-block text-danger"></small>
                    </div>
                    <div class="form-group"  id="rCpasswordForm" >
                      <label class="form-control-label">Confirm Password</label>
                      <input required id="rCpassword" type="password" value="" name="cpassword" class="form-control">
                      <small class="help-block text-danger"></small>
                    </div>
                    <input id="cid" type="hidden" name="cid" value="<?php echo $web['cid'];?>">
                    <input id="curl" type="hidden" name="curl" value="<?php echo $web['curl'];?>">
          </div>
          <div class="modal-footer">
            <div class="form-group">     
                <input type="button" id="registerbtn" value="Register" class="btn btn-success">
            </div>
          </div>

        </form>
      </div>
      
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="logout" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Logout</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Do you really want to logout?</p>
        </div>
        <div class="modal-footer">
          <form action="customer/logout" method="post">
            <input type="hidden" name="cid" value="<?php echo $web['cid'];?>">
            <input type="hidden" name="curl" value="<?php echo $web['curl'];?>">
            <input type="submit" value="Yes" class="btn btn-success">
            <input type="button" class="btn btn-danger" data-dismiss="modal" value='No'>
          </form>
          
        </div>
      </div>
      
    </div>
  </div>
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url();?>assets/template1/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url();?>assets/template1/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        Frname=$('#rnameForm');
        Fremail=$('#remailForm');
        Frpassword=$('#rpasswordForm');
        Frcpassword=$('#rCpasswordForm');
        rForm=$('#registerForm');

        Flemail=$('#lemailForm');
        Flpassword=$('#lpasswordForm');
        lForm=$('#loginForm');
        invalid=$('invalid');

        cid=$('#cid').val();

        $('#loginbtn').click(function(){
          lemail=Flemail.find('input').val();
          lpassword=Flpassword.find('input').val();
          alert(lemail+' '+lpassword);
          $.ajax({
            url: "<?php echo base_url()?>/customer/check",
            type: "POST",
            data: {
              lemail: lemail,
              lpassword: lpassword,
              cid: cid
            },
            dataType: 'json',
            success: function(data){
              //Invalid Email or password
              if(data['lemail']==''&&data['lpass']==''&&data['login']==''){
                lForm.submit();
              }
              else{
                Flemail.find('small').html(data['lemail']);
                Flpassword.find('small').html(data['lpass']);
                invalid.html(data['login']);
                alert(data['login']);
              }
            }
          });
        });
        $('#registerbtn').click(function(){

          rname=Frname.find('input').val();
          remail=Fremail.find('input').val();
          rpassword=Frpassword.find('input').val();
          rcpassword=Frcpassword.find('input').val();

          Frname.find('small').html('');
          Fremail.find('small').html('');
          Frpassword.find('small').html('');
          Frcpassword.find('small').html('');
          $.ajax({
            url: "<?php echo base_url()?>/customer/check",
            type: "POST",
            data: {
              name: rname,
              email: remail,
              password: rpassword,
              cpassword: rcpassword,
              cid: cid
            },
            dataType: 'json',
            success: function(data){
              if(data['cuname']==''&&data['cuemail']==''&&data['cupass']==''&&data['cucpass']==''){
                rForm.submit();
              }
              else{

                Frname.find('small').html(data['cuname']);
                Fremail.find('small').html(data['cuemail']);
                Frpassword.find('small').html(data['cupass']);
                Frcpassword.find('small').html(data['cucpass']);
              }
            }
          });
        });
      });
    </script>

  </body>

</html>
