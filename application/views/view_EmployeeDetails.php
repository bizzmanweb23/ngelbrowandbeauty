
<div class="content-wrapper" style="margin-left: 270px;">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Management</h1>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>

	<section class="content">
		<div class="tab-content" id="nav-tabContent" style="margin: auto 3rem;">
			<div class="main-body">
					<div class="row gutters-sm">
						<div class="col-md-4 mb-3">
							<div class="card">
								<div class="card-body">
									<div class="d-flex flex-column align-items-center text-center">
										<img src="<?= base_url('uploads/emplyee_img/'.$emp_Details['employee_photo'])?>" class="rounded-circle" width="150">
										<div class="mt-3">
										<h4><?= $emp_Details['first_name'].' '.$emp_Details['last_name'] ?></h4>
										<p class="text-secondary mb-1"><?= $emp_Details['designation_name'] ?></p>
										<p class="text-muted font-size-sm"><?= $emp_Details['emp_number'] ?></p>
										
										</div>
									</div>
								</div>
							</div>
							<div class="card mt-3">
								<div class="card-header">
									<div class="d-inline h5">Address Details</div>
									<div class="d-inline float-right"><button class="btn btn-primary btn-custom editAddressDetails" style="width: 55px;"><i class="fa fa-edit"></i></button></div>
								</div>
								<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Hse / Blk No.</h6>
									<span class="text-secondary"><?= $emp_Details['hse_blk_no'] ?></span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Unit No.</h6>
									<span class="text-secondary"><?= $emp_Details['unit_no'] ?></span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Building / Street Name</h6>
									<span class="text-secondary"><?= $emp_Details['building_street'] ?></span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Address 1 </h6>
									<span class="text-secondary"><?= $emp_Details['address1'] ?></span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Country </h6>
									<span class="text-secondary"><?= $emp_Details['country'] ?></span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Postal Code </h6>
									<span class="text-secondary"><?= $emp_Details['postalcode'] ?></span>
								</li>
								</ul>
							</div>
						</div>

					<div class="col-md-8">
						<div class="card mb-3">
							<div class="card-header">
								<div class="d-inline h5">Personal Deatils</div>
								<div class="d-inline float-right"><button class="btn btn-primary btn-custom editPersonalDeatils" style="width: 55px;"><i class="fa fa-edit"></i></button></div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-3">
									<h6 class="mb-0">Passport No.</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?= $emp_Details['pan_number'] ?>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-3">
									<h6 class="mb-0">ID No.</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?= $emp_Details['aadhaar_number'] ?>
									</div>
								</div>
								<div class="row pt-2">
									<div class="col-sm-3">
									<h6 class="mb-0">Email ID</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?= $emp_Details['email'] ?>
									</div>
								</div>
								
								<div class="row pt-2">
									<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?= $emp_Details['mob_no'] ?>
									</div>
								</div>
								
								<div class="row pt-2">
									<div class="col-sm-3">
									<h6 class="mb-0">Father's Name</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?= $emp_Details['father_name'] ?>
									</div>
								</div>
								
								<div class="row pt-2">
									<div class="col-sm-3">
									<h6 class="mb-0">Mother's Name</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?= $emp_Details['mother_name'] ?>
									</div>
								</div>
								
								<div class="row pt-2">
									<div class="col-sm-3">
									<h6 class="mb-0">Husband Name</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?= $emp_Details['husband_name'] ?>
									</div>
								</div>
								
								<div class="row pt-2">
									<div class="col-sm-3">
									<h6 class="mb-0">Gender</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?= $emp_Details['gender'] ?>
									</div>
								</div>
								<div class="row pt-2">
									<div class="col-sm-3">
									<h6 class="mb-0">Date Of Birth</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?php if($emp_Details['date_of_birth'] == '0000-00-00'){
											echo '';
										}else{ ?>
											<?= date("d-m-Y", strtotime($emp_Details['date_of_birth'])) ?>
									<?php } ?>
									
									</div>
								</div>
								<div class="row pt-2">
									<div class="col-sm-3">
									<h6 class="mb-0">Age</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?= $emp_Details['age'] ?>
									</div>
								</div>
								<div class="row pt-2">
									<div class="col-sm-3">
									<h6 class="mb-0">Job Type</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<?= $emp_Details['jobtype'] ?>
									</div>
								</div>
								<div class="row pt-2">
									<div class="col-sm-3">
									<h6 class="mb-0">Basic Salary</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										$<?= $emp_Details['basicSalary'] ?>
									</div>
								</div>
								<div class="row pt-2">
									<div class="col-sm-3">
									<h6 class="mb-0">Date Of Joining</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<?php if($emp_Details['date_of_joining'] == '0000-00-00'){
											echo '';
										}else{ ?>
											<?= date("d-m-Y", strtotime($emp_Details['date_of_joining'])) ?>
									<?php } ?>
									
									</div>
								</div>
								<div class="row pt-2">
									<div class="col-sm-3">
									<h6 class="mb-0">Pay Structure</h6>
									</div>
									<div class="col-sm-9 text-secondary">
										<?php if($emp_Details['payStructure'] == '1'){
											echo 'Fixed Pay';
										}if($emp_Details['payStructure'] == '2'){
											echo 'Manual Fees';
										}if($emp_Details['payStructure'] == '3'){
											echo 'Commission Structure';
										}else{ 
											echo '';
										} ?>
									
									</div>
								</div>
							</div>
						</div>

						<div class="row gutters-sm">
							<div class="col-sm-12 mb-3">
								<div class="card h-100">
									<div class="card-header">
										<div class="d-inline h5">Educational Qualification</div>
									</div> 
										<div class="card-body">
											<div class="row" >
												<div class="col-md-3">   
												<h6 class="col-sm-12">Qualification</h6>
												</div>
												<div class="col-md-3">
													<h6 class="col-sm-12">Institute/University</h6>
												</div>
												<div class="col-md-3">
													<h6 class="col-sm-12">Year of Passing</h6>
												</div>
												<div class="col-md-3">
													<h6 class="col-sm-12">Marks</h6>
												</div>
											</div>
											<?php $emp_education_query = $this->db->query("SELECT * FROM nbb_emp_education_qualification WHERE nbb_emp_education_qualification.emp_id = '".$emp_Details['id']."'");
											foreach($emp_education_query->result_array() as $emp_education_row){
											?>
											<div class="row">
												<div class="col-md-3">   	
													<h5 class="col-sm-12"><?= $emp_education_row['qualification'] ?></h5>	
												</div>
												<div class="col-md-3">
													<h5 class="col-sm-12"><?= $emp_education_row['institute_university'] ?></h5>	
												</div>
												<div class="col-md-3">   	
													<h5 class="col-sm-12"><?= $emp_education_row['year_of_passing'] ?></h5>	
												</div>
												<div class="col-md-3">
													<h5 class="col-sm-12"><?= $emp_education_row['marks'] ?></h5>	
												</div>
											</div>
											<?php } ?>
										</div>

										<div class="card-header">
											<div class="d-inline h5">Work Experience</div>
										</div> 
										<div class="card-body">
											<div class="row" >
												<div class="col-md-3">   
												<h6 class="col-sm-12">Company Name</h6>
												</div>
												<div class="col-md-3">
													<h6 class="col-sm-12">Work / Role</h6>
												</div>
												<div class="col-md-3">
													<h6 class="col-sm-12">Duration (form - to)</h6>
												</div>
											</div>
											<?php 
											$work_experience_query = $this->db->query("SELECT * FROM nbb_work_experience WHERE nbb_work_experience.emp_id = '".$emp_Details['id']."'");
											foreach($work_experience_query->result_array() as $work_experience_row){
											?>
											<div class="row">
												<div class="col-md-3">   	
													<h5 class="col-sm-12"><?= $work_experience_row['company_name'] ?></h5>	
												</div>
												<div class="col-md-3">
													<h5 class="col-sm-12"><?= $work_experience_row['work_role'] ?></h5>	
												</div>
												<div class="col-md-6">   	
													<h5 class="col-sm-12"><?= date("d/m/Y", strtotime($work_experience_row['form_date'])) ?>&nbsp;--&nbsp;<?= date("d/m/Y", strtotime($work_experience_row['to_date']))  ?></h5>	
												</div>
											</div>
											<?php } ?>
										</div>


									</div>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>
		
	</section>
	
</div>


	<!--Address Details Modal -->
<div class="modal fade" id="editAddressDetailsModal" tabindex="-1" role="dialog" aria-labelledby="editAddressDetailsLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editAddressDetailsLabel">Address Details</h5>
        <button type="button" class="close close_btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="<?= base_url('admin/employeeManagement/post_edit_empaddress')?>" method="post" enctype="multipart/form-data">
		  <input type="hidden" name="emp_id" value ="<?= $emp_Details['id'] ?>" class="form-control">
	  		<div class="row">
				<div class="col-sm-3">
					<h6 class="mb-0">Hse / Blk No.</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="text" name="hse_blk_no" value ="<?= $emp_Details['hse_blk_no'] ?>" class="form-control">
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Unit No</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="text" name="unit_no" value ="<?= $emp_Details['unit_no'] ?>" class="form-control">
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Building / Street Name</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="text" name="building_street" value ="<?= $emp_Details['building_street'] ?>" class="form-control">
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Address 1</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="text" name="address1" value ="<?= $emp_Details['address1'] ?>" class="form-control">
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Country </h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="text" name="country" value ="<?= $emp_Details['country'] ?>" class="form-control">
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Postal Code </h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="text" name="postalcode" value ="<?= $emp_Details['postalcode'] ?>" class="form-control">
				</div>
			</div>
			<div class=" pt-2 text-center">
				<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 120px;">
			</div>
	  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!--Personal Deatils Modal -->
<div class="modal fade" id="editPersonalDeatilsModel" tabindex="-1" role="dialog" aria-labelledby="editPersonalDeatilsLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editPersonalDeatilsLabel">Personal Deatils</h5>
        <button type="button" class="close close_btn" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  <form action="<?= base_url('admin/employeeManagement/post_edit_PersonalDeatils')?>" method="post" enctype="multipart/form-data">
		  <input type="hidden" name="emp_id" value ="<?= $emp_Details['id'] ?>" class="form-control">
	  		<div class="row">
				<div class="col-md-3">
					<h6 class="mb-0">Name</h6>
				</div>
					<div class="col-md-4 text-secondary">
						<input type="text" name="first_name" value ="<?= $emp_Details['first_name'] ?>" class="form-control">
					</div>
					<div class="col-md-5 text-secondary">
						<input type="text" name="last_name" value ="<?= $emp_Details['last_name'] ?>" class="form-control">
					</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">ID No. </h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="text" name="aadhaar_number" value ="<?= $emp_Details['aadhaar_number'] ?>" class="form-control">
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Passport No.</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="text" name="pan_number" value ="<?= $emp_Details['pan_number'] ?>" class="form-control">
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Date Of Birth</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="date" name="date_of_birth" id="dob" value ="<?= $emp_Details['date_of_birth'] ?>" class="form-control">
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Age</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="text" name="age" id="age" value ="<?= $emp_Details['age'] ?>" class="form-control" readonly>
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Mob No</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="text" name="mob_no" value ="<?= $emp_Details['mob_no'] ?>" class="form-control">
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Email</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="text" name="email" value ="<?= $emp_Details['email'] ?>" class="form-control">
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Password</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="password" name="password" value ="" class="form-control">
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Father's Name</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="text" name="father_name" value ="<?= $emp_Details['father_name'] ?>" class="form-control">
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Mother's Name</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="text" name="mother_name" value ="<?= $emp_Details['mother_name'] ?>" class="form-control">
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Husband Name</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="text" name="husband_name" value ="<?= $emp_Details['husband_name'] ?>" class="form-control">
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Gender</h6>
				</div>
				<div class="col-md-3 text-secondary">
					<input type="radio" name="gender" value="Male" <?php if($emp_Details['gender'] == 'Male'){ echo 'checked';} ?>><label for="Male">Male </label>
				</div>
				<div class="col-md-3 text-secondary">
					<input type="radio" name="gender" value="Female" <?php if($emp_Details['gender'] == 'Female'){ echo 'checked';} ?>><label for="Male">Female </label>
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Designation</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<select name="designation" class="form-control choiceDesignation">
						<option hidden>Select Designation</option>
						<?php foreach($empDesignation as $empDesignationRow): ?>
						<option value="<?= $empDesignationRow['id']?>" <?php if($emp_Details['designation'] == $empDesignationRow['id']){ echo 'selected';} ?>><?= $empDesignationRow['role_name']?></option>
						<?php endforeach; ?> 
					</select>
				</div>
			</div>
			<div class="showColorBox" style="<?php if($emp_Details['designation'] == 7){ ?> display: block; <?php }else{ ?> display: none; <?php } ?>">
				<div class="row pt-2">
					<div class="col-md-3">
						<h6 class="mb-0">Therapist color</h6>
					</div>
					<div class="col-md-9 text-secondary">
						<input type="color" name="therapist_color" value="<?= $emp_Details['therapist_color'] ?>" class="form-control">
					</div>
				</div>
			</div>
			
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Job Type</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<select name="jobtype" class="form-control">
						<option>Select Job Type</option>
						<?php foreach($empjobType as $empjobTypeRow): ?>
						<option value="<?= $empjobTypeRow['id']?>" <?php if($emp_Details['jobtype'] == $empjobTypeRow['id']){ echo 'selected';} ?>><?= $empjobTypeRow['type_name']?></option>
						<?php endforeach; ?> 
					</select>
					
				</div>											
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Pay Structure</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<select name="payStructure" class="form-control">
						<option value="" hidden>Select Pay Structure</option>
						<option value="1" <?php if($emp_Details['payStructure'] == '1'){ echo 'selected';} ?>>Fixed Pay</option>
						<option value="2" <?php if($emp_Details['payStructure'] == '2'){ echo 'selected';} ?>>Manual Fees</option>
						<option value="3" <?php if($emp_Details['payStructure'] == '3'){ echo 'selected';} ?>>Commission Structure</option>
					</select>
				</div>
			</div>
			<div class="row pt-2">
				<div class="col-md-3">
					<h6 class="mb-0">Basic Salary</h6>
				</div>
				<div class="col-md-9 text-secondary">
					<input type="text" name="basicSalary" value ="<?= $emp_Details['basicSalary'] ?>" class="form-control">
				</div>
			</div>
			<div class=" pt-2 text-center">
				<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 120px;">
			</div>
	  </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<style>
	.gutters-sm {
		margin-right: -8px;
		margin-left: -8px;
	}

	.gutters-sm>.col, .gutters-sm>[class*=col-] {
		padding-right: 8px;
		padding-left: 8px;
	}
	.mb-3, .my-3 {
		margin-bottom: 1rem!important;
	}

	.bg-gray-300 {
		background-color: #e2e8f0;
	}
	.h-100 {
		height: 100%!important;
	}
	.shadow-none {
		box-shadow: none!important;
	}
</style>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
$(document).ready(function(){
	$(".editAddressDetails").click(function(){
		$("#editAddressDetailsModal").modal('show');
	});
	$(".editPersonalDeatils").click(function(){
		$("#editPersonalDeatilsModel").modal('show');
	});
	
  	$(".close_btn").click(function(){
		$("#editAddressDetailsModal").modal("hide"); 				
    });
	$(".close_btn").click(function(){
		$("#editPersonalDeatilsModel").modal("hide"); 				
    });

	$(".choiceDesignation").change(function(){
		if (this.value == '7') {
			$(".showColorBox").show();
		}else{
			$(".showColorBox").hide();
		}
	});

});
</script>
