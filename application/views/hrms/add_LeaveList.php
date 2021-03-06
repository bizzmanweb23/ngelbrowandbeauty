<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Employee Leave</h1>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card" style="border-radius: 15px;">
              <!-- /.card-header -->
              <div class="card-body">
                <form id="add_category" action="<?= base_url('hrms/employeeManagement/post_add_empLeave')?>" method="post" enctype="multipart/form-data">   
					<!--<div class="row">
						<div class="col-md-12">             
							<div class="form-group ">
								<label for="name" class="col-sm-6 control-label">Employee Name <i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<select name="employeeName" class="form-control SelempName">
										<option>Select Employee Name</option>
										<?php foreach($allemployees as $allemployeesnRow): ?>
										<option value="<?= $allemployeesnRow['id']?>"><?= $allemployeesnRow['first_name'].' '.$allemployeesnRow['last_name']?></option>
										<?php endforeach; ?> 
									</select>
								</div>
							</div>
						</div>
					</div>-->

					<div class="row">     
						<div class="col-md-6">                       
							<div class="form-group ">
								<label for="status" class="col-sm-6 control-label">Leave From
								<i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<input type="date" class="form-control leave_from" name="leave_from" value="" onchange="leaveDay_count();">
									<small class="info help-block">
									</small>
								</div>
							</div>
						</div>  

						<div class="col-md-6">                       
							<div class="form-group ">
								<label for="status" class="col-sm-6 control-label">Leave To 
								<i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<input type="date" class="form-control leave_to" name="leave_to" value="" onchange="leaveDay_count();">
								</div>
							</div>
						</div>  
					</div> 
					<div class="row">     
						<div class="col-md-6">                       
							<div class="form-group ">
								<label for="status" class="col-sm-6 control-label">Number of Day</label>
								<div class="col-sm-12">
									<input type="text" class="form-control total_leave_days" name="total_leave_days" value="" readonly>
									<small class="info help-block">
									</small>
								</div>
							</div>
						</div>  

						<div class="col-md-6">                       
							<div class="form-group ">
								<label for="status" class="col-sm-6 control-label">Available leave
								<i class="required">*</i>
								</label>
								<div class="col-sm-12">
									
									<input type="text" class="form-control" name="available_leave" value="<?= $availableleaveRow['available_leave'] ?>" readonly>
								</div>
							</div>
						</div>  
					</div> 
					<div class="row">
						<div class="col-md-12">                       
							<div class="form-group ">
								<label for="status" class="col-sm-6 control-label">Reason For leave 
								<i class="required">*</i>
								</label>
								<div class="col-sm-12">
									<textarea id="reason_for_leave" name="reason_for_leave" rows="5" cols="80" placeholder="Reason For leave" style = "width: 100%;" ></textarea>
								</div>
							</div>
						</div>  
					</div> 

                    <input type="submit" class="btn btn-primary btn-custom" value="submit" style="width:150px;">
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet"/>


 
<script>
	$(document).ready(function(){
		// Initialize select2
		$(".SelempName").select2();
	});
	function leaveDay_count(){
		let leave_from = $(".leave_from").val(); 
		let leave_to = $(".leave_to").val(); 
		let leave_from_date = new Date(leave_from); 
		let leave_to_date = new Date(leave_to); 
  
		let diff = leave_to_date.getTime() - leave_from_date.getTime(); 
  
		let daydiff = diff / (1000 * 60 * 60 * 24)+1; 
		if(leave_to != ''){
			$(".total_leave_days").val(daydiff);
		}
		
		//alert(daydiff);
	}


</script>
