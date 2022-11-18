<section class="main-content">
		<div class="container">
			<!--<h3>My Appointments</h3>-->
			<div class="orderBox patternbg">
				My Appointments
            </div>
			<ul class="nav nav-tabs" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" href="#Service_Order" role="tab" data-toggle="tab">Service Order</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#Appoinment" role="tab" data-toggle="tab">Appoinment</a>
				</li>
			</ul>

			<!-- Tab panes -->
			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="Service_Order">
					<table class="table">
						<thead>
							<tr>
								<th>Service Name</th>
								<th>Payment Status</th>
								<th>Date</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($order_service as $order_serviceRow): ?>
							<tr>	
								<td>
									<div class="user-info">
										<div class="user-info__basic">
											<h5 class="mb-0"><?= $order_serviceRow['service_name']; ?></h5>
											<p class="text-muted mb-0"><?php if($order_serviceRow['times_packages'] == 1){ ?>
												One Time Session
											<?php }else{ ?>
												Package
											<?php } ?>&nbsp; &nbsp;
												$<?= $order_serviceRow['service_price']; ?></p>
										</div>
									</div>
								</td>
								<td>
									<?php if($order_serviceRow['payment_status'] == 0){ ?>
										<h6 class="mb-0 " style="color: red;">Upload valid transaction statement</h6>
									<?php }elseif($order_serviceRow['payment_status'] == 1){ ?>
										Wait For Admin Responce
									<?php }else{ ?>
										<h6 class="mb-0 " style="color: green;">Done</h6>
									<?php } ?>
								</td>
								<td>
									<h6 class="mb-0"><?= date("d-m-Y", strtotime($order_serviceRow['created_at'])); ?></h6>
								</td>										
								<td>
								<?php if($order_serviceRow['payment_status'] == 0 || $order_serviceRow['payment_status'] == 2){ ?>
								 
								<?php }else{
									 if($this->session->userdata('id')>0){ ?>
										<a href="<?= base_url('appointmentBooking/'.$order_serviceRow['id'])?>" class="btn btn-primary first-btn px-2" target="_blank">Make An Appoinment</a>
									<?php }else{ ?>
										<a href="javascript:void(0)" onclick="return swal('Please Login First')" class="btn btn-primary first-btn px-2">Make An Appoinment</a>
									<?php  }
								} ?>
									
								</td>
							</tr>
							<?php	endforeach; ?>
							
						</tbody>
					</table>

				</div>

				<div role="tabpanel" class="tab-pane fade" id="Appoinment">
					<table class="table">
						<thead>
							<tr>
								<th>Service Name</th>
								<th>Appointment</th>
								<th>Phone</th>
								<th>Therapist</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach($appoinmentDetails as $appoinment_row): ?>
							<tr>	
								<td>
									<div class="user-info">
										<div class="user-info__basic">
											<h5 class="mb-0"><?= $appoinment_row['service_name']; ?></h5>
											<p class="text-muted mb-0"><?= $appoinment_row['times_packages']; ?> &nbsp; &nbsp;
												$<?= $appoinment_row['amount']; ?></p>

										</div>
									</div>
								</td>
								<td>
									<h6 class="mb-0"><?=  date(" h:i A", strtotime($appoinment_row['start_time'])).'-'.date(" h:i A", strtotime($appoinment_row['end_time'])); ?></h6>
									<small><?= date("d-m-Y", strtotime($appoinment_row['start_date'])); ?></small>
								</td>
								<td>
									<h6 class="mb-0"><?= $appoinment_row['customer_number']; ?></h6>
								</td>
								<td>
									<h6 class="mb-0"><?= $appoinment_row['first_name'].' '.$appoinment_row['last_name']; ?></h6>
								</td>
								<td>
									<?php if($appoinment_row['status'] == 1){ ?>
										
										<span class="label label-primary px-2" style='background: #A020F0'>Approved</span>
									<?php }elseif($appoinment_row['status'] == 2){ ?>
										<span class="label label-primary px-2" style='background: #008000'>Completed</span>
									<?php }elseif($appoinment_row['status'] == 3){ ?>
										<span class="label label-primary px-2" style='background: #FF0000'>Canceled</span>
									<?php }else{ ?>
										<span class="label label-primary px-2" style='background: #FFA500'>Pending</span>
									<?php }?>
									
								</td>
								<td>
								<?php if($appoinment_row['status'] == 3){ ?>
									
								<?php }else{ ?>
									<a class="label label-primary appoinment_button" href="<?= base_url() ?>front/Service/update_appointmentStatus?appoinment_id=<?= $appoinment_row['id']; ?>" onclick="return confirm('Are you sure you want to Cancel this Appoinment?');" style="background-color: #FF0000;"> ×</a>
								<?php } ?>
									<!--<div class="dropdown open">
										<a href="#!" class="px-2" id="triggerId1" data-toggle="dropdown" aria-haspopup="true"
												aria-expanded="false">
													<i class="fa fa-ellipsis-v"></i>
										</a>
										<div class="dropdown-menu" aria-labelledby="triggerId1">
											<a class="dropdown-item" href="#"><i class="fa fa-pencil mr-1"></i> Edit</a>
											<a class="dropdown-item text-danger" href="#"><i class="fa fa-trash mr-1"></i> Delete</a>
										</div>
									</div>-->
								</td>
							</tr>
							<?php	endforeach; ?>
							
						</tbody>
					</table>
				</div>
			</div>
			


		</div>
	</section>

	
	
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link>  
<style>

.main-content {
	padding-top: 100px;
	padding-bottom: 100px;
}

.table {
	border-spacing: 0 15px;
	border-collapse: separate;
}
.table thead tr th,
.table thead tr td,
.table tbody tr th,
.table tbody tr td {
	vertical-align: middle;
	border: none;
}
.table thead tr th:nth-last-child(1),
.table thead tr td:nth-last-child(1),
.table tbody tr th:nth-last-child(1),
.table tbody tr td:nth-last-child(1) {
	text-align: center;
}
.table tbody tr {
	box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
	border-radius: 5px;
}
.table tbody tr td {
	background: #fff;
}
.table tbody tr td:nth-child(1) {
	border-radius: 5px 0 0 5px;
}
.table tbody tr td:nth-last-child(1) {
	border-radius: 0 5px 5px 0;
}

.user-info {
	display: flex;
	align-items: center;
}
.user-info__img img {
	margin-right: 15px;
	height: 55px;
	width: 55px;
	border-radius: 45px;
	border: 3px solid #fff;
	box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}
</style>
