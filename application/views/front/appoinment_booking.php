<link href="<?= base_url(); ?>assets/front/appointment/style.css" rel="stylesheet" type="text/css">
<div class="main-wrapper">
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="col-md-12 col-lg-12 col-xl-12">
               <div class="row">
                  <div class="col-sm-12">
                     <div class="card">
                        <div class="card-body">
								<form class="" action="<?= base_url('add_appointment') ?>" method="post" enctype="multipart/form-data"> 
                           <div class="profile-box">
						  
							<div class="row">
								<div class="col-sm-6 col-12 avail-time">
									<div class="mb-3">
										<div class="schedule-calendar-col justify-content-start">
											<div class="row">
												<div class="col-md-4">
													<h4 class="font-weight-bold" >Service:</h4>
												</div>
												<div class="col-md-5">
													<h4 class="card-title font-weight-bold" style="color: #63d4d6;"><?= $serviceName['service_name']; ?></h4>
													<input type="hidden" value="<?= $serviceName['service_id']; ?>" name="service_id">
													<input type="hidden" value="<?= $serviceName['service_price']; ?>" name="service_price">
													<?php if($serviceName['times_packages'] == '1'){?>
														<input type="hidden" value="One Time session" name="times_packages">
													<?php }else{ ?>
														<input type="hidden" value="Package" name="times_packages">
													<?php } ?>
													
												</div>
											</div>
										<h4 class="card-title  mt-3">Schedule Timings</h4>
											<div class="row">
												<div class="col-md-5">
													<div class="mr-3">
														<div class="form-group">
															<select class="form-control therapist_name" name="therapist_name" require>
																<option value="" hidden>Select Therapist</option>
																	<?php foreach($allTharapist as $therapists) : ?>
																		<option value="<?= $therapists['id'] ?>"><?= $therapists['first_name']." ". $therapists['last_name'] ?></option>
																	<?php endforeach; ?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="mr-2">
														<div class="form-group">
															<input type="date" class="form-control schedule_date" placeholder="MM-DD-YYYY" name="schedule_date" require>
														</div>
													</div>
												</div>
												
												<div class="col-md-3">
													<div class="search-time-mobile">
														<input type="button" name="submit" value="Search" class="btn btn-primary first-btn h-60 px-2 Search">
													</div>
												</div>
											</div>  
                                         
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12 Available_Time">
                                   
                                 </div>
									<div class="row">
										<div class="col-md-6">
											<div class="token-slot mt-2 all_slots">
											
											</div>
										</div>
									</div>
                              </div>

							  	<div class="save_button">
									
								</div>
                           </div>
                           
						</form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<script>

$(document).ready(function(){
	$('.Search').click(function() {
		
    var therapistId = $('.therapist_name').val();
    var date = $('.schedule_date').val();
	
	 var now = new Date();
	 if(therapistId != '' && date != '')
	 {
		//alert(date);
		$.ajax({
				url: "<?= base_url("appointmentbookingSlot") ?>",
				type: "get",
				data: {
				therapistId: therapistId,
				date: date,
				},
				dataType: "json",
				success: function(data) {

				$(".all_slots").empty();

				$.each(data.availabletimelist, function(n, currentElem) {

					var inputdisable = '';
					$.each(data.bookslot, function(n, currentElem1) {
						let path = currentElem1['start_time'];
						let split = path.split(":");
						let splicedStr = split.slice(0, split.length - 1).join(":");

						if (currentElem['slot_start_time'] == splicedStr) {
						inputdisable = 'disabled';
						}
					});
					
					$(".all_slots").append('<div class="form-check-inline visits mr-1">' +
						'<label class="visit-btns">' +
						'<input type="radio" ' + inputdisable + ' id="timeslot" name="selected_timeslot" class="form-check-input" value="' + currentElem['slot_start_time'] + '-' + currentElem['slot_end_time'] + '">' +
						'<span class="visit-rsn"  data-toggle="tooltip" title="">' + currentElem['slot_start_time'] + '-' + currentElem['slot_end_time'] + '</span>' +
						'</label>' +
						'</div>');
						$(".available_Time").html('<h3 class="h3 book-btn2 mt-3 px-5 py-1 mx-3 rounded">Available Time </h3>');
						$(".save_button").html('<button class="btn btn-primary px-3 py-3" style="background-color: #63d4d6;">Save</button>');
				
				});

				}
				
			});

	 }else{
		$(".all_slots").html("<h4 class = 'font-weight-light text-capitalize'>Please select therapist name and date.</h4>");
	 }

	});

  });
</script>
