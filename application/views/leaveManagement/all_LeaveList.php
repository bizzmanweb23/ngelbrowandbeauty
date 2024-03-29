<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1> Leave Management</h1>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card" style="border-radius: 15px;height: 40rem;">
              <div class="card-header">
                <!--<a href="<?=base_url('admin/employeeManagement/add_employeeleave')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add Employee Leave </button></a>-->
				<h2>Employee's Leave List</h2>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
			  
                <div class="site-table" style = "overflow: auto; height: 400px">
                <table class="table table-bordered" id = "salary_table" style="overflow: auto; width: 100%; height: 230px; text-align: center;">
					<thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
						<tr>
							<th>Employee Name </th>
							<th>Leave From</th>
							<th>Leave To</th>
							<th>Total Leave Days</th>
							<th>Reason For leave</th>
							<th>Available Leave</th>
							<th>Yearly Leave</th>
							<th>Medical Certificate</th>
							<th>Response</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($employee_leave as $employee_leaveRow): ?>
						<tr>
							<td><?= $employee_leaveRow['first_name'].' '.$employee_leaveRow['last_name']?></td>	
							<td><?= date("d-m-Y", strtotime($employee_leaveRow['leave_from']));?></td>
							<td><?= date("d-m-Y", strtotime($employee_leaveRow['leave_to']))?></td>
							<td><?= $employee_leaveRow['total_leave_days']?></td>
							<td><?= $employee_leaveRow['reason_for_leave']?></td>
							<td><?= $employee_leaveRow['available_leave']?></td>
							<td><?= $employee_leaveRow['yearly_leave']?></td>
							<td>
								<?php if($employee_leaveRow['MC_files'] != ''){ ?>
									<a href="<?= base_url('uploads/MC_image/'.$employee_leaveRow['MC_files']) ?>" target="_blank" title="MC"><img src="<?= base_url('uploads/MC_image/'.$employee_leaveRow['MC_files']) ?>" width="40" height="40"></a>
								<?php }else{}  ?>
							</td>
							<td>
								<?php if($employee_leaveRow['status'] == 0){ ?>
										<span class="btn btn-secondary" style="box-shadow:none !important; text-transform:uppercase;">Leave Pending</span>
								<?php }elseif($employee_leaveRow['status'] == 1) { ?>
									<span class="btn btn-success" style="box-shadow:none !important; text-transform:uppercase;">Approved</span>
								<?php }else{ ?>
									<span class="btn btn-danger" style="box-shadow:none !important; text-transform:uppercase;">Not Approved</span>
								<?php } ?>
							</td>
							<td>
								<!--<a href="<?= base_url('admin/employeeManagement/edit_employeeLeave/'.$employee_leaveRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#61d3d4"><i class="fa fa-edit"></i></a>-->
								<a data-leave_id="<?=  $employee_leaveRow['id'] ?>" href="javascript:void(0);" Class = "btn btn-default leaveStatus" title="Edit" style="color:#61d3d4"><i class="fa fa-edit"></i></a>
								<a href="<?= base_url('admin/employeeManagement/deleteEmployeeLeave/'. $employee_leaveRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a>
							</td>
						</tr>
						<?php endforeach; ?>
					</tbody>
                </table>
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

 <div id="leaveStatusModel" class="modal fade" tabindex="-1">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Leave Response</h5>
				<button type="button" class="close close_btn" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-body">
				<form id="add_category" action="<?= base_url('admin/employeeManagement/update_Leavestatus')?>" method="post" enctype="multipart/form-data">   
					<input type="hidden" class="status_leaveid" name = "status_leaveid" value="">
						<div class="row">     
							<div class="col-md-12">                       
								<div class="form-group">
									<select  class="form-control chosen chosen-select" name="status" id="status">
										<option value="">Select Response Option</option>
										<option value="1">Approved</option>
										<option value="2">Not Approved</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">    
							<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width:130px;"> 
						</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>


<link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/ajax_datatables/css/jquery.dataTables.css"> 
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/assets/plugins/ajax_datatables/js/ajax-jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/assets/plugins/ajax_datatables/js/ajax-jquery.dataTables.min.js"></script>
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

	$(document).ready(function(){  	
  	
		$(".leaveStatus").click(function(){
          $("#leaveStatusModel").modal('show');
		  	var leaveID = $(this).data('leave_id');
			$('.status_leaveid').val(leaveID);	
        });
			$(".close_btn").click(function(){
			$("#leaveStatusModel").modal("hide"); 
						
        });

	});
	
</script>
