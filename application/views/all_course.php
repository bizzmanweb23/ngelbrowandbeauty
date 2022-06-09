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
                	<a href="<?=base_url('admin/CourseManagement/add_Course')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add Course </button></a>
              	</div>
              <!-- /.card-header -->
              <div class="card-body">
			  <div class="site-table" style="overflow: auto; height: 400px ">
					<table class="table table-bordered" style="overflow: auto; width: 900px; height: 250px; text-align: center;">
					<thead style="background-color:#fff; color:#b8860b;position: sticky;top: 0;">
					<tr>
						<th>Course Name</th>
						<th>Durations</th>
						<th>Fees</th>
						<th>Description</th>
						<th>FOC Items</th>
						<th>Type Of Cert</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
						<?php foreach($all_courses as $courseRow): ?>
						<tr>
							<td><?= $courseRow['course_name']?></td>
							<td><?= $courseRow['durations']?></td>
							<td><?php if($courseRow['course_fees'] != ''){?>
								$<?= $courseRow['course_fees']?>
								<?php }else{

								} ?>
							</td>
							<td><?php if($courseRow['course_fees'] != ''){?>
								<?= substr($courseRow['description'],0,50);?>...
							<?php }else{}?>
							</td>
							
						
							<td><?= $courseRow['foc_items']?></td>
							<td><?= $courseRow['type_of_cert']?></td>
							<td>

								<a href="<?= base_url('admin/courseManagement/editCourse/'. $courseRow['id'])?>" class="btn btn-default" title="Edit" style="color:#b8860b"><i class="fa fa-edit"></i></a>
								<a href="<?= base_url('admin/courseManagement/deleteCourse/'. $courseRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a>
								

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

