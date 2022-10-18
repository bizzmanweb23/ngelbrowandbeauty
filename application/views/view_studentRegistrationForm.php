
<div class="content-wrapper" style="margin-left: 270px;">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Management</h1>
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
										<img src="<?= base_url('uploads/student_img/'.$Student_registration['student_photo'])?>" class="rounded-circle" width="150">
										<div class="mt-3">
										<h4><?= $Student_registration['first_name'].' '.$Student_registration['last_name'] ?></h4>
										<p class="text-secondary mb-1"><?= $Student_registration['student_code'] ?></p>
										<p class="text-muted font-size-sm"><?= $Student_registration['email'] ?></p>
										</div>
									</div>
								</div>
							</div>
							
						</div>
						
							<div class="col-md-7 mb-3">
								<div class="card">
									<div class="card-header">
										<div class="d-inline h5">Address Details</div>
									</div>
									<ul class="list-group list-group-flush">
									<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
										<h6 class="mb-0">Hse / Blk No.</h6>
										<span class="text-secondary"><?= $Student_registration['hse_blk_no'] ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
										<h6 class="mb-0">Unit No.</h6>
										<span class="text-secondary"><?= $Student_registration['unit_no'] ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
										<h6 class="mb-0">Building / Street Name</h6>
										<span class="text-secondary"><?= $Student_registration['building_streetName'] ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
										<h6 class="mb-0">Address 1 </h6>
										<span class="text-secondary"><?= $Student_registration['address'] ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
										<h6 class="mb-0">Country </h6>
										<span class="text-secondary"><?= $Student_registration['country'] ?></span>
									</li>
									<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
										<h6 class="mb-0">Postal Code </h6>
										<span class="text-secondary"><?= $Student_registration['pin_code'] ?></span>
									</li>
									</ul>
								</div>
							</div>

					</div>

					<div class="col-md-11">
						<div class="card mb-3">
							<div class="card-header">
								<div class="d-inline h5">Personal Deatils</div>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-sm-6">
									<h6 class="mb-0">Student Code</h6>
									</div>
									<div class="col-sm-6 text-secondary">
									<?= $Student_registration['student_code'] ?>
									</div>
								</div>
								<div class="row pt-3">
									<div class="col-sm-6">
									<h6 class="mb-0">Assigned Course</h6>
									</div>
									<div class="col-sm-6 text-secondary">
										<?= $Student_registration['course_name']; ?>
									
									</div>
								</div>
								<div class="row pt-3">
									<div class="col-sm-6">
									<h6 class="mb-0">Email ID</h6>
									</div>
									<div class="col-sm-6 text-secondary">
									<?= $Student_registration['email'] ?>
									</div>
								</div>
								
								<div class="row pt-3">
									<div class="col-sm-6">
									<h6 class="mb-0">Phone</h6>
									</div>
									<div class="col-sm-6 text-secondary">
									<?= $Student_registration['mobile_number'] ?>
									</div>
								</div>
								
								<div class="row pt-3">
									<div class="col-sm-6">
									<h6 class="mb-0">Gender</h6>
									</div>
									<div class="col-sm-6 text-secondary">
									<?= $Student_registration['gender'] ?>
									</div>
								</div>
								<div class="row pt-3">
									<div class="col-sm-6">
									<h6 class="mb-0">Date Of Birth</h6>
									</div>
									<div class="col-sm-6 text-secondary">
									<?php if($Student_registration['dob'] == '0000-00-00'){
											echo '';
										}else{ ?>
											<?= date("d-m-Y", strtotime($Student_registration['dob'])) ?>
									<?php } ?>
									
									</div>
								</div>
								<div class="row pt-3">
									<div class="col-sm-6">
									<h6 class="mb-0">Last University</h6>
									</div>
									<div class="col-sm-6 text-secondary">
									<?= $Student_registration['last_university']; ?>
									</div>
								</div>
								
							</div>
						</div>

					</div>

				</div>
			</div>
		
	</section>
	
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
});
</script>
