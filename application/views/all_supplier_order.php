<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
  <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Procurement Management</h1>
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
							<h5>Supplier Order</h5>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
							<div class="site-table" style="overflow: auto; height: 400px ">
                <table class="table table-bordered supplier_table" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
                  <thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
                  <tr>
										<th>Order Code</th>
										<th>Supplier Name</th>
										<th>order Details</th>
										<th>Status</th>
										<th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($OrderSupplierData as $OrderSupplierRow): ?>
                      <tr>
                        <td><?= $OrderSupplierRow['order_code']?></td>
                        <td><?= $OrderSupplierRow['supplier_name']?></td>
                        <td><?php if($OrderSupplierRow['order_details'] != ''){ ?>
													<?= substr($OrderSupplierRow['order_details'],0,50) ?>...
													<?php }else{ ?>

													<?php } ?>
												</td>
                        <td>
                          <?php if($OrderSupplierRow['status'] == 1){ 
                            echo 'Approve';
                          }elseif($OrderSupplierRow['status'] == 1){
														echo "Reject";
													}else{ 
                            echo 'Pending';
                            } ?>
                        </td>
                        <td>
													<a data-OrderSupplierid="<?=  $OrderSupplierRow['id'];?>" href="javascript:void(0);" class="btn btn-default OrderSupplierDetails" title="View" style="color:#61d3d4"><i class="fa fa-eye" aria-hidden="true"></i></a>
													<a href="<?= base_url('admin/ProcurementManagement/view_OrderProductList/'.$OrderSupplierRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#61d3d4"><i class="fa fa-list"></i></a>
							
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

<div id="OrderSupplierDetailsModal" class="modal fade" tabindex="-1">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" style="background-color: #61d3d4; color:#000000;">
					<h5 class="modal-title" align="center">Order Details </h5>
					<button type="button" class="close close_btn" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class = "OrderSupplierdata"></div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Cancel</button>
					
				</div>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<script>

	$(document).ready(function(){
        $(".OrderSupplierDetails").click(function(){
          $("#OrderSupplierDetailsModal").modal('show');
					var OrderSupplierid = $(this).attr('data-OrderSupplierid');
					$.ajax({
						type : 'GET',
						url : '<?= base_url("admin/ProcurementManagement/orderSupplierDetails")?>', 
						data :  {OrderSupplierid:OrderSupplierid}, 
						success : function(data){
							//alert(data);

						$('.OrderSupplierdata').html(data);
						}
					});
					
        });
				$(".close_btn").click(function(){
						$("#OrderSupplierDetailsModal").modal("hide"); 
						
        });
    });
	</script>
