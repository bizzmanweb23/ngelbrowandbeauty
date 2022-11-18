<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Service Booking</h1>
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
							<div class="site-table" style="overflow: auto; height: 400px ">
                <table class="table table-bordered supplier_table" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
                  <thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
                  <tr>
					        <th>user Name</th>
                  <th>service Name</th>
									<th>No Of Session </th>
                  <th>Service Price</th>
                  <th>Created Date</th>
									<th>Payment Slip</th>
									<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($ServiceBooking as $ServiceBookingRow): ?>
                      <tr>
                        <td><?= $ServiceBookingRow['first_name'].' '.$ServiceBookingRow['last_name']?></td>
                        <td><?= $ServiceBookingRow['service_name']?></td>
												<td><?= $ServiceBookingRow['package_session']?></td>
                        <td><?= $ServiceBookingRow['service_price']?></td>
                        <td><?= date("d-m-Y", strtotime($ServiceBookingRow['created_at']));?></td>
												<td><?php if($ServiceBookingRow['payment_file'] !=''){ ?>
													<a href="<?= base_url(); ?>/uploads/payment_image/<?= $ServiceBookingRow['payment_file'] ?>" class="btn btn-default" target="_blank">View</a>
													<?php } ?>
													</td>
												<td>
												<a data-ServiceBooking_id="<?= $ServiceBookingRow['id'] ?>" href="javascript:void(0);" class="btn btn-default ServiceBookingStatus" title="Edit" style="color:#61d3d4" ><i class="fa fa-edit"></i></a>
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

<div id="ServiceBookingStatusModal" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Payment Status</h5>
				<button type="button" class="close close_btn" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form id="add_category" action="<?= base_url('admin/ServiceCategoryCtl/update_paymentService')?>" method="post" enctype="multipart/form-data">   
					<input type="hidden" class="status_ServiceBookingid" name = "status_ServiceBookingid" value="">
					<div class="row">     
						<div class="col-md-12">                       
							<div class="form-group">
								<select  class="form-control chosen chosen-select" name="status" id="status">
									<option value="" hidden>Select Response Option</option>
									<option value="2">Approved</option>
									<option value="0">Cancel</option>
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

<script>
	$(document).ready(function(){  	
		$(".ServiceBookingStatus").click(function(){
				$("#ServiceBookingStatusModal").modal('show');
				var ServiceBookingID = $(this).attr('data-ServiceBooking_id');
				$("#ServiceBookingStatusModal .status_ServiceBookingid").val( ServiceBookingID );
				
			});
			$(".close_btn").click(function(){
					$("#ServiceBookingStatusModal").modal("hide"); 
					
			});
	});
</script>
