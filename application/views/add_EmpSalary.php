<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
		  <h1>Payroll Management</h1>
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
                <form name ="payroll" action="<?= base_url('admin/employeeManagement/post_add_employeeSalary')?>" method="post" enctype="multipart/form-data">
				<h3>Employee Salary Registration</h3>
					<div id="personal-details">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Employee Name:</label>
									<div class="col-md-12">          
										<select name="employeeName" class="form-control">
											<option>Select Employee Name</option>
											<?php foreach($allemployees as $allemployeesnRow): ?>
											<option value="<?= $allemployeesnRow['id']?>"><?= $allemployeesnRow['first_name'].' '.$allemployeesnRow['last_name']?></option>
											<?php endforeach; ?> 
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Designation:</label>
									<div class="col-md-12">          
									<select name="designation" class="form-control">
										<option>Select Designation</option>
										<?php foreach($empDesignation as $empDesignationRow): ?>
										<option value="<?= $empDesignationRow['id']?>"><?= $empDesignationRow['role_name']?></option>
										<?php endforeach; ?> 
									</select>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Job Type:</label>
									<div class="col-md-12">          
										<select name="jobType" class="form-control">
											<option value="" hidden>Select Job Type</option>
											<option value="1">Commission Staff</option>
											<option value="2">Partnerships</option>
											<option value="3">Full Time Staff</option>
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Manual Fees:</label>
									<div class="col-md-12">          
										<?php foreach($manual_fee as $manual_feeRow){ 
											$manual_id = $manual_feeRow['id'];
											$manualtype_of_fee = $manual_feeRow['type_of_fee'];
											$manual_amount = $manual_feeRow['amount']; ?>
											<input type="checkbox" onclick="chkcontrol(<?= $manual_id ?>)" class="commission" name="commission_structure" value="<?= $manual_amount ?>"><label for="vehicle1"><?= $manualtype_of_fee ?>($<?= $manual_amount ?>)</label><br>
										<?php } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							
							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Commission Structure A:</label>
									<div class="col-md-12">          
										<?php foreach($commission_structure_a as $commission_structure_aRow){ 
											$commission_structure_a_id = $commission_structure_aRow['id'];
											$structure_aType_of_fee = $commission_structure_aRow['fee_type'];
											$structure_a_amount = $commission_structure_aRow['amount']; ?>
											<input type="checkbox" onclick="chkcontrol(<?= $commission_structure_a_id ?>)" class="commission" name="commission_structure" value="<?= $structure_a_amount ?>"><label for="vehicle1"><?= $structure_aType_of_fee ?>($<?= $structure_a_amount ?>)</label><br>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Commission Structure B:</label>
									<div class="col-md-12">          
										<?php foreach($commission_structure_b as $commission_structure_bRow){ 
											$commission_structure_b_id = $commission_structure_aRow['id'];
											$structure_aType_of_fee = $commission_structure_aRow['fee_type'];
											$structure_a_amount = $commission_structure_aRow['amount']; ?>
											<input type="checkbox" class="commission" onclick="chkcontrol(<?= $commission_structure_b_id ?>)" name="commission_structure" value="<?= $structure_a_amount ?>"><label for="vehicle1"><?= $structure_aType_of_fee ?>($<?= $structure_a_amount ?>)</label><br>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Commission Structure c:</label>
									<div class="col-md-12">          
										<?php foreach($commission_structure_c as $commission_structure_cRow){ 
											$commission_structure_c_id = $commission_structure_cRow['id'];
											$structure_cType_of_fee = $commission_structure_cRow['type_of_fee'];
											$structure_c_amount = $commission_structure_cRow['amount']; ?>
											<input type="checkbox" class="commission" onclick="chkcontrol(<?= $commission_structure_c_id ?>)" name="commission_structure" value="<?= $structure_c_amount ?>"><label for="vehicle1"><?= $structure_cType_of_fee ?>($<?= $structure_c_amount ?>)</label><br>
										<?php } ?>
									</div>
								</div>
							</div>

							<div class="col-md-3">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Commission Structure c (partnership):</label>
									<div class="col-md-12">          
										<?php foreach($commission_c_partnership as $commission_structure_cRow){ 
											$commission_structure_cpartnership_id = $commission_structure_cRow['id'];
											$structure_cpartnershipType_of_fee = $commission_structure_cRow['type_of_fee'];
											$structure_cpartnership_amount = $commission_structure_cRow['amount']; ?>
											<input type="checkbox" class="commission" onclick="chkcontrol(<?= $commission_structure_cpartnership_id ?>)" name="commission_structure" value="<?= $structure_cpartnership_amount ?>"><label for="vehicle1"><?= $structure_cpartnershipType_of_fee ?>($<?= $structure_cpartnership_amount ?>)</label><br>
										<?php } ?>
									</div>
								</div>
							</div>


						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Commission Pay:</label>
									<div class="col-md-12">          
										<input type="text" name="CommissionPay" placeholder="Commission Pay" class="form-control CommissionPay">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Basic Pay:</label>
									<div class="col-md-12">          
										<input type="text" name="basic_pay" placeholder="Basic Pay" id = "basic_pay" class="form-control basic_pay" onkeyup ="calcSalary()">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Insurance:</label>
									<div class="col-md-12">          
										<input type="text" name="employees_state_insurance" placeholder="Employees State Insurance" value ="" class="form-control" id="EmployeesStateInsurance">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Central Provident Fund:</label>
									<div class="col-md-12">          
										<input type="text" name="Provident_fund" value ="" placeholder="Provident Fund" class="form-control" id = "Provident_fund">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Medical Allowance:</label>
									<div class="col-md-12">          
										<input type="text" name="medical_allowance" placeholder="Medical Allowance" value="" class="form-control" id = "medical_allowance">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Medical Leave Entitlement:</label>
									<div class="col-md-12">          
										<input type="text" name="medical_leave_entitlement" placeholder="Medical Leave Entitlement" value="" class="form-control" id = "medical_leave_entitlement">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Net Pay:</label>
									<div class="col-md-12">          
										<input type="text" name="net_pay" placeholder="Net Pay" value="" class="form-control" id="net_pay">
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Total Earning:</label>
									<div class="col-md-12">          
										<input type="text" name="total_earning" placeholder="Total Earning" value="" class="form-control" id="total_earning">
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label col-md-12" for="pwd">Total Deduction:</label>
									<div class="col-md-12">          
										<input type="text" name="total_deduction" placeholder="Total Deduction" value="" class="form-control" id="total_deduction" >
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

<style>	
	h3{
		background-color: #b8860b;
		color: white;
		padding: 6px;
		text-align: left;
		border-radius: 10px;	
		padding-left: 10px;
	}
	td{
		padding: 7px;
	}
	
	.button{
		background-color: #b8860b;
		color:#fff;
		border: none;
		padding: 10px 15px;
	}
	
	.button:hover {
		cursor: pointer;
		box-shadow: 5px 5px 5px;
	}
</style>
<script type = "text/javascript">
    function calcSalary(){

		//const basic_pay = parseInt(document.getElementById('basic_pay').value);
		let basic_pay = document.getElementById('basic_pay').value;
		let CommissionPay = $('.CommissionPay').val();

		/*var total = parseFloat(basic_pay) + parseFloat(CommissionPay);
		$('.basic_pay').val(total);*/
		
		const da = document.getElementById("da").value;//   parseInt(document.getElementById('da').value);
		const pf = document.getElementById("pf").value;
		const esi = document.getElementById("esi").value;
		const ma = document.getElementById("ma").value;
		const mle = document.getElementById("mle").value;
		//alert(da);
		
		const DA = basic_pay * da;
		const MA = basic_pay * ma;
		const MLE = basic_pay * mle;
		const GrandPay = basic_pay + DA + MA + MLE;
        const PF = GrandPay * pf;
        const EmployeesStateInsurance = GrandPay * esi;
        const Deduction = EmployeesStateInsurance + PF;
        const NetPay = GrandPay - Deduction;

		//alert(NetPay);
		
		if(!isNaN()) {
			document.getElementById('basic_pay').value 
			document.getElementById('dearness_allowance').value = DA;
			document.getElementById('Provident_fund').value = PF;
			document.getElementById('EmployeesStateInsurance').value = EmployeesStateInsurance;
			document.getElementById('medical_allowance').value = MA;
			document.getElementById('medical_leave_entitlement').value = MLE;
			document.getElementById('total_earning').value = GrandPay;
			document.getElementById('net_pay').value = NetPay;
			document.getElementById('total_deduction').value = Deduction;
		}
	}
	/*$(document).ready(function(){
	$('.commission').change(function(){
		var basicPay = $('.basic_pay').val();
		var commission = [];
		if (!$(this).is(":checked")) {	
			$('.basic_pay').val(0);
			commission.empty();
			$('.commission').prop('checked', false);
			location.reload();
		}
		
	$('.commission:checked').each(function(i, e) {
		
		commission.push($(this).val());
		//total += commission[i];

		//alert(total);
		var total = parseFloat(basicPay) + parseFloat(commission[i]);
		$('.basic_pay').val(total);
		
	});

	});
		

	});*/

	function chkcontrol(j) {
		var sum=0;
		
		//let value = document.getElementById('basic_pay').value;
		for(var i=0; i < document.payroll.commission_structure.length; i++){

		if(document.payroll.commission_structure[i].checked){
			sum = sum + parseInt(document.payroll.commission_structure[i].value);

		}
		$('.CommissionPay').val(sum);
	}
	}
</script>
	
	