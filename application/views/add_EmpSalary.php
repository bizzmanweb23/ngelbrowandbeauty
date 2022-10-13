
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
												<input type="month" name="fullTimesalaryDate" class="form-control fullTimesalaryDate">
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
												<input type="text" name="designation" class="form-control designation" readonly>
											</div>
										</div>
									</div>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Basic Salary $ :</label>
											<div class="col-md-12">
												<input type="text" name="basic_salary" id="basic-salary" placeholder="Basic Salary" class="form-control basic-salary" readonly>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Cpf $ :</label>
											<div class="col-md-12">
												<input type="text" name="cpf" placeholder="Cpf" class="form-control cpf" readonly>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Sales Amount $ :</label>
											<div class="col-md-12">
												<input type="text" name="fullTimesales_Amount" placeholder="Sales Amount" class="form-control sales_amount" readonly>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Sales Commission $ :</label>
											<div class="col-md-12">
												<input type="text" name="fullTimecommission_Pay" placeholder="Sales Commission Pay" class="form-control commission_pay" readonly>
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
												<input name="service_amount" placeholder="Service Amount"  class="form-control service-amount" readonly>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label label col-md-12" for="pwd" >Service Bonus % :</label>
											<div class="col-md-12">
												<input type="text" name="service_bonus" placeholder="Service Bonus"  class="form-control workmanship" readonly>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
								<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Sales Bonus $ :</label>
											<div class="col-md-12">
												<input type="text" name="sales_bonus" placeholder="Sales Bonus" class="form-control sales_bonus" readonly>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label col-md-12" for="pwd">Total Earning $ :</label>
											<div class="col-md-12">
												<input name="total_earnings" placeholder="Total Earning" class="form-control total-earnings" readonly>
												
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
	$(".fullTimesalaryDate, .fullTimeemployeeName").on('change', function(e){
			e.preventDefault();
			//$empId = $(this).val();
			var salaryDate = $('.fullTimesalaryDate').val();
			var empId = $('.fullTimeemployeeName').val();
			//alert(empId);

			get_empsalarycpf(salaryDate,empId);
			get_CommissionPay_bonus(salaryDate,empId);
			get_attendance_bonus(salaryDate,empId);
			get_therapist_bonus(salaryDate,empId);
			get_totalearnings(salaryDate,empId);	
		
	});



function get_CommissionPay_bonus(salaryDate,empId){

	$.ajax({	
		type: "POST",	
		url: "<?= base_url("admin/comissionController/getshowCommissionPay")?>",
		data: {data: empId , salaryDate:salaryDate},
		dataType: "JSON",
		success:function(data){	
			//alert(data);
			$.each(data, function (key, val) {
				//console.log('test');
				$(".sales_amount").val(val.total);
				$(".commission_pay").val(val.commission);
				$(".sales_bonus").val(val.totalbonus);
			});
			
		}
	});

}

function get_attendance_bonus(salaryDate,empId){
	
	$.ajax({
			url : "<?php echo base_url('admin/comissionController/attendance_sum'); ?>",
			type : "post",
			data : {data: empId , salaryDate:salaryDate},
			dataType: 'json',
			success : function(data){

				$.each(data, function (key, val) {
				//console.log('test');
					$(".attendance-hours").val(val.total_hours);
					$(".attendance-bonus").val(val.attendance_bonus);
				});


			}

		});
}
function get_therapist_bonus(salaryDate,empId){
	
	$.ajax({
			url : "<?php echo base_url('admin/comissionController/dashboard_sum'); ?>",
			type : "post",
			data : {data: empId , salaryDate:salaryDate},
			dataType: 'json',
			success : function(data){

				$.each(data, function (key, val) {
				//console.log('test');
					$(".service-amount").val(val.total_amount);
					$(".workmanship").val(val.service_bonus);
				});


			}

		});
}
function get_totalearnings(salaryDate,empId){
	//alert(empId);
	/*var totalEarnings = 0;
			var attBonus = 0;
			var workmanship  = 0;
			var salesBonus = 0;
			var commission_added = 0;
			var basicSalary = 0;
			var cpfAdded = 0;
	
			
			attBonus = $('.attendance-bonus').val();
			workmanship  = $('.workmanship').val();
			salesBonus = $('.sales_bonus').val();
			commission_added = $('.commission_pay').val();
			basicSalary = $('.basic-salary').val();
			cpfAdded = $(".cpf").val();
			console.log(basicSalary);
			
			//alert(basicSalary);
			totalEarnings = parseFloat(commission_added)+parseFloat(workmanship)+parseFloat(salesBonus)+parseFloat(attBonus)+parseFloat(basicSalary)+parseFloat(cpfAdded);

			var earningval = parseFloat(totalEarnings);

			//console.log(totalEarnings);
			if(earningval != ''){
				$('.total-earnings').val(basicSalary);
			}else{
				
				$('.total-earnings').val(basicSalary);
			}*/

			$.ajax({
			url : "<?php echo base_url('admin/comissionController/totalearnings'); ?>",
			type : "post",
			data : {data: empId , salaryDate:salaryDate},
			dataType: 'json',
			success : function(data){
				//alert(data);
				$('.total-earnings').val(data);
			}

		});
}

function get_empsalarycpf(salaryDate,empId){
	//alert(empId);

	$.ajax({	
		type: "POST",	
		url: "<?= base_url("admin/comissionController/empCommission")?>",
		data: {data: empId , salaryDate: salaryDate},
		dataType: "JSON",
		success:function(data){	
			//alert(data);
			$.each(data, function (key, val) {
				//console.log('test');
				//alert(val.empbasicSalary);
				$(".designation").val(val.role_name);
				$(".basic-salary").val(val.empbasicSalary);
				$(".cpf").val(val.CPFtotal);
			});
		}
	});

}
});
</script>
