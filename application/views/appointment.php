<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Appointments</h1>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card" style="border-radius: 15px; background-color : #e3e3e3;">
              <div class="card-header">
               <!-- <a href="<?=base_url('admin/ServiceCategoryCtl/add_appointment')?>"><button type="button" class="btn btn-primary btn-custom" style="float: right;">Add New Appointment </button></a> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="overflow: auto; height: 100% ">
					<div class="row">
							<div class="col-md-3">
								<div class="form-group">
									<input type="date" class="form-control appointment_date" name="appointment_date">
								</div>
							</div>
							<div class="col-md-3">
								<select name = "gettherapist" class="form-control gettherapist">
									<option value="" hidden>Search By Therapist</option> 
									<?php foreach($therapist as $therapistRow): ?>
										<option value="<?= $therapistRow['id']?>"><?= $therapistRow['first_name'].' '.$therapistRow['last_name']?></option>
									<?php endforeach; ?> 
								</select>
							</div>
							<div class="col-md-3">
								<select name = "getService" class="form-control getService">
									<option value="" hidden>Search By Service</option> 
									<?php foreach($service as $serviceRow): ?>
										<option value="<?= $serviceRow['id']?>"><?= $serviceRow['service_name']?></option>
									<?php endforeach; ?> 
								</select>
							</div>
							<div class="col-md-3">
								<select name = "status" class="form-control getstatus">
									<option value="" hidden>Search By Status</option> 
									<option value="0">Pending</option>
									<option value="1">Approved</option>
									<option value="2">Completed</option>
								</select>
							</div>
					</div>
					<div class="h3Class font-weight-bold">All Appointments</div>
					  <div class="site-table">   
                      	<table class="table table-bordered" style="background-color: #fff; overflow: auto; width: 100%; height: 250px; text-align: center;">
							<thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
								<tr>
									<th>Customer Number</th>
									<th>Customer Name</th>
									<th>Services</th>
									<th>Therapist</th>
									<th>Start Date</th>
									<th>Start Time</th>
									<th>End Date</th>
									<th>End Time</th>
									<th>Amount</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody class="displaySearch">
								<?php foreach($allAppointment as $appointmentsRow): ?>
								<tr>
									<td><?= $appointmentsRow['customer_number']?></td>
									<td><?= $appointmentsRow['customer_name']?></td>
									<td><?php
									$splittedstring2 = explode(",", $appointmentsRow['services']);
									foreach ($splittedstring2 as $key => $value) {
										$service_sql2 = "SELECT nbb_service.service_name FROM nbb_service WHERE nbb_service.id = '".$value."'";
										$service_query2 = $this->db->query($service_sql2);	
										foreach($service_query2->result_array() as $serviceRow2){
											
											echo  $service_name2 = $serviceRow2['service_name'];

										}
										if(count($splittedstring2) > 1){
											echo ',';
										}
									}
									?></td>
									<td><?= $appointmentsRow['first_name'].''.$appointmentsRow['last_name']?></td>
									<td><?= $appointmentsRow['start_date']?></td>
									<td><?= $appointmentsRow['start_time']?></td>
									<td><?= $appointmentsRow['end_date']?></td>
									<td><?= $appointmentsRow['end_time']?></td>
									<td><?= $appointmentsRow['amount']?></td>
									<td>
										<?php if($appointmentsRow['status'] == 1){ ?>
											<span class="font-weight-bold" style='color: #A020F0'></i>Approved</span>
										<?php }elseif($appointmentsRow['status'] == 2){ ?>
											<span class="font-weight-bold" style='color: #008000'></i>Completed</span>
										<?php }elseif($appointmentsRow['status'] == 3){ ?>
											<span class="font-weight-bold" style='color: #FF0000'></i>Cancel</span>
										<?php }else{ ?>
											<span class="font-weight-bold" style='color: #FFA500;'>Pending</span>
										<?php }?>
									</td>
									<td>
										<a data-appointments_id="<?= $appointmentsRow['id'] ?>" href="javascript:void(0);" data-toggle="modal" data-target="#appoinmentStatus" class="btn btn-default" title="Edit" style="color:#61d3d4" ><i class="fa fa-edit"></i></a>
										<a href="<?= base_url('admin/ServiceCategoryCtl/deleteAppointment/'. $appointmentsRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a>
									</td>
								</tr>
								<?php endforeach; ?>
							</tbody>
                		</table>
						
              		</div>
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

<div id="appoinmentStatus" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Appointment Response</h5>
				<button type="button" class="close close_btn" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form id="add_category" action="<?= base_url('admin/ServiceCategoryCtl/update_appointmentStatus')?>" method="post" enctype="multipart/form-data">   
					<input type="hidden" class="status_appoinmentid" name = "status_appoinmentid" value="">
					<div class="row">     
						<div class="col-md-12">                       
							<div class="form-group">
								<select  class="form-control chosen chosen-select" name="status" id="status">
									<option value="" hidden>Select Response Option</option>
									<option value="1">Approved</option>
									<option value="2">Completed</option>
									<option value="3">Cancel</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-12">    
						<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width:130px;"> 
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>

<link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/ajax_datatables/css/jquery.dataTables.css"> 
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/assets/plugins/ajax_datatables/js/ajax-jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/assets/plugins/ajax_datatables/js/ajax-jquery.dataTables.min.js"></script>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
	.h3Class{
		/*background-color: #E8E8E8;*/
		color: black;
		padding: 5px;
		text-align: left;
		border-radius: 5px;
		padding-left: 10px;
	}
</style>
<script>
	$(function () {
		$('#appointment').DataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": false,
		"info": false,
		"autoWidth": true,
		"responsive": true,
		});
	});

	$(document).ready(function(){  	

		$('#appoinmentStatus').on('show.bs.modal', function (e) {
			var appointmentsID = $(e.relatedTarget).data('appointments_id');
			$('.status_appoinmentid').val(appointmentsID);	
		});

		$(".appointment_date").change(function() {			
			var appointment_date = $(this).val();
			var therapistID = '';
			var serviceID = '';
			var statusID = '';
			//alert(appointment_date);

				$.ajax({	
					type: "GET",	
					url: "<?= base_url("admin/serviceCategoryCtl/searchAppointmentData")?>",
					data: { appointment_date: appointment_date,therapistID:therapistID,serviceID:serviceID,statusID:statusID },
					success: function(data) {	
						$(".displaySearch").html(data);
					}
				});
		});

		$(".gettherapist").change(function() {			
			var therapistID = $(this).val();
			var appointment_date = '';
			var serviceID = '';
			var statusID = '';
			//alert(appointment_date);

				$.ajax({	
					type: "GET",	
					url: "<?= base_url("admin/serviceCategoryCtl/searchAppointmentData")?>",
					data: { therapistID: therapistID,appointment_date: appointment_date,serviceID:serviceID,statusID:statusID },
					success: function(data) {	
						$(".displaySearch").html(data);
					}
				});
		});
		$(".getService").change(function() {			
			var serviceID = $(this).val();
			var appointment_date = '';
			var therapistID = '';
			var statusID = '';
			//alert(appointment_date);

				$.ajax({	
					type: "GET",	
					url: "<?= base_url("admin/serviceCategoryCtl/searchAppointmentData")?>",
					data: { serviceID:serviceID,therapistID: therapistID,appointment_date: appointment_date,statusID:statusID },
					success: function(data) {	
						$(".displaySearch").html(data);
					}
				});
		});

		$(".getstatus").change(function() {
			var statusID = $(this).val();
			var serviceID = '';
			var appointment_date = '';
			var therapistID = '';
			//alert(appointment_date);

				$.ajax({	
					type: "GET",	
					url: "<?= base_url("admin/serviceCategoryCtl/searchAppointmentData")?>",
					data: { serviceID:serviceID,therapistID: therapistID,appointment_date: appointment_date,statusID:statusID },
					success: function(data) {	
						$(".displaySearch").html(data);
					}
				});
		});

	});
</script>
