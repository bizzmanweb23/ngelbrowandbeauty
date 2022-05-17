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

            <div class="card" style="border-radius: 15px">
              <div class="card-header">
                <!--<a href="<?=base_url('admin/ServiceCategoryCtl/add_appointment')?>"><button type="button" class="btn btn-primary btn-custom" style="float: right;">Add New Appointment </button></a>  -->       
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                    <div class="site-table" style="overflow: auto; height: 400px ">            
                      <table class="table table-bordered" id = "appointment" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
												<thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
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
																<th>Action</th>
															</tr>
													</thead>
													<tbody>
													<?php foreach($appointment as $appointments): ?>
														<tr>
															<td><?= $appointments['customer_number']?></td>
															<td><?= $appointments['customer_name']?></td>
															<td><?= $appointments['service_name']?></td>
															<td><?= $appointments['first_name'].''.$appointments['last_name']?></td>
															<td><?= $appointments['start_date']?></td>
															<td><?= $appointments['start_time']?></td>
															<td><?= $appointments['end_date']?></td>
															<td><?= $appointments['end_time']?></td>
															<td><?= $appointments['amount']?></td>
															<td><?php /*
																<a href="<?= base_url('admin/welcome/editAppointment/'. $appointments['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-edit"></i></a>*/?> 
																<a href="<?= base_url('admin/welcome/deleteAppointment/'. $appointments['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a>
															
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

<link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/ajax_datatables/css/jquery.dataTables.css"> 
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/assets/plugins/ajax_datatables/js/ajax-jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/assets/plugins/ajax_datatables/js/ajax-jquery.dataTables.min.js"></script>

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
</script>
