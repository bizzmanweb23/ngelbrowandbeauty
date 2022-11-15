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
									<th>Payment Status</th>
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
													<a href="<?= base_url(); ?>/uploads/payment_image/<?= $ServiceBookingRow['payment_file'] ?>" class="btn btn-default" target="_blank"><img src="<?= base_url(); ?>/uploads/payment_image/<?= $ServiceBookingRow['payment_file'] ?>" width="50" height="40"></a>
													<?php } ?>
													</td>
												<td><?= $ServiceBookingRow['payment_status'] ?></td>
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

