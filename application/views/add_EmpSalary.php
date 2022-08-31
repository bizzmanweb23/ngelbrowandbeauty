
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
	            <h5>Full Time Management</h5>	 
							</div>
							<div class="card-body">

								<form id="form"  action="<?= base_url('employee/commission')?>" method="post" enctype="multipart/form-data">
	              <!-- /.card-header -->
					      <div class="card-body"> 
										<!--Full Time Staff --> 
										<div class ="FullTimeStaff">  
											<form name ="payroll" action="<?= base_url('employee/commission')?>" method="post" enctype="multipart/form-data">
											<input type="hidden" name="fullTimeempDesignation" value="" class="form-control fullTimeempDesignation">
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label  " for="pwd">Select Month:</label>
														<div class="col-md-12">          
															<input type="month" name="fullTimesalaryDate" value="" class="form-control fullTimesalaryDate">
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label " for="pwd">Employee Name:</label>
														<div class=" ">          
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
															<input type="text" name="basic-salary" placeholder="Basic Salary" class="form-control basic-salary" readonly>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-12" for="pwd">Cpf:</label>
														<div class="col-md-12">          
															<input type="text" name="cpf" placeholder="Cpf" class="form-control cpf" readonly>
														</div>
													</div>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-12" for="pwd">Sales Amount:</label>
														<div class="col-md-12">          
															<input type="text" name="fullTimesales_Amount" placeholder="Sales Amount" class="form-control sales-amount" readonly>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-12" for="pwd">Sales Commission:</label>
														<div class="col-md-12">          
															<input type="text" commission name="fullTimecommission_Pay" placeholder="Sales Commission Pay" class="form-control commission-pay" readonly>
														</div>
													</div>
												</div>
											</div>
											<div class="row">	
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-12" for="pwd">Attendance Hours :</label>
														<div class="col-md-12">          
															<input type="text" name="attendance-hours" placeholder="Perfect attendance" class="form-control attendance-hours" readonly>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-12" for="pwd">Perfect attendance bonus:</label>
														<div class="col-md-12">          
															<input type="text" name="fullTimePerfectAttendance" placeholder="Perfect attendance bonus" class="form-control fullTimePerfectAttendance" readonly>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-12" for="pwd">Total Earning:</label>
														<div class="col-md-12">          
															<input type="text" name="total-earnings" placeholder="Total Earning" value="" class="form-control total-earnings" readonly>
														</div>
													</div>
												</div>
											</div>
											<div class="container-fluid">
												<?php 
$maxDays=date('t');
$currentDayOfMonth=date('j');
echo 'total days of this month ---'.$maxDays;
 
 
?>
												<div class="text-right ">
													<div class="form-group"> 
															<input type="submit" class="btn btn-primary btn-custom" value="submit"> 
															<input type="Reset" value="Reset" class="btn btn-primary btn-custom"> 
													</div>
												</div>
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
    </section>
 </div> 

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

		$(document).on('change', '.jobType', function(){
			$job_type = $('[job-type]').val();

			$.ajax({
				url : "<?php echo base_url('admin/comissionController/worksmanCommission')?>",
				type: "post",
				data : {data: $job_type},
				success : function(data){ 
					alert(data);
				}
			});

		});

	 

		$(".fullTimeemployeeName").on('change', function(){ 
		 
			$empId = $(this).val();
			 	$.ajax({
				url : "<?php echo base_url('admin/comissionController/empCommission')?>",
				type: "post",
				data : {data: $empId}, 
				dataType: 'json',
				success : function(data){ 
					
		  	var today = new Date();
    		var month = today.getMonth();
    		day_in_month = daysInMonth(month + 1, today.getFullYear());
					function daysInMonth(month,year) {
	  				return new Date(year, month, 0).getDate();
					}
  			 	
  			 	for(d=0 ; d<= day_in_month ; d++){
  			 	 
  			 	}
				  for(i=0;i<data.length;i++)
          { 
            	var commission_added = '';
            		if(data[i].sales_amount >= data[i].comission_from || data[i].sales_amount <= data[i].comission_from){
            		 commission_added = parseFloat(data[i].sales_amount*5/100);
            		$('[commission]').val(commission_added);
            	
            		}

            	if(data){

            	}
            	 	$('.attendance-hours').val(data[i].login[6]);
	            	$('.basic-salary').val(data[i].basic_pay);
	            	$('.sales-amount').val(data[i].sales_amount);
            	 
          }
				 
				}
			});

		});

		$(".fullTimesalaryDate").on('change', function(){ 

			$empDate = $(this).val();

			 	$.ajax({
				url : "<?php echo base_url('admin/comissionController/empDate')?>",
				type: "post",
				data : {data: $empDate},
				dataType : 'json',
				success : function(data){  
					 
					 $.each(data, function(key ,value){
					  
					 });
				}

			});
			 
		});


	});

	// function calculateFixedPaySum() {

	// 	var sum = 0;
	// 	//iterate through each textboxes and add the values
	// 	$(".fixedpayTotal").each(function() {
			
	// 		//add only if the value is number
	// 		if(!isNaN(this.value) && this.value.length!=0) {
	// 			sum += parseFloat(this.value);
	// 			//alert(sum);
	// 		}
	// 	});
		
	// 	$(".total_earning").val(sum.toFixed(2));
	// }
	// function calculateCommissionPaySum() {

	// 	var sum = 0;
	// 	//iterate through each textboxes and add the values
	// 	$(".CommissionPaysum").each(function() {
			
	// 		//add only if the value is number
	// 		if(!isNaN(this.value) && this.value.length!=0) {
	// 			sum += parseFloat(this.value);
	// 			//alert(sum);
	// 		}
	// 	});
		
	// 	$(".total_earning").val(sum.toFixed(2));
	// }

	
</script>
	
	