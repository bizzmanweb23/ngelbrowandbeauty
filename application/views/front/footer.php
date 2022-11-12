
    <!-- FOOTER -->
    <footer style="background-image: url(assets/front/img/footer-bg.jpg);">
      <!-- BACK TO TOP BUTTON -->
      <a href="#pageTop" class="backToTop"><i class="fa fa-angle-up" aria-hidden="true"></i></a>
      <!-- FOOTER INFO -->
      <div class="clearfix footerInfo">
        <div class="container">
          <div class="row">
            <div class="col-sm-3 col-xs-12">
              <div class="footerText">
                <a href="index.html" class="footerLogo">
              <img src="<?= base_url(); ?>assets/front/img/logo.png" class="img-fluid" style = "max-width: 150px;">

                </a>
                <p class="text-justify">Established in 2017，N’GEL has been consistently providing customized Semi-permanent Makeup and Aesthetic Beauty Skin management to all our dear customers.</p>
                
              </div>
            </div>
            <div class="col-sm-3 col-xs-12 paddingLeft">
              <div class="footerInfoTitle">
                <h4>Useful Links</h4>
              </div>
              <div class="useLink">
                <ul class="list-unstyled">
								<?php foreach($allchild_category as $allchild_category_row): ?>
										<li><a href="<?php echo base_url('services/'.$allchild_category_row['id']) ?>"><i class="fa fa-angle-double-right" aria-hidden="true"></i><?= $allchild_category_row['category_name'];?></a></li>
									<?php	endforeach; ?>
                </ul>
              </div>
            </div>
            <div class="col-sm-3 col-xs-12">
              <div class="footerInfoTitle">
                <h4>Courses</h4>
              </div>
              <div class="footerGallery row">
								<div class="row">
									<div class="col-6 col-md-6 col-lg-6 mb-3 mb-md-0">
										<a href="gallery-v2.html">
											<img class="" data-src="<?= base_url(); ?>/assets/front/img/home/course2.jpg" src="<?= base_url(); ?>/assets/front/img/home/course2.jpg" alt="gallery-img">
										</a>
									</div>

									<div class="col-6 col-md-6 col-lg-6 mb-3 mb-md-0">
										<a href="gallery-v2.html">
											<img class="" data-src="<?= base_url(); ?>/assets/front/img/home/course3.jpg" src="<?= base_url(); ?>/assets/front/img/home/course3.jpg" alt="gallery-img">
										</a>
									</div>
								</div>
                <div class="row pt-2">
									<div class="col-6 col-md-6 col-lg-6 mb-3 mb-md-0">
										<a href="gallery-v2.html">
											<img class="" data-src="<?= base_url(); ?>/assets/front/img/home/course4.jpg" src="<?= base_url(); ?>/assets/front/img/home/course4.jpg" alt="gallery-img">
										</a>
									</div>

									<div class="col-6 col-md-6 col-lg-6 mb-3 mb-md-0">
										<a href="gallery-v2.html">
											<img class="" data-src="<?= base_url(); ?>/assets/front/img/home/course1.jpg" src="<?= base_url(); ?>/assets/front/img/home/course1.jpg" alt="gallery-img">
										</a>
									</div>
								</div>

               
              </div>
            </div>

            <div class="col-sm-3 col-xs-12">
              <div class="footerInfoTitle">
                <h4>Contact Us</h4>
              </div>

              <div class="useLink">
							<ul class="list-unstyled">
                <li><i class="fa fa-map-marker" aria-hidden="true"></i> 5 HARPER ROAD , #02-01 SINGAPORE 369673 </li>
                <li><i class="fa fa-phone" aria-hidden="true"></i> +55 654 545 122</li>
                <li><i class="fa fa-envelope" aria-hidden="true"></i> info@example.com</li>
              </ul>
                
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- COPY RIGHT -->
      <div class="clearfix copyRight">
        <div class="container">
          <div class="row">
            <div class="col-md-5 order-md-1">
              <ul class="list-inline socialLink">
                <li><a href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                <li><a href="javascript:void(0)"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
              </ul>
            </div>

            <div class="col-md-7">
              <div class="copyRightText">
                <p>&copy; 2022 Copyright <a target="_blank" href="#">Ngelbrowandbeauty</a> by <a target="_blank" href="#">CSS PTE LTD</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </div>


  <!-- FANCY SEARCH -->
  <div id="morphing-content" class="morphing-content">
    <!-- FORM -->
    <section class="morphing-searchBox" id="quote">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center">Search our product</h2>
            <div class="row">
              <div class="col-lg-6">
                <form class="fancymorphingForm" action="" method="post" id="">
                  <div class="input-group">
                    <input type="text" class="form-control" required="" id="expire" placeholder="Search...">
                    <div class="input-group-append">
                      <button class="input-group-text btn" type="submit"><i class="fa fa-search text-white"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script>
    $(function(){
      
      $('.login-btn').click(function(){
        $form = $('#login-form').serialize();
       
        $.ajax({
          url : '<?php echo base_url() ?>/front/login',
          method : 'POST',
          data : $form,
          success : function(data){
            alert(data);
          },
          error : function(data){
            alert(data);
          }
        });


      });
      $('.signup-btn').click(function(){
        alert();
      });
    });
  	//paste this code under head tag or in a seperate js file.
  	// Wait for window load
  	$(window).load(function() {
  		// Animate loader off screen
  		$(".se-pre-con").fadeOut("slow");
  	});
  </script>
  <script>
      $('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
  </script>


</body>

</html>
