 

<body id="body" class="body-wrapper static">
  <div class="se-pre-con"></div>
  <div class="main-wrapper">
    <!-- HEADER -->
    


 <section class="main-slider" data-loop="true" data-autoplay="true" data-interval="7000">
      <div class="inner">
        
        <!-- Slide One -->
        <div class="slide slideResize slide1" style="background-image: url(<?= base_url(); ?>/assets/front/img/home/home-slider-2.jpg);">
          <div class="container">
            <div class="slide-inner2 common-inner">
              <span class="h1 from-bottom">Welcome to n'gel</span><br>
              <span class="h4 from-bottom">We provide best skin care & aging solution </span><br>
              <a href="javascript:void(0)" class="btn btn-primary first-btn waves-effect waves-light scale-up">More Details</a>
            </div>
          </div>
        </div>

        <!-- Slide Two -->
        <div class="slide slideResize slide2" style="background-image: url(<?= base_url(); ?>/assets/front/img/home/home-slider-1.jpg);">
          <div class="container">
            <div class="slide-inner1 common-inner">
              <span class="h1 from-bottom">Skin Care Solution</span><br>
              <span class="h4 from-bottom">The best place of Mindfullness & Healthy body</span><br>
              <a href="javascript:void(0)" class="btn btn-primary first-btn waves-effect waves-light scale-up">More Details</a>
            </div>
          </div>
        </div>


        <!-- Slide Three -->
        <div class="slide slideResize slide3" style="background-image: url(<?= base_url(); ?>/assets/front/img/home/home-slider-3.jpg);">
          <div class="container">
            <div class="common-inner slide-inner3">
              <img src="<?= base_url(); ?>/assets/front/img/favicon.png" alt="Logo Icon" class="img-responsive">
              <span class="h1 from-bottom">luxury spa resort</span><br>
              <span class="h4 from-bottom">The real place of Mindfullness & Healthy body</span><br>
              <a href="cart.html" class="btn btn-primary first-btn waves-effect waves-light scale-up">Buy Now</a>
            </div>
          </div>
        </div>

        <!-- Slide Four -->
        <div class="slide slideResize slide4" style="background-image: url<?= base_url(); ?>/assets/front/assets/front/img/home/home-slider-4.jpg);">
          <div class="container">
            <div class="common-inner slide-inner4">
              <span class="h1 from-bottom">Most Beautiful Theme</span><br>
              <span class="h4 from-bottom">Angel is a beautiful theme and easy to customize</span><br>
              <a href="javascript:void(0)" class="btn btn-primary first-btn waves-effect waves-light scale-up">More Details</a>
            </div>
          </div>
        </div>

      </div>
    </section>
<!-- CHECK OUT SECTION -->
    <section class="clearfix contactSection padding">
      <div class="container">
        <div class="row">
          <div class="col-md-6 col-lg-7 col-xl-8">
            <div class="contactTitle">
              <h3>Get in touch</h3>
            </div>

            <div class="contactForm">
              <div id="alert">
                
              </div><!--Response Holder-->
              <form method="post" action="<?php echo base_url('contact/form') ?>" id=" " >
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
                  <textarea class="form-control" name="contact-form-message" placeholder="Your Message" required></textarea>
                </div>
                <div class="form-group">
                  <button type="submit" id=" " class="btn btn-primary first-btn">send Message</button>

                </div>
              </form>
            </div>
          </div>

          <div class="col-md-6 col-lg-5 col-xl-4">
            <div class="holdingInfo patternbg">
              <p>Lorem ipsum dolor sit amet, consectetur adipiselit, sed do eiusmod.</p>
              <ul>
                <li><i class="fa fa-map-marker" aria-hidden="true"></i> 16/14 Babor Road, Mohammad pur Dhaka, Bangladeshincididunt </li>
                <li><i class="fa fa-phone" aria-hidden="true"></i> +55 654 545 122 <br>+55 654 545 123</li>
                <li><i class="fa fa-envelope" aria-hidden="true"></i> <a href="mailto:info@example.com">info@example.com</a> <br><a href="mailto:info2@example.com">info2@example.com</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>


<!-- MAP SECTION -->
    <section class="clearfix mapSection">
     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.6664714794715!2d103.76132081482449!3d1.3767949618716222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da11bb49fff007%3A0x45518111f7edcaea!2sMaysprings!5e0!3m2!1sen!2sin!4v1660902007993!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>


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
                <form class="fancymorphingForm" action="#" method="post" id="fancymorphingForm">
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


  <!-- JAVASCRIPTS -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 
  <script src='plugins/selectbox/jquery.selectbox-0.1.3.min.js'></script> 
  <script src='plugins/datepicker/bootstrap-datepicker.min.js'></script> 
  <script src="plugins/lazyestload/lazyestload.js"></script> 
  <script src="plugins/smoothscroll/SmoothScroll.js"></script>  
  <script src="js/custom.js"></script>


<link href="options/optionswitch.css" rel="stylesheet">
<script src="options/optionswitcher.js"></script>
<script>

    //paste this code under head tag or in a seperate js file.
    // Wait for window load
    $(window).load(function() {
      alert();
      // Animate loader off screen
      $(".se-pre-con").fadeOut("slow");
    });

    
  </script>

</body>

</html>


