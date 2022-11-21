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
				<div class="col-1">
						<a href="<?=base_url('admin/employeeManagement/add_Partnership')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom  ">Payroll </button></a>
					</div>
					&nbsp;
					<div class="col-2">
						<a href="<?=base_url('admin/Pay_Structure/allPay_Structure')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom">Pay Structure </button></a>
					</div>
			  	</div>			
				
              </div>
              <!-- /.card-header -->
              <div class="card-body">


			  <!-- Full Time Stuff-->
			  <div id="menu1">
			  <h5>Partnership</h5>
				<div class="site-table" style = "overflow: auto; height: 400px">
					<table class="table table-bordered fultimeSalaryTable" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
						<thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
						<tr>
							<th>Year</th>
							<th>Partner Code </th>
							<th>Partner Name</th>
							<th>Designation</th>
							<th>Service profit</th>
							<th>Product Profit</th>
							<th>Total Earnings</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
							<?php foreach($employeeSalary as $employeeSalaryRow): ?>
								<tr>
									<td><?= $employeeSalaryRow['year']; ?></td>
									<td><?= $employeeSalaryRow['emp_number']?></td>
									<td><?= $employeeSalaryRow['first_name'].' '.$employeeSalaryRow['last_name']?></td>	
									<td>$<?= $employeeSalaryRow['service_profit']?></td>
									<td>$<?= $employeeSalaryRow['product_Profit']?></td>
									<td>$<?= $employeeSalaryRow['total_earnings']?></td>
									<td><?= date("d-m-Y", strtotime($employeeSalaryRow['created_at'])); ?></td>
									<td>
									
									<a href="<?= base_url('admin/employeeManagement/deletePartnerSalary/'. $employeeSalaryRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a>
									
								</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
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
