<div class="content-wrapper"  style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Course Management</h1>
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

			  	<h3>STUDENT REGISTRATION FORM</h3>

                <form id="add_package" action="<?= base_url('admin/courseManagement/post_add_course')?>" method="post" enctype="multipart/form-data">
			
			<table cellpadding = "10">
			
			<!----- First Name ---------------------------------------------------------->
			<tr>
			<td>FIRST NAME</td>
			<td><input type="text" class="form-control" name="first_name" placeholder="Enter Course Name" value="">(max 30 characters a-z and A-Z)
			</td>
			</tr>
			
			<!----- Last Name ---------------------------------------------------------->
			<tr>
			<td>LAST NAME</td>
			<td><input type="text" class="form-control" name="last_name" placeholder="Enter Course Name" value="">(max 30 characters a-z and A-Z)
			</td>
			</tr>
			
			<!----- Date Of Birth -------------------------------------------------------->
			<tr>
			<td>DATE OF BIRTH</td>
			<td>
			<input type="text" class="form-control" name="dob" placeholder="Enter Course Name" value="">
			</td>
			</tr>
			
			<!----- Email Id ---------------------------------------------------------->
			<tr>
			<td>EMAIL ID</td>
			<td><input type="email" class="form-control" name="email" placeholder="Enter Course Name" value=""></td>
			</tr>
			
			<!----- Mobile Number ---------------------------------------------------------->
			<tr>
			<td>MOBILE NUMBER</td>
			<td>
			<input type="text" class="form-control" name="mobile_number" placeholder="Enter Course Name" value="">
			(10 digit number)
			</td>
			</tr>
			
			<!----- Gender ----------------------------------------------------------->
			<tr>
			<td>GENDER</td>
			<td>
			Male <input type="radio" class="form-control" name="gender" value="Male">
			Female <input type="radio" class="form-control" name="gender" value="Female">
			Others <input type="radio" class="form-control" name="gender" value="Others">
			</td>
			</tr>
			
			<!----- Address ---------------------------------------------------------->
			<tr>
			<td>ADDRESS <br /><br /><br /></td>
			<td><textarea name="address" class="form-control" rows="4" cols="30"></textarea></td>
			</tr>
			
			<!----- City ---------------------------------------------------------->
			<tr>
			<td>CITY</td>
			<td><input type="text" class="form-control" name="city" placeholder="Enter Course Name" value="">
			</td>
			</tr>
			
			<!----- Pin Code ---------------------------------------------------------->
			<tr>
			<td>PIN CODE</td>
			<td><input type="number" class="form-control" name="pin_code" placeholder="Enter Course Name" value="">
			(6 digit number)
			</td>
			</tr>
			
			<!----- State ---------------------------------------------------------->
			<tr>
			<td>STATE</td>
			<td><input type="text" class="form-control" name="state" placeholder="Enter Course Name" value="">
			(max 30 characters a-z and A-Z)
			</td>
			</tr>
			
			<!----- Country ---------------------------------------------------------->
			<tr>
			<td>COUNTRY</td>
			<td><input type="text" class="form-control" name="country" placeholder="Enter Course Name" value=""></td>
			</tr>
			
			<!----- Qualification---------------------------------------------------------->
			<tr>
			<td>Last school/university attended</td>
			
			<td>
			<input type="text" class="form-control" name="last_university" placeholder="Enter Course Name" value="">
			</td>
			</tr>
			
			<!----- Course ---------------------------------------------------------->
			<tr>
			<td>COURSES<br />APPLIED FOR</td>
			<td>
			BCA
			<input type="radio" name="Course_BCA" value="BCA">
			B.Com
			<input type="radio" name="Course_BCom" value="B.Com">
			B.Sc
			<input type="radio" name="Course_BSc" value="B.Sc">
			B.A
			<input type="radio" name="Course_BA" value="B.A">
			</td>
			</tr>
			<tr>
				<td>
				<input type="checkbox" name="Course_BCA" value="BCA"> I accept the terms & conditons
				</td>
			</tr>
			
			<!----- Submit and Reset ------------------------------------------------->
			<tr>
			<td colspan="2" align="center">
			<input type="submit" value="Submit">
			<input type="reset" value="Reset">
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
 <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
<style>
	

</style>
<script>
	$(".chosen-select").chosen({
	no_results_text: "Oops, nothing found!"
	})
</script>
