
<div class="content-wrapper" style="margin-left: 270px;">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lead Management</h1>
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
										<img src="<?= base_url('uploads/lead_img/'.$leadData['profile_picture'])?>" class="rounded-circle" width="150">
										<div class="mt-3">
										<h4><?= $leadData['first_name'].' '.$leadData['last_name'] ?></h4>
										<p class="text-muted font-size-sm"><?= $leadData['email'] ?></p>
										</div>
									</div>
								</div>
							</div>
							<div class="card mt-3">
								<div class="card-header">
									<div class="d-inline h5">Address Details</div>
								</div>
								<ul class="list-group list-group-flush">
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Full Address</h6>
									<span class="text-secondary"><?= $leadData['address'] ?></span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">City</h6>
									<span class="text-secondary"><?= $leadData['city'] ?></span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">State</h6>
									<span class="text-secondary"><?= $leadData['state'] ?></span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Land Mark</h6>
									<span class="text-secondary"><?= $leadData['country'] ?></span>
								</li>
								<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
									<h6 class="mb-0">Pincode</h6>
									<span class="text-secondary"><?= $leadData['zip_code'] ?></span>
								</li>
								</ul>
							</div>
						</div>

					<div class="col-md-8">
						<div class="card mb-3">
							<div class="card-header">
								<div class="d-inline h5">Deatils</div>
							</div>
							<div class="card-body">
								<div class="row" >
									<div class="col-sm-3">
									<h6 class="mb-0">Reference Name</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?= $leadData['admin_name'] ?>
									</div>
								</div>
								<div class="row pt-3">
									<div class="col-sm-3">
									<h6 class="mb-0">Email ID</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?= $leadData['email'] ?>
									</div>
								</div>
								
								<div class="row pt-3">
									<div class="col-sm-3">
									<h6 class="mb-0">Phone</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?= $leadData['contact'] ?>
									</div>
								</div>
								
								<div class="row pt-3">
									<div class="col-sm-3">
									<h6 class="mb-0">Source</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?= $leadData['source_name'] ?>
									</div>
								</div>
								
								<div class="row pt-3">
									<div class="col-sm-3">
									<h6 class="mb-0">Date Of Birth</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?php if($leadData['dob'] == 0000-00-00){
											echo '';
										}else{ ?>
											<?= date("d-m-Y", strtotime($leadData['dob'])) ?>
									<?php } ?>
									
									</div>
								</div>
								
								<div class="row pt-3">
									<div class="col-sm-3">
									<h6 class="mb-0">Membership</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?php if($leadData['membership'] == '1'){ ?>
										Basic Membership
									<?php }elseif($leadData['membership'] == '2'){ ?>
										Gold Membership
									<?php }elseif($leadData['membership'] == '3'){ ?>
										VIP Membership
									<?php }else{ ?>
										Gold Membership
									<?php } ?>
									</div>
								</div>
								<div class="row pt-3">
									<div class="col-sm-3">
									<h6 class="mb-0">Comment</h6>
									</div>
									<div class="col-sm-9 text-secondary">
									<?= $leadData['comment'] ?>
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
