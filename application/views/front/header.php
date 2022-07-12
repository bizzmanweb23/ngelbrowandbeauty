<!DOCTYPE html>
<html lang="en">

<head>

  <!-- SITE TITTLE -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>N'gel brow & beauty</title>

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

  <!-- FAVICON -->
  <link href="<?= base_url(); ?>/assets/front/img/favicon.png" rel="shortcut icon">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <style>
    /* Paste this css to your style sheet file or under head tag */
    /* This only works with JavaScript,
    if it's not present, don't show loader */
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

          <a class="navbar-brand" href="<?= base_url(); ?>/home"><img class="lazyestload" data-src="<?= base_url(); ?>/assets/front/img/logo.png" src="<?= base_url(); ?>/assets/front/img/logo.png" alt="logo"></a>
  
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="<?= base_url(); ?>/home">Home <span class="sr-only">(current)</span></a>
              </li>
  
              <li class="nav-item">
                <a class="nav-link" href="#">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Service</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Shop</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Course</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Contact us</a>
              </li>
           
            </ul>
          </div>

          <div class="cart_btn">
							<a href="cart.html"><i class="las la-shopping-cart" style="font-size:32px;" aria-hidden="true"></i><span class="badge">0</span></a>					
          </div>
					<div class="cart_btn p-3" data-toggle="modal" data-target="#myModal">
							<a href="javascript:void(0)"><i class="las la-user-alt" style="font-size:32px;"></i></a>
          </div>
					
          <!-- header search ends-->
        </div>
      </nav>
			 
    </header>
