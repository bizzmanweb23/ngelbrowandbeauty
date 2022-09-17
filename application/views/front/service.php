
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
                      <div class="col-md-5 col-lg-4">
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
																		<a href="javascript:void(0)" class="btn btn-primary first-btn" data-toggle="modal" data-target="#appoinmentModal">make An Appoinment</a>
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


<!-- OFFERS SECTION -->
    <!--<section class="clearfix offersSection patternbg">
      <div class="container">
        <div class="row">
          <div class="col-sm-3 col-xs-12">
            <div class="offerContent">
              <img class="lazyestload" src="img/home/offer-1.jpg" data-src="img/home/offer-1.jpg" alt="Image Offer">
              <div class="offerMasking">
                <div class="offerTitle"><h4><a href="#">Skin Care</a></h4></div>
              </div>
              <div class="offerPrice"><h5>$25</h5></div>
            </div>
          </div>
          <div class="col-sm-3 col-xs-12">
            <div class="offerContent">
              <img class="lazyestload" data-src="img/home/offer-2.jpg" src="img/home/offer-2.jpg" alt="Image Offer">
              <div class="offerMasking">
                <div class="offerTitle"><h4><a href="#">Body massage</a></h4></div>
              </div>
              <div class="offerPrice"><h5>$45</h5></div>
            </div>
          </div>
          <div class="col-sm-3 col-xs-12">
            <div class="offerContent">
              <img class="lazyestload" src="img/home/offer-3.jpg" data-src="img/home/offer-3.jpg" alt="Image Offer">
              <div class="offerMasking">
                <div class="offerTitle"><h4><a href="#">Nail Care</a></h4></div>
              </div>
              <div class="offerPrice"><h5>$65</h5></div>
            </div>
          </div>
          <div class="col-sm-3 col-xs-12">
            <div class="offerContent">
              <img class="lazyestload" src="img/home/offer-4.jpg" data-src="img/home/offer-4.jpg" alt="Image Offer">
              <div class="offerMasking">
                <div class="offerTitle"><h4><a href="#">beauty Care</a></h4></div>
              </div>
              <div class="offerPrice"><h5>$75</h5></div>
            </div>
          </div>
        </div>
      </div>
    </section>-->

<!-- PRICING 4 COL SECTION -->
    <section class="clearfix pricingSection">
      <div class="container">
        <div class="secotionTitle">
          <h2><span>Style 1 </span>Services Pricing</h2>
        </div>

        <div class="row">

          <div class="col-md-4">
            <div class="priceTableWrapper">
              <div class="priceImage">
                <img src="<?= base_url(); ?>/uploads/service_img/ao.jpg" data-src="<?= base_url(); ?>/uploads/service_img/ao.jpg" alt="Image Price" class="img-responsive">
                <div class="maskImage">
                  <h3>Hydration Skin Care</h3>
                </div>
                <div class="priceTag">
                  <h4>$59</h4>
                </div>
              </div>

              <div class="priceInfo">
                <ul class="list-unstyled">
                  <li>Body Hand and Foot Massage</li>
                  <li>Lip Blush</li>
                  <li>6D Microblading Brows</li>
                  <li>Natural Classic</li>
                </ul>
                <a href="javascript:void(0)" class="btn btn-primary first-btn">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="priceTableWrapper">
              <div class="priceImage">
                <img src="<?= base_url(); ?>/uploads/service_img/h.jpg" data-src="<?= base_url(); ?>/uploads/service_img/h.jpg" alt="Image Price" class="img-responsive">
                <div class="maskImage">
                  <h3>Peel Deep Cleansing</h3>
                </div>
                <div class="priceTag">
                  <h4>$79</h4>
                </div>
              </div>

              <div class="priceInfo">
                <ul class="list-unstyled">
                  <li>Gua Sha (Face , Eyes, Neck )</li>
                  <li>Lash Mix</li>
                  <li>Pores Therapy</li>
                  <li>Mites Removal</li>
                </ul>
                <a href="javascript:void(0)" class="btn btn-primary first-btn">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-md-4">
            <div class="priceTableWrapper">
              <div class="priceImage">
                <img src="<?= base_url(); ?>/uploads/service_img/y.jpg" data-src="<?= base_url(); ?>/uploads/service_img/y.jpg" alt="Image Price" class="img-responsive">
                <div class="maskImage">
                  <h3>Acne Care</h3>
                </div>
                <div class="priceTag">
                  <h4>$85</h4>
                </div>
              </div>

              <div class="priceInfo">
                <ul class="list-unstyled">
                  <li>Tightening Care</li>
                  <li>V-shape face lifting</li>
                  <li>Fine Eyeliner</li>
                  <li>IPL</li>
                </ul>
                <a href="javascript:void(0)" class="btn btn-primary first-btn">Buy Now</a>
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

