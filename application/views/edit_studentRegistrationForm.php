<div class="content-wrapper"  >
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Student Management</h1>
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
              <div class="card-body"  style="overflow: auto; height: 600px ">

			  	<h3 class="heading" align="center">STUDENT REGISTRATION FORM</h3>

                <form id="add_package" action="<?= base_url('admin/courseManagement/post_edit_student')?>" method="post" enctype="multipart/form-data">
				<input type="hidden" class="form-control" name="student_id" value = "<?= $Student_registration['id'];?>">
			<table cellpadding = "10">
			<tr>
				<td>Photo</td>
				<td>
					<div class="col-md-6">
						<div class="circle">
							<img class="profile-pic img_profile" src="<?= base_url() ?>/uploads/student_img/<?= $Student_registration['student_photo'];?>" style="width:150px">
							<i class="fa fa-camera profile-pic-upload-button"></i>
						</div>
						<div class="p-image">
							<input class="file-upload" type="file" accept="image/*" name = "stu_picture" style="display:none">
						</div>
					</div>
				</td>
			</tr>
			<!----- First Name ---------------------------------------------------------->
			<tr>
			<td>FIRST NAME</td>
			<td><input type="text" class="form-control" name="first_name" placeholder="Enter First Name" value="<?= $Student_registration['first_name'];?>">
			</td>
			</tr>
			
			<!----- Last Name ---------------------------------------------------------->
			<tr>
			<td>LAST NAME</td>
			<td><input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" value="<?= $Student_registration['last_name'];?>">
			</td>
			</tr>
			
			<!----- Date Of Birth -------------------------------------------------------->
			<tr>
			<td>DATE OF BIRTH</td>
			<td>
				<input type="date" class="form-control" name="dob" value="<?= $Student_registration['dob'];?>">
			</td>
			</tr>
			
			<!----- Email Id ---------------------------------------------------------->
			<tr>
			<td>EMAIL ID</td>
			<td><input type="email" class="form-control" name="email" placeholder="Enter Email" value="<?= $Student_registration['email'];?>"></td>
			</tr>
			
			<!----- Mobile Number ---------------------------------------------------------->
			<tr>
			<td>MOBILE NUMBER</td>
			<td>
			<input type="text" class="form-control" name="mobile_number" placeholder="Enter Mobile Number" value="<?= $Student_registration['mobile_number'];?>">
			</td>
			</tr>
			
			<!----- Gender ----------------------------------------------------------->
			<tr>
			<td>GENDER</td>
			<td>
			Male <input type="radio" name="gender" value="Male" <?php if($Student_registration['gender'] == 'Male'){ echo 'checked';} ?>>
			Female <input type="radio" name="gender" value="Female" <?php if($Student_registration['gender'] == 'Female'){ echo 'checked';} ?>>
			</td>
			</tr>
			
			<!----- Address ---------------------------------------------------------->
			<tr>
			<td>ADDRESS <br /><br /><br /></td>
			<td><textarea name="address" class="form-control" rows="4" cols="30"><?= $Student_registration['address'];?></textarea></td>
			</tr>
			
			<!----- City ---------------------------------------------------------->
			<tr>
			<td>CITY</td>
			<td><input type="text" class="form-control" name="city" placeholder="Enter City" value="<?= $Student_registration['city'];?>">
			</td>
			</tr>
			
			<!----- Pin Code ---------------------------------------------------------->
			<tr>
			<td>PIN CODE</td>
			<td><input type="number" class="form-control" name="pin_code" placeholder="Enter Pin Code" value="<?= $Student_registration['pin_code'];?>">
			</td>
			</tr>
			
			<!----- State ---------------------------------------------------------->
			<tr>
			<td>STATE</td>
			<td><input type="text" class="form-control" name="state" placeholder="Enter State" value="<?= $Student_registration['state'];?>">
			</td>
			</tr>
			
			<!----- Country ---------------------------------------------------------->
			<tr>
			<td>COUNTRY</td>
			<td><input type="text" class="form-control" name="country" placeholder="Enter Country" value="<?= $Student_registration['country'];?>"></td>
			</tr>
			
			<!----- Qualification---------------------------------------------------------->
			<tr>
			<td>Last school/university attended</td>
			
			<td>
			<input type="text" class="form-control" name="last_university" placeholder="Enter Last school/university" value="<?= $Student_registration['last_university'];?>">
			</td>
			</tr>
			
			<!----- Course ---------------------------------------------------------->
			<tr>
			<td>Course Applied For</td>
			<td>
				<select  class="form-control chosen chosen-select-deselect" name="course_id">
					<option value="" hidden>Select Course</option>
					<?php foreach($all_courses as $coursesRow): ?>
					<option value="<?= $coursesRow['id']?>" <?php if($coursesRow['id'] == $Student_registration['course_id']){echo "Selected";} ?>><?= $coursesRow['course_name']?></option>
					<?php endforeach; ?> 
				</select>
			</td>
			</tr>
			
			<!----- Submit and Reset ------------------------------------------------->
			<tr>
			<td colspan="2" align="center">
			<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width:150px;">
			 <input type="reset" class="btn btn-primary btn-custom" value="reset" style="width:150px;">
			</td>
			</tr>
			</table>
			
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
	
	//for avtar
	$(document).ready(function() { 
		var readURL = function(input) {
					if (input.files && input.files[0]) {
							var reader = new FileReader();
							reader.onload = function (e) {
									$('.profile-pic').attr('src', e.target.result);
							}
							reader.readAsDataURL(input.files[0]);
					}
			}
			$(".file-upload").on('change', function(){
					readURL(this);
			});
			$(".profile-pic-upload-button").on('click', function() {
				$(".file-upload").click();
			});
	});
</script>
<style>
		
	.heading{
		background-color: #61d3d4;
		color: white;
		padding: 5px;
		text-align: left;
		border-radius: 10px;
		padding-left: 10px;
	}
		

	/* for avtar */
	.profile-pic {
		max-width: 500px;
		max-height: 500px;
		display: block;
		}

		.file-upload {
			display: none;
		}	
	.circle {
		top: 10px;
		background-color:#C8C8C8;
		overflow: hidden;
		border-radius: 4px;
  		padding: 5px;
		width: 100px;
    	height: 100px;
	}
	.img_profile {
		max-width: 100%;
		height: 100%;
	}
	.p-image {
	  position: absolute;
	  top: 95px;
	  right: 230px;
	  color: #666666;
	  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
	}
	.p-image:hover {
	  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
	}
	.profile-pic-upload-button {
	  font-size: 1.5em;
	  position: absolute;
	  top: 13%;
	}

	.profile-pic-upload-button:hover {
	  transition: all .3s cubic-bezier(.175, .885, .32, 1.275);
	  color: #999;
	}
	</style>
