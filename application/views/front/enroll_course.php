

<!--enroll modal-->

<div class="container">
<div class="messages"></div>
    <div class="row">
		
			<div class="col-md-2"></div>
        <div class="col-md-8">  
							<!-- MODAL CONTENT-->
							<div class="modal-content">
								<div class="modal-header" style="background-color: #63d4d6;">
									<h4 class="modal-title appointment-modal-title"><?= $courseData['course_name']; ?></h4>
								</div>
								<div class="modal-body">
								<div id="appointment-alert" class="my-alert"></div>
								<form action="" id="courseModalForm" method="post" enctype="multipart/form-data">
										<!--Response Holder-->
										<div class="form-group categoryTitle">
											<h5>Personal Information</h5>
										</div>
										<div class="row mb-2">
												<div class="col-md-12">
														<input type="text" name="full_name" class="form-control" placeholder="Full name" required="" autocomplete="off">
												</div>
										</div>
										<div class="dateSelect form-half form-left">
																	<label>Date Of Birth</label><br>
											<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
																	
												<input type="text" name="dob" class="form-control" placeholder="MM/DD/YYYY">
												<div class="input-group-addon">
													<span class="fa fa-calendar"></span>
												</div>
											</div>
										</div>
					
										<div class="timeSelect appointment-timeSelect form-half clearfix">
											<label>Gender</label><br>
													<div class="row">
															<div class="col-md-2">
																<div class="radio-inline">
																	<div class="form-check">
																		<input class="form-check-input" type="radio" name="gender" id="" value="1">
																		<label class="form-check-label">
																			Male
																		</label>
																	</div>
																</div>
															</div>
															<div class="col-md-2">
																<div class="radio-inline ">
																		<div class="form-check">
																			<input class="form-check-input" type="radio" name="gender" id="" value="2">
																			<label class="form-check-label">
																				Female
																			</label>
																		</div>
																	</div>
															</div>
														</div>
													</div>
													<div class="row mb-2">
															<div class="col-md-12">
																	<input type="text" name="id_card" class="form-control" placeholder="NRIC/ID Card No." required="" autocomplete="off">
															</div>
													</div>
					
													<div class="form-group form-half form-left mt-3">
														<input type="text" name="mobile_number" class="form-control" placeholder="Phone number" required="">
													</div>
													<div class="form-group form-half form-right  mt-3">
														<input type="text" name="email" class="form-control" placeholder="Email" required="">
													</div>
													<div class="row mb-2">
															<div class="col-md-12">
																	<input type="text" name="address" class="form-control" placeholder="Address" required="">
															</div>
													</div>
					
													<div class="form-group categoryTitle mt-4">
														<h5>Class Information</h5>
													</div>
					
													<div class="form-group">
													<?php $id =  $this->uri->segment(2); ?>
													<input type="hidden" name="course_id" class="form-control" value="<?= $id; ?>">
														<input type="text" name="appointment-form-full-name" class="form-control" placeholder="Course Name" value="<?= $courseData['course_name']; ?>" readonly>
													</div>
					
													<div class="clearfix"></div>
													<div class=" form-left">
															<label>Class Time</label><br>
																	<div class="row">
																		<div class="col-md-4">
																			<div class="radio-inline">
																				<div class="form-check">
																					<input class="form-check-input" type="radio" name="class_time" value="1">
																					<label class="form-check-label">4 Lesson per week</label>
																				</div>
																			</div>
																			</div>
																			<div class="col-md-5">
																				<div class="radio-inline ">
																					<div class="form-check">
																						<input class="form-check-input" type="radio" name="class_time" value="2">
																						<label class="form-check-label">Optional</label>
																					</div>
																				</div>
																			</div>
															</div>
														</div><br>
															<div class="clearfix"></div>
															<div class="form-group">
																<input type="text" name="appointment-form-full-name" class="form-control" placeholder="Course Fees" value="<?= $courseData['course_fees']; ?>" readonly>
															</div>
															<div class="form-group">
																	<select name="sources_id" id="sources_id" style="width: 100%;" class=" px-2 py-2">
																		<option value="" hidden>Select Source Name</option>
																		<?php foreach($allhere_about_us as $here_about_us_row): ?>
																		<option value="<?= $here_about_us_row['id']?>"><?= $here_about_us_row['name']?></option>
																		<?php endforeach; ?> 
																	</select>
															</div>
															<ol>
																	<li>Please be on time and do not be late for class without any valid reason(s).</li>
																	<li>Kindly inform your lecturer beforehand to seek for leave if you are unable to attend class.</li>
																	<li>We are not responsible to rearrange for any absent classes without any valid reason(s).</li>
																	<li>Please keep your official receipt as an acknowledgement reference for your course payment.</li>
																	<li>There will be no refund or return of any registration fees and the seat will only be reserved for three months for any student unable to attend the course in schedule.</li>
															</ol>
					
										<div class="form-group">
											<button type="button" id="appointment-submit-btn" class="btn btn-primary first-btn courseform">Submit Now</button>
										</div>
					
									</form>
								</div>
							</div>

        </div>
        
    </div>
</div>
<script>
	$('.courseform').on('click', function (e) {
		//alert()
        if (!e.isDefaultPrevented()) {
          var url = "<?php echo base_url() ?>course/add_student";

					$.ajax({
							type: "POST",
							url: url,
							data: $('#courseModalForm').serialize(),
							dataType: "json",
							success: function (data) 
							{
								//alert(data.msg);
								var messageText = data.msg;
								//var alertBox = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+messageText+'</div>';
									$('.messages').html(messageText);
							}
            });
            return false;
        }
    });
</script>

