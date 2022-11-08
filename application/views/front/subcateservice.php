
<!-- VARIETY SECTION -->
    <section class="clearfix varietySection">
      <div class="container-fluid">
        <div class="secotionTitle">
          <h2><span>Discover</span><?= $catagoryName['sub_child_category']; ?></h2>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="tabbable tabTop">
							<!--<div class="card mb-3">
								<div class="card-header font-weight-bold" style="background-color: #63d4d6;">
								<div class="font-weight-bold text-center" style="color: #fff;font-size: 25px;"><?= $catagoryName['sub_child_category']; ?></div>
								</div>
							</div>-->
              
              <div class="tab-content">
                <div class="tab-pane active">
                  <div class="tabbable tabs-left">
                    <div class="row">
											
                      <div class="col-md-4 col-lg-3">
											<!--<h4 class="card-title font-weight-bold" style="color: #63d4d6;"><?= $serviceName['service_name']; ?></h4>-->
											
                        <ul class="nav nav-tabs">
													<?php foreach($allservices as $allservices_row): ?>
                          	<li><a href="javascript:void(0)" style="cursor: pointer;" data-toggle="tab" class="active" onclick="showServiceDetails(<?= $allservices_row['id'] ?>)"><?= $allservices_row['service_name'] ?></a></li>
													<?php	endforeach; ?>
                          
                        </ul>
                      </div>

                      <div class="col-md-8 col-lg-9">
                        <div class="tab-content">
													<div class="activeService">
														<form name ="payroll" action="<?= base_url('add_to_service')?>" method="post" enctype="multipart/form-data">
														
															<?php foreach($activeServices as $servicesImg_row): 
																$id = $servicesImg_row['id']; 
																$user_id = $this->session->userdata('id');
																$order_servicerownum_sql = "SELECT nbb_order_service.*
																FROM nbb_order_service 
																WHERE nbb_order_service.user_id = '".$user_id."' AND nbb_order_service.service_id = $id AND nbb_order_service.payment_status = '1' AND nbb_order_service.status = '2'";
																$order_servicerownum_query = $this->db->query($order_servicerownum_sql);
																$order_service_rownum = $order_servicerownum_query->num_rows();
																?>
																<input type="hidden" name="service_id" value="<?= $id; ?>">
																<div class="tab-pane" id="braidstwist_<?= $id; ?>">
																	<div class="varietyContent">
																		<div class="row">

																			<div class="col-md-5">
																				<img src="<?= base_url(); ?>/uploads/service_img/<?= $servicesImg_row['service_icon'] ?>" data-src="<?= base_url(); ?>/uploads/service_img/<?= $servicesImg_row['service_icon'] ?>" alt="Image Variety" class="img-responsive">
																			</div>
																			<div class="col-md-7">

																			<h3 class="mt-5 pt-2"><?= $servicesImg_row['service_name'] ?></h3>
																	<div class="row pt-2">	
																		<div class="col-md-12">
																			<label class="font-weight-bold">Description:</label>
																		</div>
																	</div>
																	<div class="row pt-1">
																				
																				<div class="col-md-12">
																					<?= $servicesImg_row['description'] ?>
																				</div>
																	</div>
																	<!--	<h4 class="price">One Time price: 
																			<div class="form-check">
																				<input class="form-check-input" type="radio" name="timePrice" id="timesPrice1" value="1" required>
																			</div>
																			<span class="pull-right" style="font-size: 40px">
																				<?php if($servicesImg_row['discount_price'] == 0){ ?>
																					$<?= $servicesImg_row['service_price'] ?>
																					<input type="hidden" name="service_price" value="<?= $servicesImg_row['service_price']; ?>">
																				<?php }else{ ?>
																					$<?= $servicesImg_row['discount_price'] ?>
																					<input type="hidden" name="service_price" value="<?= $servicesImg_row['discount_price']; ?>">
																				<?php } ?>
																			</span>
																		</h4>
																		<h4 class="price"><?= $servicesImg_row['package_session'] ?> times Package: 
																			<div class="form-check">
																				<input class="form-check-input" type="radio" name="timePrice" id="timesPrice2" value="10" required>
																			</div>
																			<span class="pull-right" style="font-size: 40px;">
																			
																				$<?= $servicesImg_row['package_times_price'] ?>
																				<input type="hidden" name="package_times_price" value="<?= $servicesImg_row['package_times_price']; ?>">
																			</span>
																			
																		</h4>-->
																		<?php if($servicesImg_row['service_category'] == 1){ ?>
																		<div class="row mt-3">
																					<div class="col-md-6" style="font-size: 20px; color: #63d4d6;">
																					<?php if($order_service_rownum > 0){ ?>
																							
																					<?php }else{ ?>
																						<input type="radio" id="timesPrice1" name="timePrice" value="1" required>
																					<?php } ?>
																						
	  																				<label>One Time price</label>
																					</div>
																					<div class="col-md-6 font-weight-bold" style="font-size: 28px; color: #63d4d6;">
																							<?php if($servicesImg_row['discount_price'] == 0){ ?>
																							$<?= $servicesImg_row['service_price'] ?>
																							<input type="hidden" name="service_price" value="<?= $servicesImg_row['service_price']; ?>">
																						<?php }else{ ?>
																							$<?= $servicesImg_row['discount_price'] ?>
																							<input type="hidden" name="service_price" value="<?= $servicesImg_row['discount_price']; ?>">
																						<?php } ?>
																					</div>
																		</div>
																		<div class="row pt-2">
																				<div class="col-md-6" style="font-size: 20px; color: #63d4d6;">
																						<?php if($order_service_rownum > 0){ ?>
																						
																						<?php }else{ ?>
																								<input type="radio" id="timesPrice2" name="timePrice" value="10" required>
																						<?php } ?>
	  																				<label><?= $servicesImg_row['package_session'] ?> Times Package:</label>
																					</div>
																					<div class="col-md-6 font-weight-bold" style="font-size: 28px; color: #63d4d6;">
																					$<?= $servicesImg_row['package_times_price'] ?>
																					<input type="hidden" name="package_times_price" value="<?= $servicesImg_row['package_times_price']; ?>">
																					</div>
																		</div>
																		<?php }else{ ?>
																			<div class="row mt-3">
																				<div class="col-md-2" style="font-size: 20px; color: #63d4d6;">
														  							<label>Price:</label>
																				</div>
																				<div class="col-md-6 font-weight-bold" style="font-size: 28px; color: #63d4d6;">					
																				<?php if($servicesImg_row['lowest_price'] != 0){ ?>
																					S$&nbsp;<?= $servicesImg_row['lowest_price'] ?>&nbsp;-&nbsp;
																				<?php } ?>		
																				S$&nbsp;<?= $servicesImg_row['service_price'] ?>
																						
																					<input type="hidden" name="service_price" value="<?= $servicesImg_row['service_price']; ?>">
																				</div>
																			</div>
																		<?php } ?>
																		
																		<div class="mt-3">
																		<?php if($this->session->userdata('id')>0){ 
																			 if($order_service_rownum > 0){ 
																			?>
																			<a href="<?= base_url('appointmentBooking/'.$id)?>" class="btn btn-primary first-btn px-2" target="_blank">make An Appoinment</a>
																		<?php }else{ ?>
																			<button type="submit" class="btn btn-primary first-btn w-75 px-2">Buy now</button>
																			<?php } ?>
																			

																		<?php }else{ ?>
																			<a href="javascript:void(0)" onclick="return swal('Please Login First')" class="btn btn-primary first-btn px-2">Buy now</a>
																		<?php } ?>
																		<?php /*if($this->session->userdata('id')>0){ ?>
																			<a href="<?= base_url('appointmentBooking/'.$id)?>" class="btn btn-primary first-btn px-2" target="_blank">make An Appoinment</a>
																		<?php }else{ ?>
																			<a href="javascript:void(0)" onclick="return swal('Please Login First')" class="btn btn-primary first-btn px-2">make An Appoinment</a>
																		<?php }*/  ?>
																	</div>

																</div>	
																	

																			</div>

																		</div>
																		
																		
															</div>
														<?php	endforeach; ?>
														</form>
													</div>
													
												<div class="displayService"></div>
                         
                        </div>												
                      </div>
                    </div>
                  </div>
                </div>

              </div>
 						</div>

						<div class="row">
						<div class="col-md-12 col-lg-12">
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
