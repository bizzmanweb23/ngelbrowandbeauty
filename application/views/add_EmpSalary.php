
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
	            <h5>Full Time Salary</h5>
							</div>
							<div class="card-body">

	              <!-- /.card-header -->
					      <div class="card-body">
							<!--Full Time Staff -->
							<div class ="FullTimeStaff">
								<form name ="payroll" action="<?= base_url('add_employeeSalary')?>" method="post" enctype="multipart/form-data">
								
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label class="control-label  " for="pwd">Select Month:</label>
											<div class="col-md-12">
												<input type="month" name="fullTimesalaryDate" value="" class="form-control fullTimesalaryDate">
											</div>
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label class="control-label " for="pwd">Employee Name:</label>
											<div class=" ">
												<select name="fullTimeemployeeName" class="form-control fullTimeemployeeName">
													<option>Select Employee Name</option>
													<?php foreach($allemployees as $allemployeesnRow): ?>
													<option value="<?= $allemployeesnRow['id']?>"><?= $allemployeesnRow['first_name'].' '.$allemployeesnRow['last_name'] ;?></option>
													<?php endforeach; ?>
												</select>
											</div>
										</div>
									</div>
									<div class="col">
										<div class="form-group">
											<label class="control-label" for="">Desingnation</label>
											<div class=" ">
												<input type="text" name="designation" class="form-control designation" value="" readonly>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Basic Salary $ :</label>
											<div class="col-md-12">
												<input type="text" name="basic_salary" value ="" placeholder="Basic Salary" class="form-control basic-salary" readonly>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Cpf $ :</label>
											<div class="col-md-12">
												<input type="text" name="cpf" value="" placeholder="Cpf" class="form-control cpf" readonly>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Sales Amount $ :</label>
											<div class="col-md-12">
												<input type="text" name="fullTimesales_Amount" placeholder="Sales Amount" class="form-control sales-amount" readonly>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Sales Commission $ :</label>
											<div class="col-md-12">
												<input type="text" name="fullTimecommission_Pay" placeholder="Sales Commission Pay" class="form-control commission-pay" readonly>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Attendance Hours :</label>
											<div class="col-md-12">
												<input type="text" name="attendance_hours" placeholder="Perfect attendance" class="form-control attendance-hours" readonly>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Perfect attendance bonus $ :</label>
											<div class="col-md-12">
												<input name="fullTimePerfectAttendance" placeholder="Perfect attendance bonus" class="form-control attendance-bonus" readonly>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Service Amount $ :</label>
											<div class="col-md-12">
												<input name="service_amount" placeholder="" value="" class="form-control service-amount" readonly>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label label col-md-12" for="pwd" >Service Bonus % :</label>
											<div class="col-md-12">
												<input type="text" name="service_bonus" placeholder="Service Bonus" value="" class="form-control workmanship" readonly>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
								<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Sales Bonus $ :</label>
											<div class="col-md-12">
												<input type="text" name="sales_bonus" placeholder="Sales Bonus" value="" class="form-control sales-bonus" readonly>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Total Earning $ :</label>
											<div class="col-md-12">
												<input name="total_earnings" placeholder="Total Earning" value="" class="form-control total-earnings" readonly>
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

function exeFunction(){

	function get_attendance_bonus($id,$salaryDate){
		var sum = 0;
			$.ajax({
				url : "<?php echo base_url('employee/attendance/counter'); ?>",
				type : "post",
				data : {data: $id , salaryDate:$salaryDate},
				dataType: 'json',
				success : function(data){

					for (var i = 0; i < data.length; i++) {
						sum += parseFloat(data[i].work_hours);

					}
					if(sum == 208 || sum >= 208){
							$('.attendance-hours').val(sum);
							$('.attendance-bonus').val(parseInt(100));
							//alert('hello');
							var temp = $(".total-earning").val();
							//alert(temp);
							if(temp == undefined) {
								console.log('stap5');
								$(".total-earning").val(parseInt(0));
							}else{
								temp = temp + 100;
								console.log('stap4');
								
								$(".total-earning").val(parseInt(temp));
							}
					}
					if(sum <= 208){
							$('.attendance-hours').val(sum);
							$('.attendance-bonus').val(0);
							
							/*var temp = $(".total_earning").val();
							alert('bye'+ temp);
							temp = temp + 200;*/
							var temp = $(".total-earning").val();
							//alert(temp);
							console.log('stap1');
							if(temp == undefined) {
								console.log('stap2');
								$(".total-earning").val(parseInt(0));
							}else{
								temp = temp + 200;

								console.log('stap3');
								$(".total-earning").val(parseInt(temp));
							}
					}


				}

			});
		

	}
	function get_therapist_bonus($id,$salaryDate){
		var sum = 0;
		var serviceAdded = 0;
			$.ajax({
				url : "<?php echo base_url('admin/comissionController/dashboard_sum'); ?>",
				type : "post",
				data : {data: $id , salaryDate:$salaryDate},
				dataType: 'json',
				success : function(data){

					for (var i = 0; i < data.length; i++) {
						sum += parseFloat(data[i].amount);
						

					}
					//alert(sum);
					if(sum >= 99){
						//alert(sum);
						serviceAdded = parseFloat(sum * 5/100);
						//console.log(serviceAdded);
							$('.service-amount').val(sum);
							$('.workmanship').val(parseInt(serviceAdded));
							
							var temp = $(".total-earning").val();
							//alert(temp);
							if(temp == undefined) {
								
								$(".total-earning").val(parseInt(serviceAdded));
							}else{
								temp = temp + serviceAdded;

								
								$(".total-earning").val(parseInt(temp));
							}
							
					}
					if(sum <= 99){
							$('.service-amount').val(sum);
							$('.workmanship').val(0);
					}


				}

		});
	}
	function get_CommissionPay_bonus($id,$salaryDate){
		var sum = 0;
		var serviceAdded = 0;
		$.ajax({	
				type: "POST",	
				url: "<?= base_url("admin/comissionController/getshowCommissionPay")?>",
				data: {data: $id , salaryDate:$salaryDate},
				dataType: "JSON",
				success:function(data){	
					//alert(data);

					$.each(data, function (key, val) {
						//alert(val.basicSalary);
						$(".sales-amount").val(val.total);
						$(".commission-pay").val(val.commission);
						$(".sales-bonus").val(val.totalbonus);
					});
					
				}
			});
	}

	$(".fullTimesalaryDate, .fullTimeemployeeName").on('change', function(e){
			e.preventDefault();
			//$empId = $(this).val();
			$salaryDate = $('.fullTimesalaryDate').val();
			$empId = $('.fullTimeemployeeName').val();
			
			get_attendance_bonus($empId,$salaryDate);
			get_therapist_bonus($empId,$salaryDate);
			get_CommissionPay_bonus($empId,$salaryDate);
			
			$.ajax({
			url : "<?php echo base_url('admin/comissionController/empCommission'); ?>",
			type: "post",
			data : {data: $empId, salaryDate: $salaryDate},
			dataType: 'json',
			success : function(data)
			{
				$.each(data, function (key, val) {
					//alert(val.basicSalary);
					$(".designation").val(val.role_name);
					$(".basic-salary").val(val.empbasicSalary);
					$(".cpf").val(val.CPFtotal);
				});
				
			}
			
		});
		
		/*var totalEarnings = 0;
		var attBonus = 0;
		var workmanship  = 0;
		var salesBonus = 0;
		var commission_added = 0;
		var basicSalary = 0;
		var cpfAdded = 0;
			attBonus = $('.attendance-bonus').val();
			workmanship  = $('.workmanship').val();
			salesBonus = $('.sales-bonus').val();
			commission_added = $('.commission-pay').val();
			basicSalary = $('.basic-salary').val();
			cpfAdded = $(".cpf").val();
			
			totalEarnings = parseFloat(commission_added)+parseFloat(workmanship)+parseFloat(salesBonus)+parseFloat(attBonus)+parseFloat(basicSalary)+parseFloat(cpfAdded);

			console.log(totalEarnings);
			if(!isNaN){
				$('.total-earnings').val(totalEarnings);
			}else{
				
				$('.total-earnings').val(0);
			}*/
			
	});

		$(".attendance-bonus").change(function(){
		alert('test');
		var attBonus = $('.attendance-bonus').val();
		var	workmanship  = $('.workmanship').val();
		var totalEarnings = parseFloat(workmanship)+parseFloat(attBonus);
    	alert(totalEarnings);
  });

	
}
		

	setInterval( exeFunction , 500);
});

</script>
