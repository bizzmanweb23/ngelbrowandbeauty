<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Service Management</h1>
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
                <a href="<?=base_url('admin/ServiceCategoryCtl/add_service')?>"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add New Service </button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="site-table" style="overflow: auto; height: 400px ">
                <table class="table table-bordered" id = "example2" style="overflow: auto; width: 800px; height: 250px; text-align: center;">
                  <thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
                  <tr>
                    <th>Service Name</th>
                    <th>Service Icon</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
										<th>Discounted price</th>
										<th>Package Session</th>
										<th>Package Price </th>
                    <th>Therapist Commission</th>
                    <th>Duration</th>
                    <th>Priority</th>
                    <th>Loyalty points</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($service as $services): ?>
                      <tr>
                        <td><?= $services['service_name']?></td>
                        <td><img src="<?= base_url('uploads/service_img/'.$services['service_icon'])?>" width="40" height="40"></td>
                        <td><?= $services['category_name']?></td>
                        <td><?php if($services['description'] != ''){ ?>
													<?= substr($services['description'],0,50); ?>....
												<?php } ?>
												</td>
                        <td>$<?= $services['service_price']?></td>
												<td>$<?= $services['discount_price']?></td>
												<td><?= $services['package_session']?></td>
												<td><?php if($services['package_times_price'] != ''){ ?>
														$<?= $services['package_times_price']; ?>
												<?php }else{ ?>

												<?php } ?>
												</td>
                        <td><?= $services['therapist_commission']?></td>
                        <td><?= $services['duration']?></td>
                        <td>
													<?php if($services['priority'] == 1){ 
													   echo 'High';
														} elseif($services['priority'] == 2){
															echo 'Important';
														}elseif($services['priority'] == 3){
															echo 'Normal';
														}elseif($services['priority'] == 4){
															echo 'Low';
														}else{} ?>
												
												</td>
                        <td><?= $services['loyalty_points']?></td>
                        <td><?php if($services['status'] == 1)
													{
														echo 'Active';
													}else{
														echo 'Inactive';
													} ?></td>
                        <td>
													<a href="<?= base_url('admin/ServiceCategoryCtl/editService/'.$services['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#61d3d4"><i class="fa fa-edit"></i></a>
													<a href="<?= base_url('admin/ServiceCategoryCtl/deleteService/'.$services['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a></td>
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
