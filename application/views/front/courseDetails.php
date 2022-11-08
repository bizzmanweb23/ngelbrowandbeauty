<section class="clearfix orderArea my-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12">
            
              <div class="panel panel-default cartInfo">
                <div class="panel-heading patternbg"><?= $courseData['course_name']; ?></div>
                <div class="panel-body tableArea mb-4 mb-lg-0">

					<!-- Main content -->
					<div class="row">
						<div class="col-lg-4">
							<!-- Customer Notes -->
							<div class="card mb-4">
								<div class="card-body">
									<h3 class="h6"><strong> Course Information</strong></h3>
									<div class="row pt-1">
										<div class="col-md-5">
											Course Fees
										</div>
										<div class="col-md-7">
											$<?= $courseData['course_fees']; ?>
										</div>
									</div>
									<div class="row pt-2">
										<div class="col-md-5">
											Durations
										</div>
										<div class="col-md-7">
											<?= $courseData['durations']; ?>
										</div>
									</div>
									<div class="row pt-2">
										<div class="col-md-5">
											Trainer
										</div>
										<div class="col-md-7">
											Vivian Kang
										</div>
									</div>
									
								</div>
							</div>
							<div class="card mb-4">
								<!-- Shipping information -->
								<div class="card-body">
									<h3 class="h6"><strong> Free Lesson</strong></h3>
									<p class="taxt-dark"><?= $courseData['free_lesson'] ?> </p>
									
									<h3 class="h6"><strong> Recomandation</strong></h3>
									<p class="text-dark"><?= $courseData['recomandation_fill'] ?></p>
								</div>
							</div>
							</div>
								<div class="col-lg-8">
									<!-- Details -->
									<div class="card mb-4">
										<div class="card-body">
											<div class="mb-3 d-flex justify-content-between">
												<h2 class="h5 me-3 px-3"><a href="#" class="text-muted"></a> Course Details</h2>
											</div>
											<div class="mb-3 d-flex justify-content-between">
												<div>
													<span class="me-3 px-3">Course Code:-&nbsp;&nbsp;<?= $courseData['course_code'] ?></span>
													
												</div>
												<div class="d-flex">
													<a href="<?= base_url('enrollCourse/'); ?><?= $courseData['id']; ?>" target="_blank"><button class="btn btn-info p-2 me-3 d-lg-block btn-icon-text"><span class="text">Enroll Now</span></button></a>
												</div>
											</div>
											<div class="mb-3 d-flex justify-content-between">
												<h2 class="h5 me-3 px-3"><a href="#" class="text-muted"></a> Course Details</h2>
											</div>
											<div class="col text-center">
												
													<img src="<?= base_url()?>/uploads/course_image/<?= $courseData['course_image']; ?>" width="250" height="100" class="img-thumbnail">	
												
											</div>
											<div class="mb-3 d-flex justify-content-between pt-3">
												
												<div class="d-flex">
													<?= $courseData['description']; ?>
												</div>
											</div>
											
											
										</div>
									</div>
									<!-- Payment -->
									<div class="card mb-4">
										<div class="card-body">
											<div class="row">
												
												<div class="col-lg-6">
													<h3 class="h6">Term's & Conditions</h3>
													<p class="taxt-dark">
														<?= $courseData['terms_conditonsDetails']; ?>
													</p>
												</div>
											</div>
										</div>
									</div>
								</div>
								
							</div>
                  
                </div>
              </div>
           
          </div>
        </div>
      </div>
    </section>
	<style>
.card {
    box-shadow: 0 30px 35px 0 rgb(0 0 0 / 5%);
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
    border-radius: 1rem;
}
.text-reset {
    --bs-text-opacity: 1;
    color: inherit!important;
}
/*a {
    color: #5465ff;
    text-decoration: none;
}*/
  </style>
