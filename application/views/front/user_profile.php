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

								
							<form class="form-horizontal" action="<?php echo base_url() ?>/front/customer_edited" method="post" enctype="multipart/form-data">
							<?php foreach($alluser as $user_row){ ?>
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
							<div class="form-group">
								<label for="Membership"> Membership</label>
								<select class="form-control membership" name="membership">
									<option value="" hidden>Select Membership</option>
									<?php foreach($allMembership as $membership_row) {  ?>
									<option value="<?= $membership_row['id'] ?>"<?php if($membership_row['id'] == $user_row['membership_id']){ echo 'selected';} ?>><?= $membership_row['membership_name'] ?></option>
									<?php } ?>
								</select>
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
											<label for="dob" class="col-md-6 col-xl-6 control-label">Hse / Blk No.  
											</label>
											<div class="col-md-6 col-xl-10">
												<input type="text" class="form-control" name="billing_hse_blk_no" placeholder="Enter Hse / Blk No." value="<?= $user_row['billing_hse_blk_no'] ?>">
											</div>
										</div>
									</div>
									<div class="col-md-6">   
										<div class="form-group ">
											<label for="dob" class="col-md-6 col-xl-6 control-label">Unit No. 
											</label>
											<div class="col-md-6 col-xl-10">
												<input type="text" class="form-control" name="billing_unit_no" placeholder="Enter Billing City" value="<?= $user_row['billing_unit_no'] ?>">
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label for="dob" class="col-md-6 col-xl-6 control-label">Building / Street Name
											</label>
											<div class="col-md-6 col-xl-10">
												<input type="text" class="form-control" name="billing_street" placeholder="Enter Billing Street" value="<?= $user_row['billing_street'] ?>">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group ">
											<label for="age" class="col-md-6 col-xl-6 control-label">Country</label>
											<div class="col-md-6 col-xl-10">
												<input type="text" class="form-control" name="billing_country" placeholder="Enter Billing Pin Code" value="<?= $user_row['billing_country'] ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group ">
											<label for="age" class="col-md-6 col-xl-6 control-label">Postal Code</label>
											<div class="col-md-6 col-xl-10">
												<input type="text" class="form-control" name="billing_postal_code" placeholder="Enter Billing Pin Code" value="<?= $user_row['billing_postal_code'] ?>">
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group form-check">
											<input type="checkbox" class="form-check-input" name="billing_shipping_same" id="exampleCheck1">
											<label class="form-check-label text-secondary font-italic billing_shipping_different" for="exampleCheck1" style="margin-left:20px;">Shipping details different as billing details</label>
										</div>
									</div>
								</div>
								
							</div>
						</div>

						<div class="shipping_address" style="display: none;">
						<div class="orderBox patternbg">Shipping Address</div>
							<div class="row">

								<div class="col-md-12 col-xl-10">
									<div class="row">
										<div class="col-md-6">   
											<div class="form-group">
												<label class="col-md-6 col-xl-6 control-label">First Name</label>
												<div class="col-md-6 col-xl-10">
												<input type="text" class="form-control" value="<?= $user_row['shipping_firstname'] ?>" name="shipping_firstname" placeholder="Enter Shipping first Name">
												</div>
											</div>
										</div>
										<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-6 col-xl-6 control-label">Last Name</label>
													<div class="col-md-6 col-xl-10">
													<input type="text" class="form-control" value="<?= $user_row['shipping_lastname'] ?>" name="shipping_lastname" placeholder="Enter Shipping Your Address">
													</div>
												</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">   
											<div class="form-group">
												<label class="col-md-6 col-xl-6 control-label">Contact No.</label>
												<div class="col-md-6 col-xl-10">
												<input type="text" class="form-control" value="<?= $user_row['shipping_contactno'] ?>" name="shipping_contactno" placeholder="Enter Shipping Contact No.">
												</div>
											</div>
										</div>
										<div class="col-md-6">
												<div class="form-group">
													<label class="col-md-6 col-xl-6 control-label">Address</label>
													<div class="col-md-6 col-xl-10">
													<input type="text" class="form-control" value="<?= $user_row['shipping_address'] ?>" name="shipping_address" placeholder="Enter Shipping Address">
													</div>
												</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">   
											<div class="form-group ">
												<label for="dob" class="col-md-6 col-xl-6 control-label">Hse / Blk No.  
												</label>
												<div class="col-md-6 col-xl-10">
													<input type="text" class="form-control" name="shipping_hse_blk_no" placeholder="Enter Hse / Blk No." value="<?= $user_row['shipping_hse_blk_no'] ?>">
												</div>
											</div>
										</div>
										<div class="col-md-6">   
											<div class="form-group ">
												<label for="dob" class="col-md-6 col-xl-6 control-label">Unit No. 
												</label>
												<div class="col-md-6 col-xl-10">
													<input type="text" class="form-control" name="shippingunit_no" placeholder="Enter Shipping City" value="<?= $user_row['shippingunit_no'] ?>">
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-md-6">
											<div class="form-group ">
												<label for="dob" class="col-md-6 col-xl-6 control-label">Building / Street Name
												</label>
												<div class="col-md-6 col-xl-10">
													<input type="text" class="form-control" name="shipping_street" placeholder="Enter Shipping Street" value="<?= $user_row['shipping_street'] ?>">
												</div>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group ">
												<label for="age" class="col-md-6 col-xl-6 control-label">Country</label>
												<div class="col-md-6 col-xl-10">
													<input type="text" class="form-control" name="shipping_country" placeholder="Enter Shipping Pin Code" value="<?= $user_row['shipping_country'] ?>">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group ">
												<label for="age" class="col-md-6 col-xl-6 control-label">Postal Code</label>
												<div class="col-md-6 col-xl-10">
													<input type="text" class="form-control" name="billing_postal_code" placeholder="Enter Shipping Pin Code" value="<?= $user_row['billing_postal_code'] ?>">
												</div>
											</div>
										</div>
									</div>
									
								</div>
							</div>	
						</div>


							<div class="form-group row justify-content-md-end">
								<div class="col-lg-offset-10 col-xl-2 col-offset-9 col-md-3">
									<button type="submit" class="btn btn-primary btn-block">SAVE INFO</button>
								</div>
							</div>
							<?php } ?>
                  			</form>
                
								
						</div>
					</div>
				</div>
			</div>
	</section>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
  $(document).ready(function(){
		$(".membership").change(function(){
			if(this.value == '1') {
				Swal.fire({
					html:
					'<b>Please recharge $680 For normal Mamabership</b>, ' +
					'<br><a href="<?php echo base_url() ?>wallet" target="_blank">Go to the wallet</a>',
					text: '',
					//footer: '<a href="">Go to the </a>'
				
				});
			}
			if(this.value == '2') {
				Swal.fire({
					html:
					'<b>Please recharge $2,000 For Gold Mamabership</b>, ' +
					'<br><a href="<?php echo base_url() ?>wallet" target="_blank">Go to the wallet</a>',
					text: '',
					//footer: '<a href="">Go to the </a>'
				
				});
			}
			if(this.value == '3') {
				Swal.fire({
					html:
					'<b>Please recharge $3,500 For Platinum  Mamabership</b>, ' +
					'<br><a href="<?php echo base_url() ?>wallet" target="_blank">Go to the wallet</a>',
					text: '',
					//footer: '<a href="">Go to the </a>'
				
				});
			}
			if(this.value == '4') {
				Swal.fire({
					html:
					'<b>Please recharge $5,000 For Silver  membership</b>, ' +
					'<br><a href="<?php echo base_url() ?>wallet" target="_blank">Go to the wallet</a>',
					text: '',
					//footer: '<a href="">Go to the </a>'
				
				});
			}
		});

		$(function () {
        $("#exampleCheck1").click(function () {
            if ($(this).is(":checked")) {
                $(".shipping_address").show();
            }else {
                $(".shipping_address").hide();
                
            }
        });
    });
	});		

</script>
