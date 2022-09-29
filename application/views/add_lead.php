<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lead management </h1>
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
                <form id="add_customer" action="<?= base_url('admin/leadManagement/post_add_lead')?>" method="post" enctype="multipart/form-data">
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
										<input type="text" class="form-control" name="first_name" placeholder="First Name Max Length : 100." value="">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="last_name" class="col-sm-6 control-label">Last Name
								</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="last_name" placeholder="Last Name Max Length : 100." value="">
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
									<input type="date" class="form-control dob" name="dob" placeholder="Enter Date of Birth" value="">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="age" class="col-sm-6 control-label">Age
								</label>
								<div class="col-sm-12">
										<input type="text" class="form-control age" name="age" value="" readonly>
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
										<input type="email" class="form-control" name="email" value="">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="contact" class="col-sm-6 control-label">Contact Number
								</label>
								<div class="col-sm-12">
										<input type="number" class="form-control" name="contact" placeholder="Contact number" value="">
								</div>
							</div>
						</div>
					</div>  

					<div class="row">
						<div class="col-md-6">   
							<div class="form-group ">
								<label for="email" class="col-sm-6 control-label">Reference Name</label>
								<div class="col-sm-12">
									<select class="form-control chosen chosen-select" name="reference_name">
										<option value="" hidden>Select Reference Name</option>
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
									<select  class="form-control chosen chosen-select" name="membership">
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
					<div class="row">
						<div class="col-md-6">  
							<div class="form-group">
								<label for="brand_status">Where did you hear about us:</label>
								<select class="form-control" name="here_about_us">
									<option value="" hidden>Select Sourse Name</option>
									<?php foreach ($here_about_us_query as $here_about_us_row) {  ?>
									<option value="<?= $here_about_us_row['id'] ?>"><?= $here_about_us_row['name'] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="address" class="col-md-12 control-label">Sourse Link</label>
								<div class="col-md-12">
									<input type="text" class="form-control" name="source_link" placeholder="Source Link" value="">
								</div>
							</div>  
						</div>
					</div> 
					
					<div class="form-group">
						<label for="address" class="col-md-12 control-label">Address
						</label>
						<div class="col-md-12">
							<textarea id="address" name="address" rows="5" cols="80" style = "width: 100%;"></textarea>
						</div>
					</div> 
					<div class="row">
						<div class="col-md-4">
							<div class="form-group ">
								<label for="contact" class="col-sm-6 control-label">Hse/ Blk No.</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="hse_blk_no" placeholder="Hse Blk No." value="">
								</div>
							</div>
						</div>
						
						<div class="col-md-4">
							<div class="form-group">
								<label for="contact" class="col-sm-6 control-label">Unit No.</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="unit_no" placeholder="Unit No." value="">
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for="contact" class="col-sm-6 control-label">Building Street Name</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="building_street_name" placeholder="Building Street Name" value="">
								</div>
							</div>
						</div>
					</div> 
					<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
								<label for="contact" class="col-sm-6 control-label">City</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="city" placeholder="City" value="">
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for="contact" class="col-sm-6 control-label">State</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="state" placeholder="State" value="">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
								<label for="contact" class="col-sm-6 control-label">Country</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="country" placeholder="Country" value="">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="contact" class="col-sm-6 control-label">zip Code</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="zip_code" placeholder="ZIP code" value="">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="address" class="col-md-12 control-label">Comment</label>
						<div class="col-md-12">
							<textarea name="comment" rows="5" cols="80" style = "width: 100%;"></textarea>
						</div>
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
<script>
    $(".dob").change(function() {
    var dob = $('.dob').val();
    //console.log(dob);
    if(dob != ''){
        dob = new Date(dob);
        var today = new Date();
        var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
        $('.age').val(age);
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
