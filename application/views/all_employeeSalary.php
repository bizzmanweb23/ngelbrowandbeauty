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
              <div class="card-header">
				<div class="row">
					<div class="col-md-1">
						<a href="<?=base_url('admin/employeeManagement/add_employeeSalary')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom">Payroll </button></a>
					</div>
					<div class="col-md-2">
						<a href="<?=base_url('admin/Pay_Structure/allPay_Structure')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom">Pay Structure </button></a>
					</div>
			  	</div>			
				
              </div>
              <!-- /.card-header -->
              <div class="card-body">


			  <!-- Full Time Stuff-->
			  <div id="menu1">
			  <h5>Employee's Salary List</h5>
				<div class="site-table" style = "overflow: auto; height: 400px">
					<table class="table table-bordered fultimeSalaryTable" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
						<thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
						<tr>
							<th>Employee number </th>
							<th>Employee Name</th>
							<th>Designation</th>
							<th>Basic Pay</th>
							<th>CPF</th>
							<th>Sales Commission</th>
							<th>Sales Bonus</th>
							<th>Perfect Attendance</th>
							<th>Service Bonus </th>
							<th>Total Earning</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
							<?php foreach($employeeSalary as $EmployeeFultimeSalaryRow): ?>
								<tr>
									<td><?= $EmployeeFultimeSalaryRow['emp_number']?></td>
									<td><?= $EmployeeFultimeSalaryRow['first_name'].' '.$EmployeeFultimeSalaryRow['last_name']?></td>	
									<td><?= $EmployeeFultimeSalaryRow['dept_id']?></td>
									<td><?= $EmployeeFultimeSalaryRow['basic_pay']?></td>
									<td><?= $EmployeeFultimeSalaryRow['cpf']?></td>
									<td><?= $EmployeeFultimeSalaryRow['commission_Pay']?></td>
									<td><?= $EmployeeFultimeSalaryRow['sales_bonus'] ?></td>
									<td><?= $EmployeeFultimeSalaryRow['perfectAttendance'] ?></td>
									<td><?= $EmployeeFultimeSalaryRow['service_bonus'] ?></td>
									<td><?= $EmployeeFultimeSalaryRow['total_earnings'] ?></td>
									<td>
									<!--<a href="<?= base_url('admin/employeeManagement/edit_employeeSalary/'.$EmployeeFultimeSalaryRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#61d3d4"><i class="fa fa-edit"></i></a>-->
									<a href="<?= base_url('admin/employeeManagement/deleteEmployeeSalary/'. $EmployeeFultimeSalaryRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a>
									<!--<a href="<?= base_url('admin/EmployeeManagement/empArchive/'.$EmployeeFultimeSalaryRow['id'])?>" onclick="return confirm('Are you sure you want to Archive this data?')" class="btn btn-default" data-oggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-user-times" aria-hidden="true"></i></a>-->
								</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>

								<!-- Nav tabs -->
								<!--<ul class="nav nav-tabs pt-3" role="tablist" style="display: none;">
									<li class="nav-item" style="display: none;">
									<a class="nav-link active" data-toggle="tab" href="#home" style="color:#000000">Commission Pay</a>
									</li>
									<li class="nav-item">
									<a class="nav-link" data-toggle="tab" href="#menu1" style="color:#000000">Full Time Stuff</a>
									</li>
									<li class="nav-item" style="display: none;">
									<a class="nav-link" data-toggle="tab" href="#menu2" style=" color:#000000">Partnerships</a>
									</li>
								</ul>-->


								<!-- Tab panes -->
								<?php /*<div class="tab-content">

									<div id="home" class="tab-pane active" style="display: none;">
										<div class="site-table" style = "overflow: auto; height: 400px">
											<table class="table table-bordered salary_table" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
												<thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
												<tr>
													<th>Employee number </th>
													<th>Employee Name</th>
													<th>Designation</th>
													<th>Commission</th>
													<th>Total Earning</th>
													<th>Action</th>
												</tr>
												</thead>
												<tbody>
													<?php foreach($employeeSalary as $employeeSalaryRow): ?>
														<tr>
															<td><?= $employeeSalaryRow['emp_number']?></td>
															<td><?= $employeeSalaryRow['first_name'].' '.$employeeSalaryRow['last_name']?></td>	
															<td><?= $employeeSalaryRow['designation_name']?></td>
															<td><?= $employeeSalaryRow['commissionPay']?></td>
															<td><?= $employeeSalaryRow['total_earning'] ?></td>
															<td>
															<!--<a href="<?= base_url('admin/employeeManagement/edit_employeeSalary/'.$employeeSalaryRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#61d3d4"><i class="fa fa-edit"></i></a>-->
															<a href="<?= base_url('admin/employeeManagement/deleteEmployeeSalary/'. $employeeSalaryRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a>
															<!--<a href="<?= base_url('admin/EmployeeManagement/empArchive/'.$employeeSalaryRow['id'])?>" onclick="return confirm('Are you sure you want to Archive this data?')" class="btn btn-default" data-oggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-user-times" aria-hidden="true"></i></a>-->
														</td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>


									<!-- Partnerships-->
									<div id="menu2" class="container tab-pane fade" style="display: none;">
										<div class="site-table" style = "overflow: auto; height: 400px">
										<table class="table table-bordered fultimeSalaryTable" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
												<thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
												<tr>
													<th>Employee number </th>
													<th>Employee Name</th>
													<th>Designation</th>
													<th>Basic Pay</th>
													<th>Total Earning</th>
													<th>Action</th>
												</tr>
												</thead>
												<tbody>
													<?php foreach($EmployeepartnershipSalary as $EmployeepartnershipSalaryRow): ?>
														<tr>
															<td><?= $EmployeepartnershipSalaryRow['emp_number']?></td>
															<td><?= $EmployeepartnershipSalaryRow['first_name'].' '.$EmployeepartnershipSalaryRow['last_name']?></td>	
															<td><?= $EmployeepartnershipSalaryRow['designation_name']?></td>
															<td><?= $EmployeepartnershipSalaryRow['basic_pay']?></td>
															<td><?= $EmployeepartnershipSalaryRow['total_earning'] ?></td>
															<td>
															<!--<a href="<?= base_url('admin/employeeManagement/edit_employeeSalary/'.$EmployeepartnershipSalaryRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#61d3d4"><i class="fa fa-edit"></i></a>-->
															<a href="<?= base_url('admin/employeeManagement/deleteEmployeeSalary/'. $EmployeepartnershipSalaryRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a>
															<!--<a href="<?= base_url('admin/EmployeeManagement/empArchive/'.$EmployeepartnershipSalaryRow['id'])?>" onclick="return confirm('Are you sure you want to Archive this data?')" class="btn btn-default" data-oggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-user-times" aria-hidden="true"></i></a>-->
														</td>
														</tr>
													<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div> */ ?>


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


<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

