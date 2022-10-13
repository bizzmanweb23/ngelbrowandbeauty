<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Bill Sheet</h1>
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
				<form id="add_customer" action="<?= base_url('admin/POS_management/post_add_orderproduct')?>" method="post" enctype="multipart/form-data">
					<div class = "row">

						<div class="col-md-4">
							<label for="services" class="col-sm-6 control-label">Customer Number:<i class="required">*</i></label>
							<input type="text" class="form-control customerNumber" name="customer_number" value="" onkeyup="get_customer();" placeholder="Customer Number...">
						</div>
						
						<div class="col-md-4">
							<label for="services" class="col-sm-6 control-label">First Name:</label>
							<input type="text" class="form-control customer_fname" name="customer_fname" value="">
						</div>
						<div class="col-md-4">
							<label for="services" class="col-sm-6 control-label">Last Name:</label>
							<input type="text" class="form-control customer_lname" name="customer_lname" value="">
						</div>
						
					</div>
					<div class="row">
						<div class="col-md-6">
							<label for="services" class="col-sm-6 control-label">Customer Address:</label>
							<input type="text" class="form-control customer_address" name="customer_address" value="">
						</div>
						<div class="col-md-6">
							<label for="services" class="col-sm-6 control-label">Sales Executive Name</label>
							<select class="chosen-select form-control ml-2" name="saler_id" style="width: 98%;">
								<option value="" hidden>Select Sales Executive</option>
								<?php foreach($allemployees as $employeesRow) : ?>
									<option value="<?= $employeesRow['id'] ?>"><?= $employeesRow['first_name'].' '.$employeesRow['last_name'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<div class = "row mt-3">
						<div class="col-md-12">
							<h4 class="col-md-12 control-label">Products</h4>

								<div class="clone_wrapper">

								<div class="row">
								
									<div class="col-md-3"> 
										<label for="Quantity" class="col-sm-6 control-label">Product </label>
										<select class="form-control product_name_1" name="productID[]" onchange="showProductPrice(1);">
										<option value="" hidden>Please select Product</option>
											<?php foreach($product_data as $product_dataRow) { ?>
												<option value="<?= $product_dataRow['id'] ?>"><?= $product_dataRow['name'] ?></option>
											<?php } ?>					
										</select>

									</div>
									<div class="col-md-3">
										<div class="col-md-6">
											<label for="age" class="control-label">Product Price</label>
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control" name="product_price[]" id="price_1" value="">
										</div>
									</div>
									<div class="col-md-3">   
										<div class="form-group">
											<label for="Quantity" class="col-sm-6 control-label">Quantity </label>
											<div class="col-md-4">
												<input type="number" class="form-control" name="quantity[]" id="quantity_1" onkeyup="calculate_total_quantity(1);">
											</div>
										</div>
									</div>
									
									<div class="col-md-2">
										<div class="col-md-6">
											<label for="age" class="control-label">Total Price</label>
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control" name="totalPrice[]" id="totalPrice_1" readonly>
										</div>
									</div>
								</div>
							
							</div>

							<div class="row">
								<div class="col-md-4 col-xs-2">
									<span class="btn btn-primary clone_button">Add More Product</span>
								</div>
							</div>
						</div>
						<input type="submit" class="btn btn-primary btn-custom" value="Generate Invoice" style="width: 250px;">
					</div>
				</form>
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

  <!-- this link for multiple selection-->
<style>
	h4{
		background-color: #61d3d4;
		color: white;
		padding: 5px;
		text-align: left;
		border-radius: 5px;
		padding-left: 5px;
	}
</style>
<script>
	
	function calculate_total_quantity(product_id) {
		

		var quantity = parseInt(document.getElementById('quantity_'+product_id).value);
		//alert(quantity);
		var price = parseInt(document.getElementById('price_'+product_id).value);
		
		var result = quantity * price;
		//alert(result);
		if(!isNaN(result)) {
			document.getElementById('totalPrice_'+product_id).value = result;
		}

	}

	function get_customer(){
	//alert(salaryDate + ' ' + empId);
		var customerNumber = $('.customerNumber').val();
		//alert(customerNumber);
		$.ajax({	
			type: "POST",	
			url: "<?= base_url("admin/POS_management/customerdetails")?>",
			data: {Id: customerNumber },
			dataType: "JSON",
			success:function(data){	
				//alert(data);
				$.each(data, function (key, val) {
					//console.log('test');
					$(".customer_fname").val(val.first_name);
					$(".customer_lname").val(val.last_name);
					$(".customer_address").val(val.shipping_address);
					
				});
			}
		});
	}
	function showProductPrice(product_id){
	//alert(salaryDate + ' ' + empId);
		var productID = $('.product_name_'+product_id).val();
		
		$.ajax({	
			type: "POST",	
			url: "<?= base_url("admin/POS_management/posProductPrice")?>",
			data: {Id: productID },
			dataType: "JSON",
			success:function(data){	

				document.getElementById('price_'+product_id).value = data
				
			}
		});
	}

	$(document).ready(function(){
	var count = 1;
	$('.clone_button').click(function() {
		count++;
		  var clonetext = '<div class="row"><div class="col-md-3"><label for="Quantity" class="col-sm-6 control-label">Product</label><select class="form-control product_name_'+count+'" name="productID[]" onchange="showProductPrice('+count+');"><option value="" hidden>Please select Product</option><?php foreach($product_data as $product_dataRow) { ?><option value="<?= $product_dataRow['id'] ?>"><?= $product_dataRow['name'] ?></option><?php } ?></select></div><div class="col-md-3"><div class="col-md-6"><label for="age" class="control-label">Product Price</label></div><div class="col-md-6"><input type="text" class="form-control" name="product_price[]" id="price_'+count+'" value=""></div></div><div class="col-md-3"><div class="form-group"><label for="Quantity" class="col-sm-6 control-label">Quantity </label><div class="col-md-4"><input type="number" class="form-control" name="quantity[]" id="quantity_'+count+'" onkeyup ="calculate_total_quantity('+count+');"></div></div></div><div class="col-md-2"><div class="col-md-6"><label for="age" class="control-label">Total Price</label></div><div class="col-md-6"><input type="text" class="form-control" name="totalPrice[]" id="totalPrice_'+count+'" readonly></div></div></div>';
		  $('.clone_wrapper').append(clonetext);
		});
	});
 </script> 
