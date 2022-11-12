<!-- HEADER -->
    <style>
			.blogPost {
					margin-bottom: 100px;
					margin: auto;
					width: 75%;
			}
		</style>
    <!-- PAGE TITLE SECTION -->
     <section class="clearfix pageTitleArea" style="background-image: url(assets/front/img/blog/Course.png);">
        <div class="container">
          <h1>Courses<h1>
        </div>
    </section>
<!-- CHECK OUT SECTION -->
    <section class="container-fluid clearfix padding blog blog-fullwidth text">
      <div class="container">
        <div class="row">
				<?php foreach($allcourse as $course_row): ?>
          <div class="col">
            <div class="blogPost">
              <img src="<?= base_url(); ?>uploads/course_image/<?= $course_row['course_image'] ?>" data-src="<?= base_url(); ?>uploads/course_image/<?= $course_row['course_image'] ?>" class="mx-auto rounded">
              <h3><?= $course_row['course_name'] ?></h3>
							<?php $description = substr($course_row['description'],0,200); ?>
              <p class="text-justify" style="color: #000;"><?php if($course_row['description'] != ''){ ?>
								<?= $description; ?>...
							<?php }else{} ?>
							</p>
							<div class="row">
								<div class="col-md-6">
										<p style="color: #000;"><?php if($course_row['course_fees'] != ''){ ?><h2 class="align-middle" style="color: #63d4d6;">S$&nbsp;<?= $course_row['course_fees'] ?></h2><?php }else{} ?></p>
								</div>

							</div>
              <!--<a href="<?= base_url(); ?>enrollCourse/<?= $course_row['id'] ?>" class="btn btn-primary first-btn px-2">Enroll now</a>-->
							<a href="<?= base_url(); ?>courseDetails/<?= $course_row['id'] ?>" class="btn btn-primary first-btn px-2">Course Details</a>
            </div>
          </div>
          <?php	endforeach; ?>
        </div>

       
      

      </div>
    </section>

<!--enroll modal-->
<!--<div id="appoinmentModal" class="modal fade modalCommon" role="dialog" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title appointment-modal-title">Course name</h4>
      </div>
      <div class="modal-body">
      <div id="appointment-alert" class="my-alert"></div>
      <form action="#" method="post" id="appoinmentModalForm">
          <div class="form-group categoryTitle">
            <h5>Personal Information</h5>
          </div>
					<div class="row mb-2">
						<div class="col-md-12">
							<input type="text" name="" class="form-control" placeholder="Full name" required="" autocomplete="off">
						</div>
					</div>
          <div class="dateSelect form-half form-left">
						<label>Date Of Birth</label><br>
            <div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
						
              <input type="text" name="appointment-form-date" class="form-control" placeholder="MM/DD/YYYY">
              <div class="input-group-addon">
                <span class="fa fa-calendar"></span>
              </div>
            </div>
          </div>

          <div class="timeSelect appointment-timeSelect form-half clearfix">
					<label>Gender</label><br>
						<div class="row">
							<div class="col-md-2">
								<div class="radio-inline">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="" value="">
                      <label class="form-check-label">
                        Male
                      </label>
                    </div>
                  </div>
							</div>
							<div class="col-md-2">
								<div class="radio-inline ">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="" value="">
                      <label class="form-check-label">
                        Female
                      </label>
                    </div>
                  </div>
							</div>
					</div>
          </div>
					<div class="row mb-2">
						<div class="col-md-12">
							<input type="text" name="" class="form-control" placeholder="NRIC / ID Card No." required="" autocomplete="off">
						</div>
					</div>

					<div class="form-group form-half form-left mt-3">
            <input type="text" name="appointment-form-phone" class="form-control" placeholder="Phone number" required="">
          </div>
					<div class="form-group form-half form-right  mt-3">
            <input type="text" name="appointment-form-phone" class="form-control" placeholder="Email" required="">
          </div>
					<div class="row mb-2">
						<div class="col-md-12">
								<input type="text" name="appointment-form-phone" class="form-control" placeholder="Address" required="">
						</div>
					</div>

          <div class="form-group categoryTitle mt-4">
            <h5>Class Information</h5>
          </div>

          <div class="form-group">
            <input type="text" name="appointment-form-full-name" class="form-control" placeholder="Course Name" required>
          </div>

<div class="clearfix"></div>
					<div class=" form-left">
					<label>Class Time</label><br>
						<div class="row">
							<div class="col-md-4">
								<div class="radio-inline">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="" value="">
                      <label class="form-check-label">4 Lesson per week</label>
                    </div>
                  </div>
							</div>
							<div class="col-md-5">
								<div class="radio-inline ">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="exampleRadios" id="" value="">
                      <label class="form-check-label">Optional</label>
                    </div>
                  </div>
							</div>
					</div>
          </div><br>
					<div class="clearfix">

					</div>
					<div class="form-group">
            <input type="text" name="appointment-form-full-name" class="form-control" placeholder="Course Fees" required>
          </div>
					<div class="form-group">
						<select name="cars" id="cars" style="width: 100%;" class=" px-2 py-2">
							<option value="volvo">Volvo</option>
							<option value="saab">Saab</option>
							<option value="mercedes">Mercedes</option>
							<option value="audi">Audi</option>
						</select>
          </div>
					<ol>
						<li>Please be on time and do not be late for class without any valid reason(s).</li>
						<li>Kindly inform your lecturer beforehand to seek for leave if you are unable to attend class.</li>
						<li>We are not responsible to rearrange for any absent classes without any valid reason(s).</li>
						<li>Please keep your official receipt as an acknowledgement reference for your course payment.</li>
						<li>There will be no refund or return of any registration fees and the seat will only be reserved for three months for any student unable to attend the course in schedule.</li>
					</ol>

          <div class="form-group">
            <button type="submit" id="appointment-submit-btn" class="btn btn-primary first-btn">Submit Now</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>-->


