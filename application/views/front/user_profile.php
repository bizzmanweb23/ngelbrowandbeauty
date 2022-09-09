<?php $user_id=$this->session->userdata('id'); ?>
<!-- USER SECTION -->
      <section class="clearfix userSection padding">
        <div class="container">
          

          <div class="row">
            <div class="col-12">
              <div class="innerWrapper">

					<?php /* $message = $this->session->flashdata('status');
							if ($message != '') {
						?>
						<div class="alert alert-success">
							<?= $message; ?>
						</div>
						<?php } */ ?>
                	<div class="orderBox patternbg">Profile</div>

								<?php foreach($alluser as $user_row): ?>
								<form class="form-horizontal" action="<?php echo base_url() ?>/front/customer_edited" method="post" enctype="multipart/form-data">
								<input type="hidden" class="form-control" name="user_id" value="<?= $user_id; ?>">
                <div class="profile">
                  <div class="row">
											<div class="col-md-3 col-xl-2">
												<div class="thumbnail">

													<img class="" data-src="<?= base_url(); ?>uploads/profile_img/<?= $user_row['profile_picture'] ?>" src="<?= base_url(); ?>uploads/profile_img/<?= $user_row['profile_picture'] ?>" alt="profile-image">

													<div class="caption">
														<div  class="imagediv">
															<span class="visibleimg"></span>
															<span class="showonhover">Change Avatar</span>
															<input id="selectfile" type="file" name="profile_picture" style="display: none;" />
														</div>
													</div>
												</div>
											</div>

                    	<div class="col-md-12 col-xl-10">
											 
												<div class="row">
													<div class="col-md-6">   
														<div class="form-group">
															<label class="col-md-6 col-xl-6 control-label">First Name</label>
															<div class="col-md-6 col-xl-10">
																<input type="text" class="form-control" value="<?= $user_row['first_name'] ?>" name="first_name" required="" placeholder="Enter Your Fast Name">
															</div>
														</div>
													</div>
													<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-6 col-xl-6 control-label">Last Name</label>
																<div class="col-md-6 col-xl-10">
																	<input type="text" class="form-control" value="<?= $user_row['last_name'] ?>" name="last_name" placeholder="Enter Your Last Name">
																</div>
															</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">   
														<div class="form-group">
															<label class="col-md-6 col-xl-6 control-label">Phone Number</label>
															<div class="col-md-6 col-xl-10">
															<input type="text" class="form-control" value="<?= $user_row['contact'] ?>" name="contact" placeholder="Enter Your Phone no">
															</div>
														</div>
													</div>
													<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-6 col-xl-6 control-label">Email Address</label>
																<div class="col-md-6 col-xl-10">
																<input type="email" class="form-control" value="<?= $user_row['email'] ?>" name="email" placeholder="Enter Your Email Address">
																</div>
															</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">   
														<div class="form-group ">
															<label for="dob" class="col-md-6 col-xl-6 control-label">Date Of Birth 
															</label>
															<div class="col-md-6 col-xl-10">
																<input type="date" class="form-control" name="dob" id="dob" placeholder="Input Date of Birth" value="<?= $user_row['dob'] ?>">
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group ">
															<label for="age" class="col-md-6 col-xl-6 control-label">Age
															</label>
															<div class="col-md-6 col-xl-10">
																	<input type="text" class="form-control" name="age" id="age"  value="<?= $user_row['age'] ?>" readonly>
															</div>
														</div>
													</div>
												</div>


												<div class="row">
													<div class="col-md-6">   
														<div class="form-group">
															<label class="col-md-6 col-xl-6 control-label">Password</label>
															<div class="col-md-6 col-xl-10">
															<input type="password" class="form-control" name="password" value="" placeholder="Enter Old Password">
															</div>
														</div>
													</div>
													<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-6 col-xl-6 control-label">New Password</label>
																<div class="col-md-6 col-xl-10">
																	<input type="password" class="form-control" name = "new_password" value="" placeholder="Enter New Password">
																</div>
															</div>
													</div>
												</div>
                        
											</div>
										</div>

										<div class="orderBox patternbg">Billing Address</div>
										<div class="row">

                    						<div class="col-md-12 col-xl-10">
												<div class="row">
													<div class="col-md-6">   
														<div class="form-group">
															<label class="col-md-6 col-xl-6 control-label">First Name</label>
															<div class="col-md-6 col-xl-10">
															<input type="text" class="form-control" value="<?= $user_row['billing_firstname'] ?>" name="billing_firstname" placeholder="Enter Billing first Name">
															</div>
														</div>
													</div>
													<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-6 col-xl-6 control-label">Last Name</label>
																<div class="col-md-6 col-xl-10">
																<input type="text" class="form-control" value="<?= $user_row['billing_lastname'] ?>" name="billing_lastname" placeholder="Enter Your Address">
																</div>
															</div>
													</div>
												</div>
												<div class="row">
													<div class="col-md-6">   
														<div class="form-group">
															<label class="col-md-6 col-xl-6 control-label">Contact No.</label>
															<div class="col-md-6 col-xl-10">
															<input type="text" class="form-control" value="<?= $user_row['billing_contactno'] ?>" name="billing_contactno" placeholder="Enter Billing Contact No.">
															</div>
														</div>
													</div>
													<div class="col-md-6">
															<div class="form-group">
																<label class="col-md-6 col-xl-6 control-label">Address</label>
																<div class="col-md-6 col-xl-10">
																<input type="text" class="form-control" value="<?= $user_row['billing_address'] ?>" name="billing_address" placeholder="Enter Billing Address">
																</div>
															</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">   
														<div class="form-group ">
															<label for="dob" class="col-md-6 col-xl-6 control-label">Country 
															</label>
															<div class="col-md-6 col-xl-10">
																<input type="text" class="form-control" name="billing_country" placeholder="Enter Billing Country" value="<?= $user_row['billing_country'] ?>">
															</div>
														</div>
													</div>
													<div class="col-md-6">   
														<div class="form-group ">
															<label for="dob" class="col-md-6 col-xl-6 control-label">City 
															</label>
															<div class="col-md-6 col-xl-10">
																<input type="text" class="form-control" name="billing_city" placeholder="Enter Billing City" value="<?= $user_row['billing_city'] ?>">
															</div>
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-md-6">
														<div class="form-group ">
															<label for="age" class="col-md-6 col-xl-6 control-label">State
															</label>
															<div class="col-md-6 col-xl-10">
																<select class="form-control" name="bill_state">
																	<option value="" hidden>Select Billing State</option>
																	<?php foreach($allState as $allState_row) {  ?>
																	<option value="<?= $allState_row['id'] ?>"<?php if($allState_row['id'] == $user_row['billing_state']){ echo 'selected';} ?>><?= $allState_row['name'] ?></option>
																	<?php } ?>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<div class="form-group ">
															<label for="age" class="col-md-6 col-xl-6 control-label">Pin-Code</label>
															<div class="col-md-6 col-xl-10">
																<input type="text" class="form-control" name="billing_postal_code" placeholder="Enter Billing Pin Code" value="<?= $user_row['billing_postal_code'] ?>">
															</div>
														</div>
													</div>
												</div>
                        
												<div class="form-group row justify-content-md-end">
													<div class="col-lg-offset-10 col-xl-2 col-offset-9 col-md-3">
														<button type="submit" class="btn btn-primary btn-block">SAVE INFO</button>
													</div>
												</div>
											</div>
										</div>
										
                  			</form>
                
								<?php	endforeach; ?>
						</div>
					</div>
				</div>
			</div>
	</section>
<script>
	 $("#dob").change(function() {
    var dob = $('#dob').val();
    //console.log(dob);
    if(dob != ''){
        dob = new Date(dob);
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
        $('#age').val(age);
		}  
  });
</script>
