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
              <div class="card-header">
							
                <!--<a href="<?=base_url('admin/pay_Structure/add_PayStructure')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add Pay Structure </button></a>-->
								<h3>Pay Structure</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			 
                 <div class="site-table" style = "overflow: auto; height: 400px">

					<div class="container">

						<!-- Nav tabs -->
						<ul class="nav nav-tabs pt-3" role="tablist">
							<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#home" style="color:#b8860b">Workman ship</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#menu1" style="color:#b8860b">Commission Structure A</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#menu2" style="color:#b8860b">Commission Structure B</a>
							</li>
							<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#menu3" style="color:#b8860b">Commission Structure C </a>
							</li>
							<li class="nav-item">
							<a class="nav-link" data-toggle="tab" href="#menu4" style="color:#b8860b">Commission Structure C(Partnerships)</a>
							</li>
						</ul>

							<!-- Tab panes -->
							<div class="tab-content">

							<div id="home" class="tab-pane active">
							<div class="pt-2">
								<button type="button" class="btn btn-primary btn-custom" data-toggle="modal" data-target="#myManualFee">Add Manual Fee</button>
							</div>
							

							<table class="table table-bordered" id = "order_table2" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
									<thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
									<tr>
										<th>Type Of Manual Fee</th>
										<th>Amount</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
										<?php foreach($manual_fee as $manual_feeRow): 
											$manual_feeID =   $manual_feeRow['id'];
										?>
										<tr>
											<td><?= $manual_feeRow['type_of_fee']?></td>
											<?php if($manual_feeRow['amount'] != ''){ ?>	
											<td>$<?= $manual_feeRow['amount']?></td>
											<?php } ?>
											<td>
												<a href="<?= base_url('admin/pay_Structure/edit_manual_fee/'.$manual_feeID)?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#61d3d4"><i class="fa fa-edit"></i></a>
												<a href="<?= base_url('admin/pay_Structure/deletemanual_fee/'. $manual_feeID)?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a>
											</td>	
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>

							<div id="menu1" class="container tab-pane fade">
								<div class="pt-2">
									<button type="button" class="btn btn-primary btn-custom" data-toggle="modal" data-target="#mycommission_structure_a">Add Fee</button>
								</div>
							

							<table class="table table-bordered" id = "order_table2" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
									<thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
									<tr>
										<th>Pay Range</th>
										<th>Amount</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
										<?php foreach($commission_structure_a as $commission_feeaRow): 
											$commission_structure_aID =   $commission_feeaRow['id'];
										?>
										<tr>
											<td><?= $commission_feeaRow['from_range']?> - <?= $commission_feeaRow['to_range']?></td>
											<?php if($commission_feeaRow['amount'] != ''){ ?>	
											<td><?= $commission_feeaRow['amount']?>%</td>
											<?php } ?>
											<td>
												<a href="<?= base_url('admin/pay_Structure/edit_commission_structure_a/'.$commission_structure_aID)?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-edit"></i></a>
												<a href="<?= base_url('admin/pay_Structure/deletecommission_structure_a/'. $commission_structure_aID)?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a>
											</td>	
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div id="menu2" class="container tab-pane fade">
								<div class="pt-2">
									<button type="button" class="btn btn-primary btn-custom" data-toggle="modal" data-target="#mycommission_structure_b">Add Fee</button>
								</div>
							

							<table class="table table-bordered" id = "order_table2" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
									<thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
									<tr>
										<th>Type Of Fee</th>
										<th>Amount</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
										<?php foreach($commission_structure_b as $commission_feebRow): 
											$commission_feebID =   $commission_feebRow['id'];
										?>
										<tr>
											<td><?= $commission_feebRow['fee_Type']?></td>
											<?php if($commission_feebRow['amount'] != ''){ ?>	
											<td><?= $commission_feebRow['amount']?>%</td>
											<?php } ?>
											<td>
												<a href="<?= base_url('admin/pay_Structure/edit_commission_structure_b/'.$commission_feebID)?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-edit"></i></a>
												<a href="<?= base_url('admin/pay_Structure/deletecommission_structure_b/'. $commission_feebID)?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a>
											</td>	
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div id="menu3" class="container tab-pane fade">
								<div class="pt-2">
									<button type="button" class="btn btn-primary btn-custom" data-toggle="modal" data-target="#mycommission_structure_c">Add Fee</button>
								</div>
							

							<table class="table table-bordered" id = "order_table2" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
									<thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
									<tr>
										<th>Type Of Fee</th>
										<th>Amount</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
										<?php foreach($commission_structure_c as $commission_feeCRow): 
											$commission_structureCID =   $commission_feeCRow['id'];
										?>
										<tr>
											<td><?= $commission_feeCRow['type_of_fee']?></td>
											<?php if($commission_feeCRow['amount'] != ''){ ?>	
											<td>$<?= $commission_feeCRow['amount']?></td>
											<?php } ?>
											<td>
												<a href="<?= base_url('admin/pay_Structure/edit_commission_structure_c/'.$commission_structureCID)?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-edit"></i></a>
												<a href="<?= base_url('admin/pay_Structure/deletecommission_structure_c/'. $commission_structureCID)?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a>
											</td>	
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>
							</div>
							<div id="menu4" class="container tab-pane fade">
							<div class="pt-2">
									<button type="button" class="btn btn-primary btn-custom" data-toggle="modal" data-target="#mycommission_c_partnership">Add Fee</button>
								</div>
							

							<table class="table table-bordered" id = "order_table2" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
									<thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
									<tr>
										<th>Type Of Fee</th>
										<th>Amount</th>
										<th>Action</th>
									</tr>
									</thead>
									<tbody>
										<?php foreach($commission_c_partnership as $commission_c_partnerCRow): 
											$commission_c_partnershipID =   $commission_c_partnerCRow['id'];
										?>
										<tr>
											<td><?= $commission_c_partnerCRow['type_of_fee']?></td>
											<?php if($commission_c_partnerCRow['amount'] != ''){ ?>	
											<td>$<?= $commission_c_partnerCRow['amount']?></td>
											<?php } ?>
											<td>
												<a href="<?= base_url('admin/pay_Structure/edit_commission_c_partnership/'.$commission_c_partnershipID)?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-edit"></i></a>
												<a href="<?= base_url('admin/pay_Structure/deletecommission_c_partnership/'. $commission_c_partnershipID)?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a>
											</td>	
										</tr>
										<?php endforeach; ?>
									</tbody>
								</table>

							</div>
						</div>
					</div>

                <?php /*<table class="table table-bordered" id = "salary_table" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
                  <thead style="background-color: #fff; color:#b8860b;position: sticky;top: 0;">
                  <tr>
										<th>Year</th>
										<th>Commission</th>
										<th>Central Provident Fund</th>
										<th>Insurance</th>
										<th>Medical Leave Entitlement</th>
										<th>Medical Allowance</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($allpay_structure as $allpay_structureRow): ?>
                      <tr>
												<td><?= $allpay_structureRow['year']?></td>
                        <td><?= $allpay_structureRow['dearness_Allowance']?></td>
												<td><?= $allpay_structureRow['provident_Fund']?></td>
                        <td><?= $allpay_structureRow['ESI']?></td>
                        <td><?= $allpay_structureRow['medical_leave_entitlement'] ?></td>
												<td><?= $allpay_structureRow['medical_Allowance'] ?></td>
                        <td>
												<!--<a href="<?= base_url('admin/pay_Structure/edit_empPay_Structure/'.$allpay_structureRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-edit"></i></a>-->
												<a href="<?= base_url('admin/pay_Structure/deleteEmpPay_Structurey/'. $allpay_structureRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a>
											</td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>*/ ?>
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


 <!-- The Modal -->
 <div class="modal" id="myManualFee">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Manual Fee</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<form id="" action="<?= base_url('admin/Pay_Structure/post_add_manual_fee') ?>" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">   
						<div class="form-group">
							<label for="email" class="col-md-12 control-label">Type of Manual Fee</label>
							<div class="col-md-12">
								<input type="text" class="form-control" name="type_of_fee" id="type_of_fee" placeholder="Type of Manual Fee" value="">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="contact" class="col-sm-6 control-label">Amount</label>
							<div class="col-md-12">
								<input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">  
						
						<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
						
					</div>
				</div>
				
			</form>
        </div>
        
      </div>
    </div>
  </div>

 
 <!-- The commission_structure_a Modal -->
 <div class="modal" id="mycommission_structure_a">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Manual Fee</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<form id="" action="<?= base_url('admin/pay_Structure/post_add_commission_structure_a') ?>" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-3">   
						<div class="form-group">
							<label for="email" class="col-md-12 control-label">Type of Fee</label>
							<div class="col-md-12">
							<input type="text" class="form-control" name="from_range" id="type_of_fee" value="">
							</div>
						</div>
					</div>
					<div class="col-md-3">   
						<div class="form-group">
							<label for="email" class="col-md-12 control-label">Type of Fee</label>
							<div class="col-md-12">
							<input type="text" class="form-control" name="to_range" id="type_of_fee" value="">
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="contact" class="col-sm-6 control-label">Amount</label>
							<div class="col-md-12">
								<input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">  
						
						<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
						
					</div>
				</div>
				
			</form>
        </div>
        
      </div>
    </div>
  </div>


  <!-- The commission_structure_b Modal -->
 <div class="modal" id="mycommission_structure_b">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Manual Fee</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<form id="" action="<?= base_url('admin/pay_Structure/post_add_commission_structure_b') ?>" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">   
						<div class="form-group">
							<label for="email" class="col-md-12 control-label">Type of Fee</label>
							<div class="col-md-12">
								<input type="text" class="form-control" name="fee_type" placeholder="Type of Fee" value="">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="contact" class="col-sm-6 control-label">Amount</label>
							<div class="col-md-12">
								<input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">  
						
						<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
						
					</div>
				</div>
				
			</form>
        </div>
        
      </div>
    </div>
  </div>

  <!-- The commission_structure_c Modal -->
 <div class="modal" id="mycommission_structure_c">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Commission Structure C</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<form id="" action="<?= base_url('admin/pay_Structure/post_add_commission_structure_c') ?>" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">   
						<div class="form-group">
							<label for="email" class="col-md-12 control-label">Type of Fee</label>
							<div class="col-md-12">
								<input type="text" class="form-control" name="fee_type" placeholder="Type of Fee" value="">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="contact" class="col-sm-6 control-label">Amount</label>
							<div class="col-md-12">
								<input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">  
						
						<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
						
					</div>
				</div>
				
			</form>
        </div>
        
      </div>
    </div>
  </div>


    <!-- The commission_c_partnership Modal -->
 <div class="modal" id="mycommission_c_partnership">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Commission Structure C</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
			<form id="" action="<?= base_url('admin/pay_Structure/post_add_commission_c_partnership') ?>" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-6">   
						<div class="form-group">
							<label for="email" class="col-md-12 control-label">Type of Fee</label>
							<div class="col-md-12">
								<input type="text" class="form-control" name="fee_type" placeholder="Type of Fee" value="">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="contact" class="col-sm-6 control-label">Amount</label>
							<div class="col-md-12">
								<input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">  
						
						<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
						
					</div>
				</div>
				
			</form>
        </div>
        
      </div>
    </div>
  </div>


 <link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/ajax_datatables/css/jquery.dataTables.css"> 
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/assets/plugins/ajax_datatables/js/ajax-jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/assets/plugins/ajax_datatables/js/ajax-jquery.dataTables.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script>

	$(function() {
	$("#salary_table").dataTable({
		"paging": true,
		"lengthChange": false,
		"searching": true,
		"ordering": false,
		"info": false,
		"autoWidth": false,
		"responsive": false,
	});
	
	});
	
	
</script>
