<!DOCTYPE html>
<html lang="en">

<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>N'gel brow & beauty</title>

	
   <!-- JAVASCRIPTS -->
   <script src="<?= base_url(); ?>/assets/front/plugins/jquery/jquery.min.js"></script>
  <script src="<?= base_url(); ?>/assets/front/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
  <script src='<?= base_url(); ?>/assets/front/plugins/selectbox/jquery.selectbox-0.1.3.min.js'></script>
  <script src='<?= base_url(); ?>/assets/front/plugins/owl-carousel/owl.carousel.min.js'></script>
  <script src='<?= base_url(); ?>/assets/front/plugins/isotope/isotope.min.js'></script>
  <script src='<?= base_url(); ?>/assets/front/plugins/fancybox/jquery.fancybox.min.js'></script> 
  <script src='<?= base_url(); ?>/assets/front/plugins/isotope/isotope-triger.min.js'></script>
  <script src='<?= base_url(); ?>/assets/front/plugins/datepicker/bootstrap-datepicker.min.js'></script> 
  <script src="<?= base_url(); ?>/assets/front/plugins/lazyestload/lazyestload.js"></script> 
  <script src="<?= base_url(); ?>/assets/front/plugins/smoothscroll/SmoothScroll.js"></script> 
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <script src="<?= base_url(); ?>/assets/front/js/custom.js"></script>
  <link href="<?= base_url(); ?>/assets/front/options/optionswitch.css" rel="stylesheet">
<script src="<?= base_url(); ?>/assets/front/options/optionswitcher.js"></script>


  <!-- GOOGLE FONT -->
  <link href="https://fonts.googleapis.com/css2?family=Herr+Von+Muellerhoff&amp;family=Montserrat:wght@400;700&amp;family=Open+Sans:wght@300;400;600;700&amp;display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css"> 
  <!-- PLUGINS CSS STYLE -->
  <link href="<?= base_url(); ?>/assets/front/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/front/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/front/plugins/animate/animate.css" rel="stylesheet"> 
  <link href='<?= base_url(); ?>/assets/front/plugins/selectbox/select_option1.css' rel='stylesheet'>
  <link href='<?= base_url(); ?>/assets/front/plugins/owl-carousel/owl.carousel.min.css' rel='stylesheet' media='screen'>
  <link href='<?= base_url(); ?>/assets/front/plugins/fancybox/jquery.fancybox.min.css' rel='stylesheet'> 
  <link href='<?= base_url(); ?>/assets/front/plugins/isotope/isotope.min.css' rel='stylesheet'>
  <link href='<?= base_url(); ?>/assets/front/plugins/datepicker/datepicker.min.css' rel='stylesheet'> 
  <!-- CUSTOM CSS -->
  <link href="<?= base_url(); ?>/assets/front/css/style.css" rel="stylesheet">
  <link href="<?= base_url(); ?>/assets/front/css/default.css" rel="stylesheet" id="option_color">
  <link href="<?= base_url(); ?>/assets/front/css/owl.carousel.min.css" rel="stylesheet" >
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

		
<!--===============================================================================================-->
<!--<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">-->
<!--===============================================================================================-->
	<!--<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">-->
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/front/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<!--<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">-->
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/front/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/front/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/front/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/front/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<!--<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/front/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/assets/front/css/main.css">-->
<!--===============================================================================================-->

  <!-- FAVICON -->
  <link href="<?= base_url(); ?>/assets/front/img/favicon.png" rel="shortcut icon">

  <style>
    .no-js #loader {
      display: none;
    }
    .js #loader {
      display: block;
      position: absolute;
      left: 100px; top: 0;
    }

    .se-pre-con {
      position: fixed;
      left: 0px;
      top: 0px;
      width: 100%;
      height: 100%;
      z-index: 9999;
      background: url(../assets/front/plugins/simple-pre-loader/images/loader-64x/Preloader_2.gif) center no-repeat #fff;
    }
  </style>

</head>

<body id="body" class="body-wrapper static">

<div class="se-pre-con"></div>
  <div class="main-wrapper">
    <!-- HEADER -->
    <header id="pageTop" class="header">

      <!-- TOP INFO BAR -->
      <div class="top-info-bar">
        <div class="container">
          <div class="top-bar-right">
            <ul class="list-inline">
              <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> info@yourdomain.com</a></li>
              <li><span><i class="fa fa-phone" aria-hidden="true"></i>+1 234 567 8900</span></li>
            </ul>
          </div>
        </div>
      </div>

      <!-- NAVBAR -->
      <nav class="navbar navbar-expand-md main-nav navbar-light">
        <div class="container">
     
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>

          <a class="navbar-brand" href="<?= base_url(); ?>/home"><img class="lazyestload" data-src="<?= base_url(); ?>/assets/front/img/logo.png" src="<?= base_url(); ?>assets/front/img/logo.png" alt="logo"></a>
  
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="<?= base_url(); ?>/home">Home <span class="sr-only">(current)</span></a>
              </li>
  
              <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('about') ?>">About</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" href="javascript:void(0)">Services</a>
                <ul class="dropdown-menu">
                  <li><a href="<?php echo base_url('services') ?>">Services</a></li>
                  <li><a href="<?php echo base_url('services-list') ?>">Service Details</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('products') ?>">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('courses') ?>">Course</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('contactus') ?>">Contact us</a>
              </li>
           
            </ul>
          </div>

          <div class="cart_btn">
							<a href="cart.html"><i class="las la-shopping-cart" style="font-size:32px;" aria-hidden="true"></i><span class="badge">0</span></a>					
          </div>
					<!--<div class="cart_btn p-3" data-toggle="modal" data-target="#myModal">
							<a href="javascript:void(0)"><i class="las la-user-alt" style="font-size:32px;"></i></a>
          </div>-->
					<div class="cart_btn p-3">
							<a href="<?php echo base_url('login') ?>"><i class="las la-user-alt" style="font-size:32px;"></i></a>
          </div>
					
          <!-- header search ends-->
        </div>
      </nav>
			 
    </header>
