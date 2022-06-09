<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Offer & Package Management</h1>
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
							
                <a href="<?=base_url('admin/OfferAndPackages/add_packageproduct')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add Package </button></a>
				<h2>Packages List</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                 <div class="site-table" style = "overflow: auto; height: 400px">
                <table class="table table-bordered" id = "salary_table" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
                  <tr>
                    <th>Package Name </th>
                    <th>Package Detail</th>
					<th>Price</th>
					<th>Package Credits</th>
					<th>Number Of Product</th>
					<th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($productPackages as $packagesRow): ?>
                      <tr>
                        <td><?= $packagesRow['package_name']?></td>
						<td><?= $packagesRow['package_detail'] ?></td>	
                        <td>$<?= $packagesRow['package_price']?></td>
                        <td><?= $packagesRow['package_credits']?></td>
						<td>
							<?php $packages_product_sql = "SELECT * FROM nbb_service_packages WHERE nbb_service_packages.package_id = '".$packagesRow['id']."'";
							$order_product_query = $this->db->query($packages_product_sql);
							echo $order_product_query->num_rows();
							?>
						</td>
                        <td><?php if($packagesRow['status'] == 1){ ?>
							On going
						<?php }else{ ?>
							Ended
						<?php } ?>
						</td>
                        <td>
							<a data-package_id="<?= $packagesRow['id']; ?>" href="javascript:void(0);" data-toggle="modal" data-target="#showAllProduct" class="btn btn-default" title="View" style="color:#b8860b"><i class="fa fa-eye" aria-hidden="true"></i></a>
							<a href="<?= base_url('admin/OfferAndPackages/edit_packages/'.$packagesRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-edit"></i></a>
							<a href="<?= base_url('admin/OfferAndPackages/deletePackage/'. $packagesRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a>
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

 <div id="showAllProduct" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Order Product</h5>
					<button type="button" class="close close_btn" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
				<h5 class= "product_style" align="center">All Services Name</h5>
				<ul class = "allpackage_productdata">
					
				</ul>
					<!--table class="table table-bordered" style="overflow: auto; width: 100%; height: 150px; text-align: center;">
						<thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
						<tr>
							<th>All Package Product</th>
						</tr>
						<tr class = "allpackage_productdata"></tr>
						</thead>
					</table-->
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

	$(document).ready(function(){
		$('#showAllProduct').on('show.bs.modal', function (e) {
			var package_id = $(e.relatedTarget).data('package_id');
			
			$.ajax({
				type : 'GET',
				url : '<?= base_url("admin/OfferAndPackages/fetchMultiProduct")?>', 
				data :  {package_id:package_id}, 
				success : function(data){
				$('.allpackage_productdata').html(data);
				}
			});
		});
	});
	
</script>
