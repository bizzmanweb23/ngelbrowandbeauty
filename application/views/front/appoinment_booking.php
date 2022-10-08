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
								<form class=""> 
                           <div class="profile-box">
						   <h4 class="card-title">Schedule Timings</h4>
							<div class="row">
								<div class="col-sm-6 col-12 avail-time">
									<div class="mb-3">
										<div class="schedule-calendar-col justify-content-start">
											
											<div class="row">
												<div class="col-md-5">
													<div class="mr-3">
														<div class="form-group">
															<select class="form-control therapist_name" name="therapist_name" require>
																<option hidden>Select Therapist</option>
																	<?php foreach($allTharapist as $therapists) : ?>
																		<option value="<?= $therapists['id'] ?>"><?= $therapists['first_name']." ". $therapists['last_name'] ?></option>
																	<?php endforeach; ?>
															</select>
														</div>
													</div>
												</div>
												<div class="col-md-4">
													<div class="mr-3">
														<div class="dateSelect col-md-12">
															<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
															<input type="text" class="form-control schedule_date" placeholder="MM/DD/YYYY" name="schedule_date" require>
															<div class="input-group-addon">
																<span class="fa fa-calendar"></span>
															</div>
															</div>
														</div>
													</div>
												</div>
												
												<div class="col=md-3">
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
                                 <div class="col-lg-12">
                                    <h3 class="h3 text-center book-btn2 mt-3 px-5 py-1 mx-3 rounded">Available Time </h3>
                                    <div class="text-center mt-3">
                                       <h4 class="h4 mb-2"> </h4>
                                      
                                    </div>
                                    <div class="token-slot mt-2 all_slots">
                                      
                                      
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="text-center">
                              <button class="btn btn-primary px-3 py-3" style="background-color: #63d4d6;">Save</button>
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
	//$('.schedule_date,.therapist_name').change(function() { 
	$('.Search').click(function() {
		
    var therapistId = $('.therapist_name').val();
    var date = $('.schedule_date').val();
    //var selectedDate = new Date(date);
	//alert(date);
    var now = new Date();
   /*if (selectedDate < now) {
    alert("Date must be in the future");
    return false;
   }*/
    //alert(duration);
    $.ajax({
      url: "<?= base_url("appointmentbookingSlot") ?>",
      type: "get",
      data: {
        therapistId: therapistId,
        date: date,
      },
      dataType: "json",
      success: function(data) {
       
        //$('.all_slots').html('');

		  $(".all_slots").empty();

        $.each(data.availabletimelist, function(n, currentElem) {
          //var result = data.availabletimelist[0];
          var inputdisable = '';
          $.each(data.bookslot, function(n, currentElem1) {
				let path = currentElem1['start_time'];
				let split = path.split(":");
				let splicedStr = split.slice(0, split.length - 1).join(":");

            if (currentElem['slot_start_time'] == splicedStr) {
              inputdisable = 'disabled';
				  //alert(inputdisable);
            }
          });
		  
          $(".all_slots").append('<div class="form-check-inline visits mr-0">' +
            '<label class="visit-btns">' +
            '<input type="checkbox" ' + inputdisable + ' id="timeslot" onclick="myFunction()" name="selected_timeslot" class="form-check-input" value="' + currentElem['slot_start_time'] + '-' + currentElem['slot_end_time'] + '">' +
            '<span class="visit-rsn"  data-toggle="tooltip" title="">' + currentElem['slot_start_time'] + '-' + currentElem['slot_end_time'] + '</span>' +
            '</label>' +
            '</div>');
		
        });


      }
      
    })
});

  });
</script>
