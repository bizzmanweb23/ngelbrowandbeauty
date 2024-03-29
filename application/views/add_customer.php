<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer management </h1>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card" style="border-radius: 15px">
              
              <!-- /.card-header -->
              <div class="card-body">
                <form id="add_customer" action="<?= base_url('admin/CustomerManagement/post_add_customer')?>" method="post" enctype="multipart/form-data">
					<div class="col-md-6">
						<div class="circle">
							<img class="profile-pic img_profile" src="/uploads/profile/" width="150">
							<i class="fa fa-camera profile-pic-upload-button"></i>
						</div>
						<div class="p-image">
							<input class="file-upload" type="file" accept="image/*" name = "profile_picture" style="display:none">
						</div>
						<label for="first_name" class="control-label">Profile Photo </label>
					</div>
					<div class="row">
						<div class="col-md-6">   
							<div class="form-group ">
								<label for="first_name" class="col-sm-6 control-label">First Name 
								</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" value="" required>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="last_name" class="col-sm-6 control-label">Last Name
								</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="last_name" id="last_name" placeholder="Enter Last Name" value="" required>
								</div>
							</div>
						</div>
                	</div>
					<div class="row">
						<div class="col-md-6">   
							<div class="form-group ">
								<label for="dob" class="col-sm-6 control-label">Date Of Birth 
								</label>
								<div class="col-sm-12">
									<input type="date" class="form-control" name="dob" id="dob" placeholder="Input Date of Birth" value="">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="age" class="col-sm-6 control-label">Age
								</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="age" id="age"  value="" readonly>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">   
							<div class="form-group ">
								<label for="email" class="col-sm-6 control-label">Email
								</label>
								<div class="col-sm-12">
										<input type="email" class="form-control" name="email" id="email"  value="">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="contact" class="col-sm-6 control-label">Contact Number
								</label>
								<div class="col-sm-12">
										<input type="text" class="form-control" name="contact" id="contact" placeholder="Contact number" value="">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">   
							<div class="form-group ">
								<label for="email" class="col-sm-6 control-label">Skin Conditions</label>
								<div class="col-sm-12">
									<select  class="form-control chosen chosen-select" name="skin_conditions" data-placeholder="Select skin conditions" >
										<option value=""></option>
										<option value="1">Oily</option>
										<option value="2">Dry</option>
										<option value="3">Normal</option>
										<option value="4">Sensitive</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="contact" class="col-sm-6 control-label">Profile Status</label>
								<div class="col-sm-12">
									<select  class="form-control chosen chosen-select" name="status" data-placeholder="Select Profile Status" >
										<option value=""></option>
										<option value="1">Premium</option>
										<option value="2">VIP</option>
									</select>
								</div>
							</div>
						</div>
					</div>     

					<div class="row">
						<div class="col-md-6">   
							<div class="form-group ">
								<label for="email" class="col-sm-6 control-label">Reference Name</label>
								<div class="col-sm-12">
									<select class="form-control chosen chosen-select" name="reference_name" data-placeholder="Select Reference Name" >
										<option value="">Select Reference Name</option>
										<?php foreach($AdminUser as $AdminUser_row): ?>
									<option value="<?= $AdminUser_row['id']?>"><?= $AdminUser_row['first_name']?></option>
									<?php endforeach; ?> 
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="contact" class="col-sm-6 control-label">Membership</label>
								<div class="col-sm-12">
									<select  class="form-control chosen chosen-select" name="membership" data-placeholder="Select Membership" >
										<option value="" hidden>Select Membership</option>
										<option value="1">Basic Membership</option>
										<option value="2">Gold Membership</option>
										<option value="3">VIP Membership</option>
										<option value="4">Gold Membership </option>
									</select>
								</div>
							</div>
						</div>
					</div>     
  
					<div class="form-group">
						<label for="address" class="col-md-12 control-label">Medical Information
						</label>
						<div class="col-md-12">
							<textarea name="medical_information" rows="5" cols="80" style = "width: 100%;"></textarea>
						</div>
					</div> 
					<div class="form-group">
						<label for="address" class="col-md-12 control-label">Transactional Records
						</label>
						<div class="col-md-12">
							<textarea name="transactional_records" rows="5" cols="80" style = "width: 100%;"></textarea>
						</div>
                  	</div>

					<!-- Shipping Address --> 
					  <h3 class="heading" align="center">Shipping Address</h3>

					  	<div class="form-group">

							<label for="full_name" class="col-sm-6 col-form-label">First Name</label>

							<div class="col-sm-6">

							<input type="text" name = "shipping_firstname" class="form-control" placeholder="Enter First Name" required>
							</div>
						</div>

						<div class="form-group">

						<label for="full_name" class="col-sm-6 col-form-label">Last Name</label>

						<div class="col-sm-6">

						<input type="text" name = "shipping_lastname" class="form-control" placeholder="Enter Last Name" required>
						</div>
						</div>

					<div class="form-group">

						<label for="contact_number" class="col-sm-6 col-form-label">contact number</label>

						<div class="col-sm-6">

						<input type="text" name = "shipping_contactno" class="form-control" placeholder="Enter Contact Number" required>
						</div>
					</div>

					<div class="form-group">

						<label for="suburb" class="col-sm-6 col-form-label">Hse / Blk No.</label>

						<div class="col-sm-6">

						<input type="text" name = "shipping_hse_blk_no" class="form-control" placeholder="Enter Hse / Blk No." required>
						</div>
					</div>

					<div class="form-group">

						<label for="suburb" class="col-sm-6 col-form-label">Unit No.</label>

						<div class="col-sm-6">

						<input type="text" name = "shippingunit_no" class="form-control" placeholder="Enter Unit No." required>
						</div>
					</div>

					<div class="form-group">

						<label for="suburb" class="col-sm-6 col-form-label">Building / Street Name</label>

						<div class="col-sm-6">

						<input type="text" name = "shipping_street" class="form-control" placeholder="Enter Building / Street Name" required>
						</div>
					</div>

					<div class="form-group">

						<label for="address" class="col-sm-6 col-form-label">Address 1</label>

						<div class="col-sm-6">
							<input type="text" name = "shipping_address" class="form-control" placeholder="Enter Address 1">
						</div>
					</div>

					<div class="form-group">

						<label for="suburb" class="col-sm-6 col-form-label">Country</label>

						<div class="col-sm-6">

						<input type="text" name = "shipping_country" class="form-control" placeholder="Enter Country" required>
						</div>
					</div>


					<div class="form-group">

						<label for="postcode" class="col-sm-6 col-form-label">Postal Code</label>

						<div class="col-sm-6">

						<input type="text" name = "shipping_postalcode" class="form-control" placeholder="Enter Postal Code" required>
						</div>
					</div>


					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" id="exampleCheck1">
						<label class="form-check-label text-secondary font-italic billing_shipping_different" for="exampleCheck1" style="margin-left:20px;">Billing details Same as Shipping details</label>
					</div>

									    
                  	<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
 </div> 

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <style>
	.heading{
		background-color: #61d3d4;
		color: white;
		padding: 5px;
		text-align: left;
		border-radius: 10px;
		padding-left: 10px;
	}		
 </style>
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
  })
	//for avtar
	$(document).ready(function() { 
		var readURL = function(input) {
					if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function (e) {
									$('.profile-pic').attr('src', e.target.result);
							}
							reader.readAsDataURL(input.files[0]);
					}
			}
			$(".file-upload").on('change', function(){
					readURL(this);
			});
			$(".profile-pic-upload-button").on('click', function() {
				$(".file-upload").click();
			});
	});
  </script>
