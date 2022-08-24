<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leave Management</h1>
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
						<div class="col-md-6"><h4>Holidays List</h4></div>
						
							<div class="col-md-4">
								<form action="<?= base_url('admin/employeeManagement/download_empHoliday')?>" method="post" enctype="multipart/form-data">
									<div class="row">
										
										<div class="col-md-6">
										<select name = "getyear" class="form-control getyear" required>
											<option value="">Select Year</option> 
											<?php
												$curyear = (int)date("Y");
												for($i=1990; $i<= $curyear; $i++){?>
												<option value="<?php echo $i;?>"><?php echo $i;?></option>  
											<?php } ?>
										</select>
										</div>
										<div class="col-md-6">
											<input type="submit" class="btn btn-primary btn-custom" value="Download Holidays">
										</div>
									
									</div>
								</form>
							</div>
							
						<div class="col-md-2">
            				<a href="<?=base_url('admin/employeeManagement/add_holidays')?>"><button type="button" class="btn btn-block btn-primary btn-custom" style=" float: right;">Add New </button></a>
						</div>
					</div>

              	</div>
              <!-- /.card-header -->
              <div class="card-body">
			  	
                 <div class="site-table" style="overflow: auto; height: 400px ">
                <table class="table table-bordered" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
                  <thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
                  <tr>
					<th>Year</th>
                    <th>Date</th>
                    <th>Day</th>
					<th>Holiday Name</th>
					<th>Action</th>
                  </tr>
                  </thead>
                  <tbody class="displayHolidayList">
                    <?php foreach($emp_holidays as $emp_holidaysRow): ?>
                      <tr>
							<td><?= $emp_holidaysRow['year'] ?></td>
                        	<td><?= $emp_holidaysRow['date']?></td>
							<td><?= $emp_holidaysRow['day'] ?></td>
							<td><?= $emp_holidaysRow['holidays'] ?></td>
                        	<td>
								<a data-holidays_Id="<?=  $emp_holidaysRow['id'];?>"
								data-year="<?=  $emp_holidaysRow['year'];?>"
								data-date="<?=  $emp_holidaysRow['date'];?>" 
								data-day="<?=  $emp_holidaysRow['day'];?>"
								data-holidays ="<?=  $emp_holidaysRow['holidays'];?>" href="javascript:void(0);" class="btn btn-default editholidays_data" title="Edit" style="color:#61d3d4" ><i class="fa fa-edit" aria-hidden="true"></i></a>
								<a href="<?= base_url('admin/employeeManagement/deleteEmpHoliday/'. $emp_holidaysRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a>
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
 <div id="editholidays_dataModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Holiday</h5>
                    <button type="button" class="close close_btn" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
					<form action="<?php echo base_url(); ?>admin/employeeManagement/post_edit_empHoliday" method="post" enctype="multipart/form-data">
						<input name="setholidays_Id" type="hidden" class="modal_setholidays_Id form-control" value=""/>
									
						<div class="row p-2">
							<div class="col-md-3">Year Of Holiday</div>
							<div class="col-md-6"><input type="text" name = "holidayyear" class="form-control modal_set_Holidayyear" readonly></div>
						</div>
						<table width="100%">
							<tr>
								<td>Date</td>
								<td><input type="date" name = "holidayDate" value="" onchange="myholidayDay()" class="form-control modal_set_HolidayDate"></td>
								<td>Day</td>
								<td><input type="text" name = "holidayDay" value="" class="form-control modal_set_holidayDay"></td>
								<td>Holiday Name</td>
								<td><input type="text" name = "holidayName" value="" class="form-control modal_set_holidayName"></td>
							</tr>
						</table>

						<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
					</form>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        $(".editholidays_data").click(function(){
          $("#editholidays_dataModal").modal('show');
					let setholidays_Id = $(this).attr('data-holidays_Id');
					let set_Holidayyear = $(this).attr('data-year');
					let set_HolidayDate = $(this).attr('data-date');
					let set_holidayDay = $(this).attr('data-day');
					let set_holidayName = $(this).attr('data-holidays');
     				$("#editholidays_dataModal .modal_setholidays_Id").val( setholidays_Id );
					 	$("#editholidays_dataModal .modal_set_Holidayyear").val( set_Holidayyear );
					 	$("#editholidays_dataModal .modal_set_HolidayDate").val( set_HolidayDate );
					 	$("#editholidays_dataModal .modal_set_holidayDay").val( set_holidayDay );
					 	$("#editholidays_dataModal .modal_set_holidayName").val( set_holidayName );
        });
				$(".close_btn").click(function(){
						$("#editholidays_dataModal").modal("hide"); 
						
        });

		$(".getyear").change(function() {			
			var holidayYear = $(this).val();
		
			/*if (group_name == "") {
					$(".displaySearch").html("");
			}*/
			//else {	
				$.ajax({	
						type: "POST",	
						url: "<?= base_url("admin/employeeManagement/searchHolidayYearData")?>",
						data: { holidayYear: holidayYear },
						success: function(data) {		
							$(".displayHolidayList").html(data);
						}
				});
			//}
		});

		
    });
	function myholidayDay(){
		let holidayDate = $(".modal_set_HolidayDate").val(); 
		const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
		let date = new Date(holidayDate);
		let year = date.getFullYear();
		let month = date.getMonth()+1;
		let day = days[date.getDay()];
		//alert(day);
		$(".modal_set_holidayDay").val(day);
	}
	
</script>
