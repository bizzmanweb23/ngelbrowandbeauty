<div class="content-wrapper" style="margin-left: 270px;">
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
              <div class="card-header">
							<a href="<?=base_url('admin/courseManagement/add_studentRegistrationForm')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add Student</button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="site-table" style="overflow: auto; height: 400px ">
                <table class="table table-bordered" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
                  <thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
                  <tr>
                    <th>Student Number </th>
                    <th> Name</th>
										<th>Photo</th>
										<th>Date Of birth</th>
										<th>E-mail</th>
                    <th>Contact No.</th>
                    <th>Gender</th>
										<th>Address</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($Student_registration as $Student_registrationRow): ?>
                      <tr>
													<td><?= $Student_registrationRow['student_code']?></td>
													<td><?= $Student_registrationRow['first_name'].' '.$Student_registrationRow['last_name']?></td>	
													<td><img src="<?= base_url('uploads/student_img/'.$Student_registrationRow['photo'])?>" width="50" height="50"></td>
													<td><?= $Student_registrationRow['dob']?></td>
													<td><?= $Student_registrationRow['email']?></td>
													<td><?= $Student_registrationRow['mobile_number']?></td>
													<td><?= $Student_registrationRow['gender']?></td>
													<td><?= $Student_registrationRow['address']?></td>
                        <td>
													<?php /*
													<a href="<?= base_url('admin/courseManagement/empArchive/'.$allCoursesRow['id'])?>" onclick="return confirm('Are you sure you want to Archive this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-user-times" aria-hidden="true"></i></a>*/ ?>
													<a href="<?= base_url('admin/courseManagement/view_studentRegistrationForm/'.$Student_registrationRow['id'])?>" class="btn btn-default" target="_blank" title="View" style="color:#61d3d4"><i class="fa fa-eye" aria-hidden="true"></i></a>
													<a href="<?= base_url('admin/courseManagement/edit_studentRegistrationForm/'. $Student_registrationRow['id'])?>" class="btn btn-default" title="Edit" style="color:#61d3d4"><i class="fa fa-edit"></i></a>
													<a href="<?= base_url('admin/courseManagement/deleteStudent/'. $Student_registrationRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a>
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

<style>

body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
</style>
