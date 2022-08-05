<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Order Details</h1>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid py-3">
        <div class="row">
          <div class="col-12">

            <div class="card" style="border-radius: 15px;height: 40rem;">
				<div class="card-header">
				<h4>Sales Report</h4>
				</div>
			<div class="container">

				<!-- Tab panes -->
				<div class="tab-content">

				<div id="home" class="tab-pane active">
					<div class="card-body">
						<!-- All Orders Content-->
						<div class="site-table" style = "overflow: auto;height: 500px;">
						
						<form id="add_category" action="<?= base_url('admin/OrderManagement/exportdailySales')?>" method="post" enctype="multipart/form-data">  
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label>From Date:</label>
										<input type="date" name="dailySalesDate" class="form-control dailySalesDate" required>                 
									</div>  
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>To Date:</label>
										<input type="date" name="toSalesDate" class="form-control toSalesDate">                 
									</div>  
								</div>
								<div class="col-md-3">
									<div class="form-group ">
										<label for="status" class="col-sm-6 control-label"></label>
										<div class="col-sm-12">
											<input type="submit" class="btn btn-primary btn-custom Download" value="Download" style="width:150px;">
										</div>
									</div>                       
								</div>
							</div>
						</form>
							<table class="table table-bordered dailySales_table" style="overflow: auto; width: 100%; height: 300px; text-align: center;">
								<thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
								<tr>
									<th>Order Number </th>
									<th>Customer Name</th>
									<th>Contact No.</th>
									<th>Address</th>
									<th>City</th>
									<th>State</th>
									<th>Pin Code</th>
									<th>Order Date</th>
									<th>Order Status</th>
									<th>Assign To Delivery</th>
									<th>Payment Method</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody class="displaySearch">
									<?php foreach($orderProduct as $orderProductRow): 
										$order_id =   $orderProductRow['id'];
									?>
									<tr>
										<td><?= $orderProductRow['order_number'] ?></td>
										<td><?php if($orderProductRow['customer_firstname'] == ''){ ?>	
											<?= $orderProductRow['first_name'].' '.$orderProductRow['last_name'] ?>
											<?php }else{ ?>
												<?= $orderProductRow['customer_firstname'].' '.$orderProductRow['customer_lastname']?>
											<?php } ?>
										</td>
										<td><?= $orderProductRow['shipping_contactno'] ?></td>
										<td><?= $orderProductRow['shipping_address'] ?></td>
										<td><?= $orderProductRow['shipping_city'] ?></td>
										<td><?= $orderProductRow['shipping_state'] ?></td>
										<td><?= $orderProductRow['shipping_postalcode'] ?></td>
											<td><?= $orderProductRow['create_date']?></td>
											<td><?php if($orderProductRow['order_status'] == 1)
											{ ?>
											<span class = "btn btn-success" style="box-shadow:none !important; text-transform:uppercase;">Current Order</span>
											<?php }elseif($orderProductRow['order_status'] == 2){ ?>
											<span class="btn btn-info" style="box-shadow:none !important; text-transform:uppercase;">Complated</span>
											<?php }elseif($orderProductRow['order_status'] == 3){ ?>
											<span class="btn btn-danger" style="box-shadow:none !important; text-transform:uppercase;">Canceled</span>
											<?php }else{ ?>
											<span></span>
											<?php } ?></td>
											<td><a href="<?= base_url('admin/OrderManagement/editDeliveryDetails/'.$orderProductRow['id'])?>" target="_blank" title="Assign To Delivery"><span class = "btn btn-warning" style="box-shadow:none !important; text-transform:uppercase;">Assign To Delivery</span></a></td>
											<td><?= $orderProductRow['payment_method']?></td>
											<td>
											
												<a data-order_id="<?=  $order_id; ?>" href="javascript:void(0);" data-toggle="modal" data-target="#showOrderProduct" class="btn btn-default" title="Edit" style="color:#b8860b" ><i class="fa fa-eye"></i></a>
											</td>					
									</tr>
									<?php endforeach; ?>
								</tbody>
								</table>
							</div>
						</div>
					</div> 


			</div>
			
			</div>

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

<div id="showOrderProduct" class="modal fade" tabindex="-1">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Order Product</h5>
				<button type="button" class="close close_btn" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered" style="overflow: auto; width: 100%; height: 150px; text-align: center;">
					<thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
					<tr>
						<th>Product Name</th>
						<th>Quantity</th>
						<th>Price</th>
						<th>Weight</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody class = "allOrder_productdata">
						
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Cancel</button>
				
			</div>
		</div>
	</div>
</div>     		

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	
<script>
	$(document).ready(function(){
		$('#showOrderProduct').on('show.bs.modal', function (e) {
			var order_id = $(e.relatedTarget).data('order_id');
			
			$.ajax({
				type : 'GET',
				url : '<?= base_url("admin/OrderManagement/fetchOrderproductData")?>', 
				data :  {order_id:order_id}, 
				success : function(data){
				$('.allOrder_productdata').html(data);
				}
			});
		});

		$(".dailySalesDate, .toSalesDate").change(function() {	
				
			var dailySalesDate = $('.dailySalesDate').val();
			var toSalesDate = $('.toSalesDate').val();
			
			
				//alert(toSalesDate);
				$.ajax({	
					type: "GET",	
					url: "<?= base_url("admin/OrderManagement/searchFromToSalesDate")?>",
					data: { dailySales_date: dailySalesDate,toSalesDate: toSalesDate },
					success: function(data) {	
						$(".displaySearch").html(data);
					}
				});
			
			/*else{
				$.ajax({	
					type: "GET",	
					url: "<?= base_url("admin/OrderManagement/searchDailySalesDate")?>",
					data: { dailySales_date: dailySalesDate },
					success: function(data) {	
						$(".displaySearch").html(data);
					}
				});
			}*/
				
		});

	});

</script> 

