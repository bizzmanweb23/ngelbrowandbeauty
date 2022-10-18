<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Offer Management</h1>
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
							
                <a href="<?=base_url('admin/OfferAndPackages/add_Coupon')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add Offer </button></a>
								<h4>Offer List</h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                 <div class="site-table" style = "overflow: auto; height: 400px">
                <table class="table table-bordered" id = "salary_table" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
                  <thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
                  <tr>
                    <th>Offer Code </th>
                    <th>Description</th>
										<th>Banner Icon</th>
										<th>Discount</th>
										<th>Start Date</th>
										<th>Expiry Date</th>
										<th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($AllCoupons as $AllCouponsRow): ?>
                      <tr>
                        <td><?= $AllCouponsRow['coupon_code']?></td>
												<td><?= $AllCouponsRow['description'] ?></td>	
                        <td><?= $AllCouponsRow['banner_icon']?></td>
                        <td><?= $AllCouponsRow['discount']?></td>
												<td><?= $AllCouponsRow['start_date']?></td>
												<td><?= $AllCouponsRow['expiry_date']?></td>
                        <td><?php if($AllCouponsRow['status'] == 1){ ?>
														On going
												<?php }else{ ?>
														Ended
												<?php } ?>
												</td>
                        <td>
													<a href="<?= base_url('admin/OfferAndPackages/edit_coupon/'.$AllCouponsRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#61d3d4"><i class="fa fa-edit"></i></a>
													<a href="<?= base_url('admin/OfferAndPackages/deletePackage/'. $AllCouponsRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a>
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
	.product_style{
		background-color: #b8860b;
		color: white;
		padding: 5px;
		text-align: left;
		border-radius: 10px;
		padding-left: 10px;
	}
</style>
<script>
	$(function() {
		$("#salary_table").dataTable({
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": false,
			"info": false,
			"autoWidth": false,
			"responsive": false,
		});
	});
	
</script>
