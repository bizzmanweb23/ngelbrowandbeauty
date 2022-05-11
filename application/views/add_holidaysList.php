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
              
              <!-- /.card-header -->
              <div class="card-body">
                <form id="add_promotion" action="<?= base_url('admin/employeeManagement/post_add_empHoliday')?>" method="post" enctype="multipart/form-data">
				<h3> Add Employee Holidays</h3>
					<div id="personal-details">
						<div class="row p-3" >
							<div class="col-md-4">   
								<h6 class="col-sm-12">Holiday Year</h6>
							</div>
							<div class="col-md-4">   
								<select name = "getyear" class="form-control">
									<option>Select Year</option> 
									<?php  $lasttenYear = (int)date("Y") - 20;
										$curyear = (int)date("Y");
										for($i=$lasttenYear; $i<= $curyear; $i++){?>
										<option value="<?php echo $i;?>"><?php echo $i;?></option>  
									<?php } ?>
								</select>
							</div>
						</div>
					</div>
					
					
					<!-- Educational Qualification -->
					<div id="holiday-tab">	
						<div class="row p-2" >
							<div class="col-md-4">   
								<h6 class="col-sm-12">Date</h6>
							</div>
							<div class="col-md-4">
								<h6 class="col-sm-12">Day</h6>
							</div>
							<div class="col-md-4">
								<h6 class="col-sm-12">Holidays</h6>
							</div>
						</div>
						<div class="showAddMoreHoliday_text">
						</div>
						<br>
						
						<button type="button" value="Add More Qualification" class="btn btn-primary btn-custom AddMoreQualification">Add More Holidays</button>
						<br>
						
					</div>
					<div class="text-center">
						<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
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
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		var count = 1;
		$('.AddMoreQualification').click(function() {
		count++;
		
		var holiday_text =' <table width="100%"><tr><td><input type="date" name="holidayDate[]" onchange="myholidayDay('+count+')" class="form-control holidayDate_'+count+'"></td><td><input type="text" name="holidayDay[]" class="form-control showholidayDay_'+count+ '"></td><td><input type="text" name="holidays[]" class="form-control" ></td></tr></table>';

		  $('.showAddMoreHoliday_text').append(holiday_text);
		 
		});
		var holiday_text =' <table width="100%"><tr><td><input type="date" name="holidayDate[]" onchange="myholidayDay('+1+') " class="form-control holidayDate_1" ></td><td><input type="text" name="holidayDay[]" class="form-control showholidayDay_1"></td><td><input type="text" name="holidays[]" class="form-control" ></td></tr></table>';
		$('.showAddMoreHoliday_text').append(holiday_text);
		
		function myholidayDay(count){
			let holidayDate = $(".holidayDate_"+count).val(); 
			const days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
			let date = new Date(holidayDate);
			let year = date.getFullYear();
			let month = date.getMonth()+1;
			let day = days[date.getDay()];
			//alert(day);
			$(".showholidayDay_"+count).val(day);
		}
	</script>
	<style>
		
		h3{
			background-color: #b8860b;
			color: white;
			padding: 5px;
			text-align: left;
			border-radius: 5px;
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

	
	