
<style>
	h3{
		background-color: #61d3d4 ;
		color: white;
		padding: 6px;
		text-align: left;
		border-radius: 10px;
		padding-left: 10px;
	}
	td{
		padding: 7px;
	}

</style>
<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->

   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
		  <h1>Salary Management</h1>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class=" ">
        <div class="row">
          <div class="col-12">
            <div class="card" style=" ">
	            <div class="card-header">
	            	<h5>Partnership</h5>
				</div>
				<div class="card-body">

	              <!-- /.card-header -->
					      <div class="card-body">
							<!--Partnership Staff -->
							<div class ="FullTimeStaff">
								<form name ="payroll" action="<?= base_url('add_partnershipSalary')?>" method="post" enctype="multipart/form-data">
								
								<div class="row">
								
									<div class="form-group col-md-6">
										<label for="from_date"> Year:</label>
										<select  name = "getyear" class="form-control getyear" required>
											<option value="" hidden>Select Year</option>
											<?php  $lasttenYear = (int)date("Y") - 20;
												$curyear = (int)date("Y");
												for($i=$lasttenYear; $i<= $curyear; $i++){?>
												<option value="<?php echo $i;?>"><?php echo $i;?></option>  
											<?php } ?>
										</select>
									</div>
		
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label " for="pwd">Employee Name:</label>
											<div class=" ">
												<select name="fullTimeemployeeName" class="form-control fullTimeemployeeName" required>
													<option>Select Employee Name</option>
													<?php foreach($allemployees as $allemployeesnRow): ?>
													<option value="<?= $allemployeesnRow['id']?>"><?= $allemployeesnRow['first_name'].' '.$allemployeesnRow['last_name'] ;?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>
									
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Service Total :</label>
											<div class="col-md-12">
												<input type="text" name="service_total" id="service_total" placeholder="Service Total" class="form-control service_total" readonly>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Service Profit :</label>
											<div class="col-md-12">
												<input type="text" name="service_profit" id="service_profit" placeholder="Service Profit" class="form-control service_profit" readonly>
											</div>
										</div>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Product Total:</label>
											<div class="col-md-12">
												<input type="text" name="product_total" placeholder="Product Total" class="form-control product_total" readonly>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Product Profit:</label>
											<div class="col-md-12">
												<input type="text" name="product_Profit" placeholder="Product Profit" class="form-control product_Profit" readonly>
											</div>
										</div>
									</div>
									
								</div>

								<!--<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Profit Sharing :</label>
											<div class="col-md-12">
												<input name="service_amount" placeholder="Service Amount"  class="form-control service-amount" readonly>
											</div>
										</div>
									</div>
									
								</div>
								<div class="row">
								<div class="col-md-12">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd"> Performance Bonus :</label>
											<div class="col-md-12">
												<input type="text" name="sales_bonus" placeholder="Sales Bonus" class="form-control sales_bonus" readonly>
											</div>
										</div>
									</div>
									
								</div>-->
								<div class="row">
								
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Total Earning $ :</label>
											<div class="col-md-12">
												<input name="total_earnings" placeholder="Total Earning" class="form-control total_earnings" readonly>
												
											</div>
										</div>
									</div>
								</div>

								<div class="container-fluid">
									<div class="text-right ">
										<div class="form-group">
											<input type="submit" class="btn btn-primary btn-custom" value="submit">
											<input type="Reset" value="Reset" class="btn btn-primary btn-custom">
										</div>
									</div>
								</div>
								</form>
								
							</div>
	              		</div>
	            	
				</div>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
 </div>

<script type = "text/javascript">
$(document).ready(function(){
	$(".getyear").on('change', function(e){
			e.preventDefault();
			//$empId = $(this).val();
			var salarygetyear = $('.getyear').val();
			//var empId = $('.fullTimeemployeeName').val();
			//alert(salarygetyear);

			get_service_bonus(salarygetyear);
			CommissionPay_bonus(salarygetyear);
			totalEarning(salarygetyear);
	});


function get_service_bonus(salaryDate){
	
	$.ajax({
			url : "<?php echo base_url('admin/comissionController/partnershipServiceCommission'); ?>",
			type : "post",
			data : {salaryDate:salaryDate},
			dataType: 'json',
			success : function(data){
				$.each(data, function (key, val) {
				//console.log('test');
					$(".service_total").val(val.total_amount);
					$(".service_profit").val(val.service_bonus);
				});
			}

	});
}

function CommissionPay_bonus(salaryDate){
	$.ajax({
			url : "<?php echo base_url('admin/comissionController/parnershipCommissionPay'); ?>",
			type : "post",
			data : {salaryDate:salaryDate},
			dataType: 'JSON',
			success : function(responce){
				console.log('test');
				$.each(responce, function (key, val) {
				//console.log('test');
				$(".product_total").val(val.salestotal);
				$(".product_Profit").val(val.salesCommission);
				});
		},
		error: function (error) {
			alert('error ');
		}

	});

}
function totalEarning(salaryDate){
	$.ajax({
		url : "<?php echo base_url('admin/comissionController/parnershipTotalEarning'); ?>",
		type : "post",
		data : {salaryDate:salaryDate},
		dataType: 'JSON',
		success : function(data){
			$('.total_earnings').val(data);
		},
		error: function (error) {
			alert('error');
		}
	});

}

});
</script>
