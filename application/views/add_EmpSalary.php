
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
														 <input type="text" name="designation" class="form-control designation" emp-type readonly>
														</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-12" for="pwd">Basic Salary $ :</label>
														<div class="col-md-12">
															<input type="text" name="basic-salary" placeholder="Basic Salary" class="form-control basic-salary" readonly>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-12" for="pwd">Cpf $ :</label>
														<div class="col-md-12">
															<input type="text" name="cpf" cpf placeholder="Cpf" class="form-control cpf" readonly>
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
															<input type="text" name="attendance-hours" attendance-hours placeholder="Perfect attendance" class="form-control attendance-hours" readonly>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-12" for="pwd">Perfect attendance bonus $ :</label>
														<div class="col-md-12">
															<input name="fullTimePerfectAttendance" attendance-bonus placeholder="Perfect attendance bonus" class="form-control attendance-bonus fullTimePerfectAttendance" readonly>
														</div>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-12" for="pwd">Service Amount $ :</label>
														<div class="col-md-12">
															<input   name="service-amount" placeholder="Total Earning" value="" class="form-control service-amount" readonly>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label label col-md-12" for="pwd" >Workmanship $ :</label>
														<div class="col-md-12">
															<input type="text" name="workmanship" placeholder="Sales Bonus" value="" class="form-control workmanship" readonly>
														</div>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-12" for="pwd">Total Earning $ :</label>
														<div class="col-md-12">
															<input   name="total-earnings" placeholder="Total Earning" value="" class="form-control total-earnings" readonly>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label class="control-label col-md-12" for="pwd">Sales Bonus $ :</label>
														<div class="col-md-12">
															<input type="text" name="total-earnings" placeholder="Sales Bonus" value="" class="form-control sales-bonus" readonly>
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

function exeFunction(){

	function get_attendance_bonus($id){
		var sum = 0;
			$.ajax({
				url : "<?php echo base_url('employee/attendance/counter'); ?>",
				type : "post",
				data : {data: $id},
				dataType: 'json',
				success : function(data){

					for (var i = 0; i < data.length; i++) {
						sum += parseFloat(data[i].work_hours);

					}
					if(sum == 208 || sum >= 208){
							$('.attendance-hours').val(sum);
							$('.attendance-bonus').val(parseInt(100));
					}
					if(sum <= 208){
							$('.attendance-hours').val(sum);
							$('.attendance-bonus').val(0);
					}


				}
			});
	}


	$(".fullTimeemployeeName").on('change', function(e){
			e.preventDefault();
			$empId = $(this).val();

			get_attendance_bonus($empId);
			$.ajax({
			url : "<?php echo base_url('admin/comissionController/empCommission'); ?>",
			type: "post",
			data : {data: $empId},
			dataType: 'json',
			success : function(data)
			{
			for(i=0;i<data.length;i++)
				{
					var commission_added = 0;
					var attBonus = 0;
					var basicSalary = 0;
					var typeRate = 0;
					var salesBonus = 0;
					var cpfAdded = 0;
					var serviceAmount = 0;
					var roleName = 'No Role found';
					//comission calculation
					if(data[i].sales_amount >= data[i].comission_from || data[i].sales_amount <= data[i].comission_from)
					{
							commission_added = parseFloat(data[i].sales_amount*5/100);
							$('[commission]').val(commission_added);
					}
					//workmanship
					if(data[i].role_name == 'workmanship')
					{
						typeRate = data[i].rate;
						$('.workmanship').val(typeRate);
					}
					if(data[i].role_name == 'Therapists')
					{
						typeRate = data[i].rate;
						$('.workmanship').val(typeRate);
					}
					if(data[i].role_name == 'Accounter')
					{
						typeRate = data[i].rate;
						$('.workmanship').val(typeRate);
					}
					if(data[i].role_name == 'Delivary_boy')
					{
						typeRate = data[i].rate;
						$('.workmanship').val(typeRate);
					}
					//cpf
					if(data[i].salary_from > 50 || data[i].salary_to <= 500){
								cpfAdded = parseFloat(data[i].sales_amount * data[i].emp_cpf/100);
					}
					else {
							cpfAdded = 0;
					}
					//role Name
					if(data[i].role_name == ' '){
						roleName = 'No Role Found';
					}else {
						roleName = data[i].role_name;
					}
					//sales amount of designation
					// if(data[i].service_amount > 99 ){
					// 	serviceAmount = parseFloat(data[i].service_amount)*parseFloat(99*5/100);
					// } else {
					// 	serviceAmount = 00;
					// }
					//sales bonus
					var strCommission = new String(data[i].sales_amount[0]-1)+'00';
					$('.sales-bonus').val(strCommission);
					//attence bonus
					$('.service-amount').val(data[i].service_amount);
					$('.designation').val(roleName);
					$('.label').text(roleName);
					$('.basic-salary').val(data[i].basic_pay);
					$('.sales-amount').val(data[i].sales_amount);
					$('.cpf').val(cpfAdded);
					//var inititalisation
					attBonus = $('[attendance-bonus]').val() ;
					salesBonus = $('.sales-bonus').val();
					basicSalary = $('.basic-salary').val();

					$totalEarnings = parseFloat(commission_added)+parseFloat(typeRate)+parseFloat(salesBonus)+parseFloat(attBonus)+parseFloat(basicSalary)+parseFloat(cpfAdded);
					$('.total-earnings').val($totalEarnings);

				}
			}
		});

	});
}

	setInterval( exeFunction , 500);
});

</script>
