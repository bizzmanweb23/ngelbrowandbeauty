<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lead management </h1>
			<?php $message = $this->session->flashdata('status');
				if (isset($message)) {
			?>
			<div class="alert alert-success">
				<?= $this->session->flashdata('status') ?>
			</div>
			<?php } ?>
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
                <form id="add_customer" action="<?= base_url('admin/leadManagement/post_edit_lead')?>" method="post" enctype="multipart/form-data">
					<input type="hidden" class="form-control" name="lead_id" value="<?= $leadData['id'] ?>">
					<div class="col-md-6">
						<div class="circle">
							<img class="profile-pic img_profile" src="<?= base_url('uploads/lead_img/'.$leadData['profile_picture'])?>" width="150">
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
										<input type="text" class="form-control" name="first_name" value="<?= $leadData['first_name'] ?>">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="last_name" class="col-sm-6 control-label">Last Name
								</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="last_name" value="<?= $leadData['last_name'] ?>">
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
									<input type="date" class="form-control dob" name="dob" placeholder="Enter Date of Birth" value="<?= $leadData['dob'] ?>">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="age" class="col-sm-6 control-label">Age
								</label>
								<div class="col-sm-12">
										<input type="text" class="form-control age" name="age" value="<?= $leadData['age'] ?>" readonly>
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
										<input type="email" class="form-control" name="email" value="<?= $leadData['email'] ?>">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group ">
								<label for="contact" class="col-sm-6 control-label">Contact Number
								</label>
								<div class="col-sm-12">
										<input type="number" class="form-control" name="contact" value="<?= $leadData['contact'] ?>">
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
									<option value="<?= $AdminUser_row['id']?>" <?php if($AdminUser_row['id'] == $leadData['reference_name']){ echo 'selected';} ?>><?= $AdminUser_row['first_name']?></option>
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
										<option value="1"<?php if($leadData['membership'] == '1'){ echo 'selected';} ?>>Basic Membership</option>
										<option value="2"<?php if($leadData['membership'] == '2'){ echo 'selected';} ?>>Gold Membership</option>
										<option value="3"<?php if($leadData['membership'] == '3'){ echo 'selected';} ?>>VIP Membership</option>
										<option value="4"<?php if($leadData['membership'] == '4'){ echo 'selected';} ?>>Gold Membership </option>
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
									<option value="" hidden>Select 'Hear about us' Name</option>
									<?php foreach ($here_about_us_query as $here_about_us_row) {  ?>
									<option value="<?= $here_about_us_row['id'] ?>"<?php if($here_about_us_row['id'] == $leadData['source']){ echo 'selected';} ?>><?= $here_about_us_row['name'] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="address" class="col-md-12 control-label">Source Link</label>
								<div class="col-md-12">
									<input type="text" class="form-control" name="source_link" placeholder="Source Link" value="<?= $leadData['source_link'] ?>">
								</div>
							</div>  
						</div>
					</div>  
					
					<div class="form-group">
						<label for="address" class="col-md-12 control-label">Address
						</label>
						<div class="col-md-12">
							<textarea id="address" name="address" rows="5" cols="80" style = "width: 100%;"><?= $leadData['address'] ?></textarea>
						</div>
					</div>  
					<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
								<label for="contact" class="col-sm-6 control-label">City</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="city" value="<?= $leadData['city'] ?>">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="contact" class="col-sm-6 control-label">State</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="state" value="<?= $leadData['state'] ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group ">
								<label for="contact" class="col-sm-6 control-label">Country</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="country" placeholder="Country" value="<?= $leadData['country'] ?>">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="contact" class="col-sm-6 control-label">zip Code</label>
								<div class="col-sm-12">
									<input type="text" class="form-control" name="zip_code" placeholder="ZIP code" value="<?= $leadData['zip_code'] ?>">
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="address" class="col-md-12 control-label">Comment</label>
						<div class="col-md-12">
							<textarea name="comment" rows="5" cols="80" style = "width: 100%;"><?= $leadData['comment'] ?></textarea>
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
