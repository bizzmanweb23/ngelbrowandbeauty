 

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
  <section class="clearfix varietySection">
      <div class="container">
        <div class="secotionTitle">
          <h2><span>Discover</span>variety of spa</h2>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="tabbable tabTop"> 
              <ul class="nav nav-tabs">
             <?php foreach($data as $row) {?>
              
                <li>
                   <a href="<?php echo base_url() ?>/get-services-list/<?php echo $row['id']?>">
                    <?= $row['name'] ?></a>
                </li>
          
             
              <?php }?>
            </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="hair">
                  <div class="tabbable tabs-left">
                    <div class="row">
                      <div class="col-md-5 col-lg-4">
                        <ul class="nav nav-tabs">
                            <?php foreach($services as $row) {?>
                          <li><a href="#braidstwist" data-toggle="tab" class="active"><?php echo $row['category_name']; ?> <span>$25<!-- </span></a></li>
                          <li><a href="#haircolor" data-toggle="tab">Hair Color <span>$40</span></a></li>
                          <li><a href="#hairextension" data-toggle="tab">Hair Extension<span>$19</span></a></li>
                          <li><a href="#correctivecolor" data-toggle="tab">Corrective Color<span>$13</span></a></li>
                          <li><a href="#haircut" data-toggle="tab">Hair Cut<span>$48</span></a></li>
                          <li><a href="#partialfoil" data-toggle="tab">Partial Foil<span>$10</span></a></li>
                          <li><a href="#extensionpertrack" data-toggle="tab">Extension Per Track<span>$40</span></a></li> -->
                           <?php }?> 
                        </ul>
                      </div>

                      <div class="col-md-7 col-lg-8">
                        <div class="tab-content">
                          <div class="tab-pane active" id="braidstwist">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Braids & Twist</h3>
                              <h4>$25.00 Per Head</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="javascript:void(0)" class="btn btn-primary first-btn" data-toggle="modal" data-target="#appoinmentModal">make An Appoinment</a>
                            </div>
                          </div>

                          <div class="tab-pane" id="haircolor">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-6.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-6.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Color</h3>
                              <h4>$40.00 Per Head</h4>
                              <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>

                          <div class="tab-pane" id="hairextension">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-2.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-2.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Extension</h3>
                              <h4>$19.00 Per Head</h4>
                              <p>Amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>

                          <div class="tab-pane" id="correctivecolor">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-3.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-3.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Corrective Color</h3>
                              <h4>$13.00 Per Head</h4>
                              <p>Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>

                          <div class="tab-pane" id="haircut">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-4.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-4.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Cut</h3>
                              <h4>$48.00 Per Head</h4>
                              <p>Dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>

                          <div class="tab-pane" id="partialfoil">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-5.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-5.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Partial Foil</h3>
                              <h4>$10.00 Per Head</h4>
                              <p>Sed do eiusmod
                              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>

                          <div class="tab-pane" id="extensionpertrack">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-6.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-6.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Extension Per Track</h3>
                              <h4>$40.00 Per Head</h4>
                              <p>Voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                              proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="tab-pane" id="makeup">
                  <div class="tabbable tabs-left">
                    <div class="row">
                      <div class="col-md-5 col-lg-4">
                        <ul class="nav nav-tabs">
                          <li><a href="#braidstwist1" data-toggle="tab" class="active">Braids & Twist <span>$25</span></a></li>
                          <li><a href="#haircolor1" data-toggle="tab">Hair Color <span>$40</span></a></li>
                          <li><a href="#hairextension1" data-toggle="tab">Hair Extension<span>$19</span></a></li>
                          <li><a href="#correctivecolor1" data-toggle="tab">Corrective Color<span>$13</span></a></li>
                          <li><a href="#haircut1" data-toggle="tab">Hair Cut<span>$48</span></a></li>
                          <li><a href="#partialfoil1" data-toggle="tab">Partial Foil<span>$10</span></a></li>
                          <li><a href="#extensionpertrack1" data-toggle="tab">Extension Per Track<span>$40</span></a></li>
                        </ul>
                      </div>

                      <div class="col-md-7 col-lg-8">
                        <div class="tab-content">
                          <div class="tab-pane active" id="braidstwist1">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-2.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-2.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Braids & Twist</h3>
                              <h4>$25.00 Per Head</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn" data-toggle="modal" data-target="#appoinmentModal">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="haircolor1">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-3.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-3.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Color</h3>
                              <h4>$40.00 Per Head</h4>
                              <p>Dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="hairextension1">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-4.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-4.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Extension</h3>
                              <h4>$19.00 Per Head</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="correctivecolor1">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-5.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-5.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Corrective Color</h3>
                              <h4>$13.00 Per Head</h4>
                              <p>Ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                              consequat. Duis aute irure dolor in reprehenderit in.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="haircut1">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-6.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-6.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Cut</h3>
                              <h4>$48.00 Per Head</h4>
                              <p>Et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="partialfoil1">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Partial Foil</h3>
                              <h4>$10.00 Per Head</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="extensionpertrack1">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-2.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-2.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Extension Per Track</h3>
                              <h4>$40.00 Per Head</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="facial">
                  <div class="tabbable tabs-left">
                    <div class="row">
                      <div class="col-md-5 col-lg-4">
                        <ul class="nav nav-tabs">
                          <li><a href="#braidstwist2" data-toggle="tab" class="active">Braids & Twist <span>$25</span></a></li>
                          <li><a href="#haircolor11" data-toggle="tab">Hair Color <span>$40</span></a></li>
                          <li><a href="#hairextension11" data-toggle="tab">Hair Extension<span>$19</span></a></li>
                          <li><a href="#correctivecolor11" data-toggle="tab">Corrective Color<span>$13</span></a></li>
                          <li><a href="#haircut11" data-toggle="tab">Hair Cut<span>$48</span></a></li>
                          <li><a href="#partialfoil11" data-toggle="tab">Partial Foil<span>$10</span></a></li>
                          <li><a href="#extensionpertrack11" data-toggle="tab">Extension Per Track<span>$40</span></a></li>
                        </ul>
                      </div>

                      <div class="col-md-7 col-lg-8">
                        <div class="tab-content">
                          <div class="tab-pane active" id="braidstwist2">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-3.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-3.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Braids & Twist</h3>
                              <h4>$25.00 Per Head</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn" data-toggle="modal" data-target="#appoinmentModal">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="haircolor11">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-4.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-4.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Color</h3>
                              <h4>$40.00 Per Head</h4>
                              <p>Magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="hairextension11">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-5.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-5.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Extension</h3>
                              <h4>$19.00 Per Head</h4>
                              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="correctivecolor11">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-6.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-6.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Cut</h3>
                              <h4>$48.00 Per Head</h4>
                              <p>Nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="haircut11">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Cut</h3>
                              <h4>$48.00 Per Head</h4>
                              <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="partialfoil11">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-2.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-2.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Partial Foil</h3>
                              <h4>$10.00 Per Head</h4>
                              <p>Dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="extensionpertrack11">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-3.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-3.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Extension Per Track</h3>
                              <h4>$40.00 Per Head</h4>
                              <p>Incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="massage">
                  <div class="tabbable tabs-left">
                    <div class="row">
                      <div class="col-md-5 col-lg-4">
                        <ul class="nav nav-tabs">
                          <li><a href="#braidstwist3" data-toggle="tab" class="active">Braids & Twist <span>$25</span></a></li>
                          <li><a href="#haircolor112" data-toggle="tab">Hair Color <span>$40</span></a></li>
                          <li><a href="#hairextension112" data-toggle="tab">Hair Extension<span>$19</span></a></li>
                          <li><a href="#correctivecolor112" data-toggle="tab">Corrective Color<span>$13</span></a></li>
                          <li><a href="#haircut112" data-toggle="tab">Hair Cut<span>$48</span></a></li>
                          <li><a href="#partialfoil112" data-toggle="tab">Partial Foil<span>$10</span></a></li>
                          <li><a href="#extensionpertrack112" data-toggle="tab">Extension Per Track<span>$40</span></a></li>
                        </ul>
                      </div>

                      <div class="col-md-7 col-lg-8">
                        <div class="tab-content">
                          <div class="tab-pane active" id="braidstwist3">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-4.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-4.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Braids & Twist</h3>
                              <h4>$25.00 Per Head</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn" data-toggle="modal" data-target="#appoinmentModal">make An Appoinment</a>
                            </div>
                          </div>

                          <div class="tab-pane" id="haircolor112">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-5.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-5.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Color</h3>
                              <h4>$40.00 Per Head</h4>
                              <p>Nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>

                          <div class="tab-pane" id="hairextension112">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-6.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-6.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Extension</h3>
                              <h4>$19.00 Per Head</h4>
                              <p>Et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>

                          <div class="tab-pane" id="correctivecolor112">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Corrective Color</h3>
                              <h4>$13.00 Per Head</h4>
                              <p>Labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>

                          <div class="tab-pane" id="haircut112">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-2.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-2.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Cut</h3>
                              <h4>$48.00 Per Head</h4>
                              <p>Incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>

                          <div class="tab-pane" id="partialfoil112">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-3.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-3.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Partial Foil</h3>
                              <h4>$10.00 Per Head</h4>
                              <p>Magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>

                          <div class="tab-pane" id="extensionpertrack112">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-4.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-4.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Extension Per Track</h3>
                              <h4>$40.00 Per Head</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                              tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                              quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                              consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                              cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                              proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="nail">
                  <div class="tabbable tabs-left">
                    <div class="row">
                      <div class="col-md-5 col-lg-4">
                        <ul class="nav nav-tabs">
                          <li><a href="#braidstwist4" data-toggle="tab" class="active">Braids & Twist <span>$25</span></a></li>
                          <li><a href="#haircolor113" data-toggle="tab">Hair Color <span>$40</span></a></li>
                          <li><a href="#hairextension113" data-toggle="tab">Hair Extension<span>$19</span></a></li>
                          <li><a href="#correctivecolor113" data-toggle="tab">Corrective Color<span>$13</span></a></li>
                          <li><a href="#haircut113" data-toggle="tab">Hair Cut<span>$48</span></a></li>
                          <li><a href="#partialfoil113" data-toggle="tab">Partial Foil<span>$10</span></a></li>
                          <li><a href="#extensionpertrack113" data-toggle="tab">Extension Per Track<span>$40</span></a></li>
                        </ul>
                      </div>

                      <div class="col-md-7 col-lg-8">
                        <div class="tab-content">
                          <div class="tab-pane active" id="braidstwist4">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-5.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-5.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Braids & Twist</h3>
                              <h4>$25.00 Per Head</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn" data-toggle="modal" data-target="#appoinmentModal">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="haircolor113">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-6.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-6.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Color</h3>
                              <h4>$40.00 Per Head</h4>
                              <p>Ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="hairextension113">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Extension</h3>
                              <h4>$19.00 Per Head</h4>
                              <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="correctivecolor113">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-2.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-2.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Corrective Color</h3>
                              <h4>$13.00 Per Head</h4>
                              <p>Tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="haircut113">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-3.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-3.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Cut</h3>
                              <h4>$48.00 Per Head</h4>
                              <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="partialfoil113">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-4.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-4.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Partial Foil</h3>
                              <h4>$10.00 Per Head</h4>
                              <p>Bore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="extensionpertrack113">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-5.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-5.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Extension Per Track</h3>
                              <h4>$40.00 Per Head</h4>
                              <p>Gna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="tab-pane" id="waxing">
                  <div class="tabbable tabs-left">
                    <div class="row">
                      <div class="col-md-5 col-lg-4">
                        <ul class="nav nav-tabs">
                          <li><a href="#braidstwist5" data-toggle="tab" class="active">Braids & Twist <span>$25</span></a></li>
                          <li><a href="#haircolor114" data-toggle="tab">Hair Color <span>$40</span></a></li>
                          <li><a href="#hairextension114" data-toggle="tab">Hair Extension<span>$19</span></a></li>
                          <li><a href="#correctivecolor114" data-toggle="tab">Corrective Color<span>$13</span></a></li>
                          <li><a href="#haircut114" data-toggle="tab">Hair Cut<span>$48</span></a></li>
                          <li><a href="#partialfoil114" data-toggle="tab">Partial Foil<span>$10</span></a></li>
                          <li><a href="#extensionpertrack114" data-toggle="tab">Extension Per Track<span>$40</span></a></li>
                        </ul>
                      </div>

                      <div class="col-md-7 col-lg-8">
                        <div class="tab-content">
                          <div class="tab-pane active" id="braidstwist5">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-6.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-6.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Braids & Twist</h3>
                              <h4>$25.00 Per Head</h4>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn" data-toggle="modal" data-target="#appoinmentModal">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="haircolor114">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Color</h3>
                              <h4>$40.00 Per Head</h4>
                              <p>Dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="hairextension114">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-2.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-2.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Extension</h3>
                              <h4>$19.00 Per Head</h4>
                              <p>Tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="correctivecolor114">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-3.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-3.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Corrective Color</h3>
                              <h4>$13.00 Per Head</h4>
                              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="haircut114">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-4.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-4.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Hair Cut</h3>
                              <h4>$48.00 Per Head</h4>
                              <p>Incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="partialfoil114">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-5.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-5.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Partial Foil</h3>
                              <h4>$10.00 Per Head</h4>
                              <p>Rem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
                            </div>
                          </div>
    
                          <div class="tab-pane" id="extensionpertrack114">
                            <div class="varietyContent">
                              <img src="<?= base_url(); ?>/assets/front/img/home/variety-6.jpg" data-src="<?= base_url(); ?>/assets/front/img/home/variety-6.jpg" alt="Image Variety" class="img-responsive lazyestload">
                              <h3>Extension Per Track</h3>
                              <h4>$40.00 Per Head</h4>
                              <p>Bore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
                              <a href="#" class="btn btn-primary first-btn">make An Appoinment</a>
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
        </div>
      </div>
    </section>
  


 <!-- FOOTER -->
 
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

  <script>
  	//paste this code under head tag or in a seperate js file.
  	// Wait for window load
  	$(window).load(function() {
  		// Animate loader off screen
  		$(".se-pre-con").fadeOut("slow");

  	});
    $(function(){
      alert();
    });
  </script>

<link href="options/optionswitch.css" rel="stylesheet">
<script src="options/optionswitcher.js"></script>
</body>

</html>


