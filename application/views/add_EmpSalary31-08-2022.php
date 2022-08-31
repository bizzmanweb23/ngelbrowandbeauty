<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
		  <h1>Salary Management</h1>
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
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label class="control-label col-md-12" for="pwd">Job Type:</label>
								<div class="col-md-12">          
									<!--<input type="text" name="jobType" class="form-control jobTypeOption" readonly>-->
									<select name="jobType" class="form-control jobType">
										<option value="Commission_Staff">Commission Staff</option>
										<option value="Partnerships">Partnerships</option>
										<option value="Full_Time_Staff" selected>Full Time Staff</option>
									</select>
									
								</div>
							</div>
						</div>
					</div>
					<!--Commission Staff Pay -->
					<div class ="CommissionStaffPay" style="display: none;">
						<h3>Commission Staff Pay</h3>
						<form name ="payroll" action="<?= base_url('admin/employeeManagement/post_add_employeeSalary')?>" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Select Month:</label>
									<div class="col-md-12">          
										<input type="month" name="salaryDate" value="" class="form-control salaryDate">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Employee Name:</label>
									<div class="col-md-12">          
										<select name="employeeName" class="form-control employeeName">
											<option>Select Employee Name</option>
											<?php foreach($allemployees as $allemployeesnRow): ?>
											<option value="<?= $allemployeesnRow['id']?>"><?= $allemployeesnRow['first_name'].' '.$allemployeesnRow['last_name'] .'  '.'('. $allemployeesnRow['designation_name'] .')'?></option>
											<?php endforeach; ?> 
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-md-6 BasicPay">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Sales Amount:</label>
									<div class="col-md-12">          
										<input type="text" name="sales_Amount" placeholder="Sales Amount" class="form-control sales_Amount" readonly>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Commission Pay:</label>
									<div class="col-md-12">          
										<input type="text" name="commission_Pay" class="form-control CommissionPaysum" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 total_earning">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Total Earning:</label>
									<div class="col-md-12">          
										<input type="text" name="total_earning" placeholder="Total Earning" value="" class="form-control total_earning" >
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<div class="col-md-12">          
										<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 130px;">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="col-md-12">          
										<input type="Reset" value="Reset" class="btn btn-primary btn-custom">
									</div>
								</div>
							</div>
						</div>
						</form>
					</div>
					<!--Full Time Staff -->
					<div class ="FullTimeStaff">
						<h3>Full Time Staff</h3>
						<form name ="payroll" action="<?= base_url('admin/employeeManagement/post_add_fullTimeSalary')?>" method="post" enctype="multipart/form-data">
						<input type="hidden" name="fullTimeempDesignation" value="" class="form-control fullTimeempDesignation">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Select Month:</label>
									<div class="col-md-12">          
										<input type="month" name="fullTimesalaryDate" value="" class="form-control fullTimesalaryDate">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Employee Name:</label>
									<div class="col-md-12">          
										<select name="fullTimeemployeeName" class="form-control fullTimeemployeeName">
											<option>Select Employee Name</option>
											<?php foreach($allemployees as $allemployeesnRow): ?>
											<option value="<?= $allemployeesnRow['id']?>"><?= $allemployeesnRow['first_name'].' '.$allemployeesnRow['last_name'] .'  '.'('. $allemployeesnRow['designation_name'] .')'?></option>
											<?php endforeach; ?> 
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Basic Salary:</label>
									<div class="col-md-12">          
										<input type="text" name="fullTimeBasicSalary" placeholder="Basic Salary" class="form-control fullTimeBasicSalary" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Sales Amount:</label>
									<div class="col-md-12">          
										<input type="text" name="fullTimesales_Amount" placeholder="Sales Amount" class="form-control fullTimesales_Amount" readonly>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Sales Commission:</label>
									<div class="col-md-12">          
										<input type="text" name="fullTimecommission_Pay" placeholder="Sales Commission Pay" class="form-control fullTimecommission_Pay" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Attendance Hours :</label>
									<div class="col-md-12">          
										<input type="text" name="attendanceHours" placeholder="Perfect attendance" class="form-control attendanceHours" readonly>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Perfect attendance :</label>
									<div class="col-md-12">          
										<input type="text" name="fullTimePerfectAttendance" placeholder="Perfect attendance" class="form-control fullTimePerfectAttendance" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Total Earning:</label>
									<div class="col-md-12">          
										<input type="text" name="fullTimetotal_earning" placeholder="Total Earning" value="" class="form-control fullTimetotal_earning" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<div class="col-md-12">          
										<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 130px;">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="col-md-12">          
										<input type="Reset" value="Reset" class="btn btn-primary btn-custom">
									</div>
								</div>
							</div>
						</div>
					</div>

						<!--Partnership -->
					<div class ="Partnership" style="display: none;">
						<h3>Partnership</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Select Month:</label>
									<div class="col-md-12">          
										<input type="month" name="salaryDate" value="" class="form-control">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Employee Name:</label>
									<div class="col-md-12">          
										<select name="employeeName" class="form-control">
											<option>Select Employee Name</option>
											<?php foreach($allemployees as $allemployeesnRow): ?>
											<option value="<?= $allemployeesnRow['id']?>"><?= $allemployeesnRow['first_name'].' '.$allemployeesnRow['last_name'] .'  '.'('. $allemployeesnRow['designation_name'] .')'?></option>
											<?php endforeach; ?> 
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row">	
							<div class="col-md-6 BasicPay">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Sales Amount:</label>
									<div class="col-md-12">          
										<input type="text" name="sales_Amount" placeholder="Sales Amount" class="form-control" readonly>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Commission Pay:</label>
									<div class="col-md-12">          
										<input type="text" name="commission_Pay" class="form-control" readonly>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 total_earning">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Total Earning:</label>
									<div class="col-md-12">          
										<input type="text" name="total_earning" placeholder="Total Earning" value="" class="form-control total_earning" >
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<div class="col-md-12">          
										<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 130px;">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<div class="col-md-12">          
										<input type="Reset" value="Reset" class="btn btn-primary btn-custom">
									</div>
								</div>
							</div>
						</div>
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
<script type = "text/javascript">
	
	$(document).ready(function(){

		/*$(".jobType").change(function(){
			if (this.value == 'Commission_Staff') {
				$(".CommissionStaffPay").show();
				$(".FullTimeStaff").hide();
				$(".Partnerships").hide(); 
			}
			if(this.value == 'Partnerships'){
				$(".Partnerships").show();
				$(".CommissionStaffPay").hide();
				$(".FullTimeStaff").hide(); 
			}
			if(this.value == 'Full_Time_Staff'){
				$(".FullTimeStaff").show();
				$(".Partnerships").hide();
				$(".CommissionStaffPay").hide(); 
			}
		});*/


		$(".salaryDate, .employeeName").on('change', function(){
			
			var salaryDate = $('.salaryDate').val();
			var employeeName = $('.employeeName').val();
			//alert(salaryDate+employeeName);
			
			$.ajax({	
				type: "POST",	
				url: "<?= base_url("admin/EmployeeManagement/showCommissionPay")?>",

				data: { salary_Date: salaryDate, employee_Name: employeeName },
				dataType: "JSON",
				success:function(data){	
					//alert(data);

					$.each(data, function (key, val) {
						//alert(val.jobtype);
						//$(".jobTypeOption").val(val.jobtype);
						$(".CommissionPaysum").val(val.commission);
						$(".designation").val(val.role_name);
						$(".sales_Amount").val(val.sales_amount);
					});
					
				}
			});
			
		});


		$(".fullTimesalaryDate, .fullTimeemployeeName").on('change', function(){
			
			var salaryDate = $('.fullTimesalaryDate').val();
			var employeeName = $('.fullTimeemployeeName').val();
			alert(salaryDate+' '+employeeName);
			
			$.ajax({	
				type: "POST",	
				url: "<?= base_url("admin/EmployeeManagement/showfulltimePay")?>",

				data: { salary_Date: salaryDate, employee_Name: employeeName },
				dataType: "JSON",
				success:function(data){	
					//alert(data);

					$.each(data, function (key, val) {
						//alert(val.basicSalary);
						$(".fullTimesales_Amount").val(val.sales_amount);
						$(".fullTimeempDesignation").val(val.role_name);
						$(".fullTimecommission_Pay").val(val.commission);
						$(".fullTimePerfectAttendance").val(val.attendanceTotal);
						$(".attendanceHours").val(val.roundTotal_hours);
						$(".fullTimeBasicSalary").val(val.basicSalary);
						$(".fullTimetotal_earning").val(val.fullTimetotal_ear);
					});
					
				}
			});
			
		});

	});

	function calculateFixedPaySum() {

		var sum = 0;
		//iterate through each textboxes and add the values
		$(".fixedpayTotal").each(function() {
			
			//add only if the value is number
			if(!isNaN(this.value) && this.value.length!=0) {
				sum += parseFloat(this.value);
				//alert(sum);
			}
		});
		
		$(".total_earning").val(sum.toFixed(2));
	}
	function calculateCommissionPaySum() {

		var sum = 0;
		//iterate through each textboxes and add the values
		$(".CommissionPaysum").each(function() {
			
			//add only if the value is number
			if(!isNaN(this.value) && this.value.length!=0) {
				sum += parseFloat(this.value);
				//alert(sum);
			}
		});
		
		$(".total_earning").val(sum.toFixed(2));
	}

	
</script>
	
	