<!-- MAIN SLIDER -->
<?php $id = $this->session->userdata('id');?>
    <section class="main-slider" data-loop="true" data-autoplay="true" data-interval="7000">
      <div class="inner">
        

        <!-- Slide One -->
        <div class="slide slideResize slide1" style="background-image: url(<?= base_url(); ?>/assets/front/img/home/EyeBrow.png);">
          <div class="container">
            <div class="slide-inner2 common-inner">
							<img src="<?= base_url(); ?>assets/front/img/slider-logo.png" class="img-fluid" style = "max-width: 150px;mix-blend-mode:color;">
              <span class="h1 from-bottom">Welcome to n'gel</span><br>
              <span class="h4 from-bottom">We provide best skin care & aging solution </span><br>
              <a href="javascript:void(0)" class="btn btn-primary first-btn waves-effect waves-light scale-up">More Details</a>
            </div>
          </div>
        </div>

        <!-- Slide Two -->
				<div class="slide slideResize slide2" style="background-image: url(<?= base_url(); ?>/assets/front/img/home/EyeLiner.png);">
          <div class="container">
            <div class="slide-inner1 common-inner">
							<img src="<?= base_url(); ?>assets/front/img/slider-logo.png" class="img-fluid" style = "max-width: 150px;mix-blend-mode:color;">
              <span class="h1 from-bottom">Skin Care Solution</span><br>
              <span class="h4 from-bottom">The best place of Mindfullness & Healthy body</span><br>
              <a href="javascript:void(0)" class="btn btn-primary first-btn waves-effect waves-light scale-up">More Details</a>
            </div>
          </div>
        </div>

    		<!-- Slide Four -->
				<div class="slide slideResize slide4" style="background-image: url(<?= base_url(); ?>/assets/front/img/home/LipStick.png);">
          <div class="container">
            <div class="common-inner slide-inner4">
							<img src="<?= base_url(); ?>assets/front/img/slider-logo.png" class="img-fluid" style = "max-width: 150px;mix-blend-mode:color;">
              <span class="h1 from-bottom">Most Beautiful Theme</span><br>
              <span class="h4 from-bottom">Angel is a beautiful theme and easy to customize</span><br>
              <a href="javascript:void(0)" class="btn btn-primary first-btn waves-effect waves-light scale-up">More Details</a>
            </div>
          </div>
        </div>
    

    
      </div>
    </section>

<!-- ABOUT SECTION -->
    <section class="container-fluid clearfix aboutSection patternbg" >
      <div class="aboutInner">
        <div class="sepcialContainer">
          <div class="row">
            <div class="col-sm-6 col-xs-12 rightPadding">
              <div class="imagebox ">
                <img class="img-responsive" data-src="<?= base_url(); ?>/assets/front/img/home/home-about.jpg" src="<?= base_url(); ?>/assets/front/img/home/home-about.jpg" alt="Image About">
              </div>
            </div>
            <div class="col-sm-6 col-xs-12">
              <div class="aboutInfo">
                <h2> N'gel brow and beauty</h2>
                <h3>Perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam eaque ipsa quae ab.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nos
                  trud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat  cupidatat non proident.</h3>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


<!-- VARIETY SECTION -->
    <section class="clearfix varietySection">
      <div class="container">
        <div class="secotionTitle">
          <h2><span>Discover</span>variety of spa</h2>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="tabbable tabTop">
              
              <div class="tab-content">
                <div class="tab-pane active" id="hair">
                  <div class="tabbable tabs-left">
                    <div class="row">
                      <div class="col-md-5 col-lg-4" style="height: 500px; overflow-y:scroll;">
                        <ul class="nav nav-tabs">
													<?php foreach($allservices as $allservices_row): ?>
														<li><a href="javascript:void(0)" style="cursor: pointer;" data-toggle="tab" class="active" onclick="showServiceDetails(<?= $allservices_row['id'] ?>)"><?= $allservices_row['service_name'] ?> <span>$<?= $allservices_row['service_price'] ?></span></a></li>
													<?php	endforeach; ?>  
                        </ul>
                      </div>

                      <div class="col-md-7 col-lg-8">
                        <div class="tab-content">
													<div class="activeService">
															<?php foreach($activeServices as $servicesImg_row): 
																$id = $servicesImg_row['id']; ?>
																<div class="tab-pane" id="braidstwist_<?= $id; ?>">
																	<div class="varietyContent">
																		<img src="<?= base_url(); ?>/uploads/service_img/<?= $servicesImg_row['service_icon'] ?>" data-src="<?= base_url(); ?>/uploads/service_img/<?= $servicesImg_row['service_icon'] ?>" alt="Image Variety" class="img-responsive">
																		<h3><?= $servicesImg_row['service_name'] ?></h3>
																		<h4>$<?= $servicesImg_row['service_price'] ?> Per Head</h4>
																		<p><?= $servicesImg_row['description'] ?></p>

																		<!--<a href="javascript:void(0)" class="btn btn-primary first-btn" data-toggle="modal" data-target="#appoinmentModal">make An Appoinment</a>-->
																	</div>	
																	<div class="d-flex justify-content-center">
																		<?php if($this->session->userdata('id')>0){ ?>
																			<a href="<?= base_url('appointmentBooking/'.$id)?>" class="btn btn-primary first-btn px-2" target="_blank">make An Appoinment</a>
																		<?php }else{ ?>
																			<a href="javascript:void(0)" onclick="return swal('Please Login First')" class="btn btn-primary first-btn px-2">make An Appoinment</a>
																		<?php } ?>
																	</div>
															</div>
														<?php	endforeach; ?>
													</div>

													<div class="displayService"></div>

                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                


              </div>
            </div>
          </div>
        </div>
      </div>
    </section>




<!-- PRODUCT SECTION -->
<!-- PARTNER LOGO SECTION -->
<section class="clearfix productSection">
  <div class="container">
    <div class="secotionTitle">
      <h2><span>Natural </span>Our Products</h2>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="owl-carousel owl-theme">
				<?php foreach($allproducts as $servicesImg_row): ?>
            <div class="item">
							<div class="produtSingle">
                <div class="produtImage">
								<?php if($servicesImg_row['p_image'] == ''){ ?>
											<img src="<?= base_url(); ?>/uploads/product_img/demo-product.jpg" data-src="<?= base_url(); ?>/uploads/product_img/demo-product.jpg" alt="Image Product" class="img-responsive">
										<?php	}else{ ?>
                    <img src="<?= base_url(); ?>/uploads/product_img/<?= $servicesImg_row['p_image'] ?>" data-src="<?= base_url(); ?>/uploads/product_img/<?= $servicesImg_row['p_image'] ?>" alt="Image Product" class="img-responsive">
										<?php } ?>
              
                  <div class="productMask">
                    <ul class="list-inline productOption">
                      <li class="favourite-icon">
                        <a class="icon" href="javascript:void(0)">
                          <i class="fa fa-heart" aria-hidden="true"></i>
                        </a>
                      </li>

                    </ul>
                  </div>
                </div>
                <div class="productCaption">
                  <h2><a href="<?= base_url(); ?>productDetails/<?= $servicesImg_row['id'] ?>" target="_blank"><?= $servicesImg_row['name'] ?></a></h2>
                  <h3>$<?php if($servicesImg_row['discounted_price'] == ''){ ?>
													<?= $servicesImg_row['price'] ?>
											<?php }else{ ?>
												<?= $servicesImg_row['discounted_price'] ?>
											<?php } ?></h3>
                </div>
              </div>
						</div>
            <?php	endforeach; ?>
            
            
            
        </div>
        
      </div>
    </div>
  </div>
</section>




    <section class="clearfix productSection d-none">
      <div class="container">
        <div class="secotionTitle">
          <h2><span>Natural </span>Our Products</h2>
        </div>

        <div class="row">
          <div class="col-12">
            <div id="productSlider" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#productSlider" data-slide-to="0" class="active"></li>
                <li data-target="#productSlider" data-slide-to="1"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="productImage">
                        <img src="<?= base_url(); ?>/assets/front/img/home/home-product.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/home-product.jpg" alt="Image Product" class="img-responsive lazyestload">
                        <a href="cart.html"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="productInfo">
                        <h3>Traditional Massage</h3>
                        <h4>$25.00 Per Head</h4>
                        <ul class="list-inline rating">
                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                          <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                          <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                        </ul>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla paria tur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dese runt mollit anim id est laborum. </p>
                        <a href="javascript:void(0)" class="btn btn-primary first-btn">read more</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="carousel-item">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="productImage">
                        <img src="<?= base_url(); ?>/assets/front/img/home/home-product.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/home-product.jpg" alt="Image Product" class="img-responsive lazyestload">
                        <a href="cart.html"><i class="fa fa-shopping-basket" aria-hidden="true"></i></a>
                      </div>
                    </div>
                    
                    <div class="col-md-6">
                      <div class="productInfo">
                        <h3>Body Massage</h3>
                        <h4>$55.00 Per Head</h4>
                        <ul class="list-inline rating">
                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                          <li><i class="fa fa-star" aria-hidden="true"></i></li>
                          <li><i class="fa fa-star-o" aria-hidden="true"></i></li>
                        </ul>
                        <p>Magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla paria tur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia dese runt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                        <a href="javascript:void(0)" class="btn btn-primary first-btn">read more</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#productSlider" role="button" data-slide="prev">
                <i class="fa fa-long-arrow-left" aria-hidden="true"></i>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#productSlider" role="button" data-slide="next">
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>







<!-- CALL TO ACTION SECTION -->
    <section class="clearfix callAction">
      <div class="container">
        <div class="row">
          <div class="col-sm-7 col-sm-offset-1 col-xs-12">
            <div class="callInfo">
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum sed ut perspiciatis.</p>
            </div>
          </div>
          <div class="col-sm-4 col-xs-12">
            <a href="pricing.html" class="btn btn-primary first-btn callBtn">view Courses</a>
          </div>
        </div>
      </div>
    </section>





<!-- CONTACT US SECTION -->
    <section class="clearfix contactSection padding">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-7 col-xl-8">
            <div class="contactTitle">
              <h3>Book Your Appointment</h3>
            </div>

            <div class="contactForm">
              <div id="alert"></div><!--Response Holder-->
              <form action="#" id="" method="">
              <div class="form-group">
                  <input type="text" name="contact-form-name" class="form-control" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                  <input type="email" name="contact-form-email" class="form-control" placeholder="Your Email" required>
                </div>
               <div class="form-group">
                  <input type="text" name="contact-form-mobile" class="form-control" placeholder="Your Mobile" required>
                </div>
                <div class="form-group">
                    <input type="date" name="contact-form-date" class="form-control" placeholder="Date" required>
                </div>
                <div class="form-group">
                  <button type="submit" id="contact-submit-btn" class="btn btn-primary first-btn">Book Now</button>

                </div>
              </form>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 col-xl-4">
            <div class="holdingInfo patternbg">
              <p>Lorem ipsum dolor sit amet, consectetur adipiselit, sed do eiusmod.</p>
              <ul>
                <li><i class="fa fa-map-marker" aria-hidden="true"></i> 16/14 baidyabati matipara</li>
                <li><i class="fa fa-phone" aria-hidden="true"></i> +55 654 545 122 <br>+55 654 545 123</li>
                <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a> <br><a href="mailto:info2@example.com">info2@example.com</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>


<!-- PARTNER LOGO SECTION -->
    <section class="clearfix brandArea patternbg">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="owl-carousel partnersLogoSlider">
              <div class="slide">
                <div class="partnersLogo clearfix">
                  <img class="lazyestload" data-src="<?= base_url(); ?>/assets/front/img/home/brand-1.png" src="<?= base_url(); ?>/assets/front/img/home/brand-1.png" alt="Image Partner">
                </div>
              </div> 

              <div class="slide">
                <div class="partnersLogo clearfix">
                  <img class="lazyestload" data-src="<?= base_url(); ?>/assets/front/img/home/brand-2.png" src="<?= base_url(); ?>/assets/front/img/home/brand-2.png" alt="Image Partner">
                </div>
              </div>

              <div class="slide">
                <div class="partnersLogo clearfix">
                  <img class="lazyestload" data-src="<?= base_url(); ?>/assets/front/img/home/brand-1.png" src="<?= base_url(); ?>/assets/front/img/home/brand-1.png" alt="Image Partner">
                </div>
              </div>

              <div class="slide">
                <div class="partnersLogo clearfix">
                  <img class="lazyestload" data-src="<?= base_url(); ?>/assets/front/img/home/brand-4.png" src="<?= base_url(); ?>/assets/front/img/home/brand-4.png" alt="Image Partner">
                </div>
              </div>

              <div class="slide">
                <div class="partnersLogo clearfix">
                  <img class="lazyestload" data-src="<?= base_url(); ?>/assets/front/img/home/brand-1.png" src="<?= base_url(); ?>/assets/front/img/home/brand-1.png" alt="Image Partner">
                </div>
              </div>  

              <div class="slide">
                <div class="partnersLogo clearfix">
                  <img class="lazyestload" data-src="<?= base_url(); ?>/assets/front/img/home/brand-2.png"  src="<?= base_url(); ?>/assets/front/img/home/brand-2.png" alt="Image Partner">
                </div>
              </div>

            

              <div class="slide">
                <div class="partnersLogo clearfix">
                  <img class="lazyestload" data-src="<?= base_url(); ?>/assets/front/img/home/brand-4.png" src="<?= base_url(); ?>/assets/front/img/home/brand-4.png" alt="Image Partner">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


<!-- APPOINMENT MODAL -->
<div id="appoinmentModal" class="modal fade modalCommon" role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <!-- MODAL CONTENT-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title appointment-modal-title">Appointment For Hair Color</h4>
      </div>
      <div class="modal-body">
      <div id="appointment-alert" class="my-alert"></div>
      <form action="#" method="post" id="appoinmentModalForm">
          <!--Response Holder-->
          <div class="form-group categoryTitle">
            <h5>Service Date and Time</h5>
          </div>
          <div class="dateSelect form-half form-left">
            <div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
              <input type="text" name="appointment-form-date" class="form-control" placeholder="MM/DD/YYYY">
              <div class="input-group-addon">
                <span class="fa fa-calendar"></span>
              </div>
            </div>
          </div>

          <div class="timeSelect appointment-timeSelect form-half clearfix">
            <select id="guiest_id1" name="appointment-form-time" class="select-drop">
              <option value="0">10.00 AM</option>
              <option value="1">9.00 AM</option>
              <option value="2">8.00 AM</option>
              <option value="3">11.00 AM</option>
            </select>
          </div>

          <div class="form-group categoryTitle">
            <h5>Personal info</h5>
          </div>
          <div class="form-group form-half form-left">
            <input type="text" name="appointment-form-full-name" class="form-control" placeholder="Full name" required>
          </div>
          <div class="form-group form-half form-right">
            <input type="email" name="appointment-form-email" class="form-control" placeholder="Your email" required>
          </div>
          <div class="form-group form-half form-left">
            <input type="text" name="appointment-form-phone"  class="form-control" placeholder="Phone number" required>
          </div>
          <div class="form-group form-half form-right">
            <input type="text" name="appointment-form-address" class="form-control" placeholder="Your address" required>
          </div>
          <div class="form-group">
            <textarea class="form-control" name="appointment-form-message"  placeholder="Your Message" required></textarea>
          </div>
          <div class="form-group">
            <button type="submit" id="appointment-submit-btn" class="btn btn-primary first-btn">Submit Now</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
	function showServiceDetails(i){
		var i;
		//alert(i);
		$.ajax({	
					type: "POST",	
					url: "<?= base_url("front/home/fetchSearchService")?>",
					data: { serviceid: i },
					success: function(html) {		
						$(".activeService").hide();
						$(".displayService").html(html);
					}
			});

	}
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  

