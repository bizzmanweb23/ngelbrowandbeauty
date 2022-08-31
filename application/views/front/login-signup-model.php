<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header text-center">
        <img src="<?= base_url(); ?>/assets/front/img/logo.png" alt="" class="img-fluid text-center" style="width: 150px; margin: 0 auto;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <!--<h3 class="text-center">Login</h3>-->
        <!-- Nav tabs -->
          <ul class="nav nav-tabs nav-justified justify-content-center container-fluid" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#home">LOGIN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#menu1">SIGNUP</a>
            </li>

          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
            <div id="home" class="container tab-pane active"><br>
              <h3></h3>
              <form method="post" action="<?php echo base_url() ?>/front/login" id="login-form">
              <div class="row my-3">
                  <div class="col-md-12">
                    <input type="email" name="email" id="" class="form-control mb-2" placeholder="Enter Email"> 
                  </div>
              </div>
              <div class="row my-3">
                  <div class="col-md-12">
                    <input type="password" name="password" id="" class="form-control" placeholder="Enter Password">
                  </div>
              </div>
               <button class="btn btn-primary btn-block mt-4 mb-5 login-btn">LOGIN</button>
              </form>
            </div>
            <div id="menu1" class="container tab-pane fade"><br>
              <h3></h3>
              <form method="post" action="<?php echo base_url()?>/front/signup" id="signup-form">
                <div class="row">
                  <div class="col-md-6">
										<input class="form-control" type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" placeholder="Enter First Name" />
                  </div>
									<?php if(form_error('email')){echo "<span style='color:red'>".form_error('email')."</span>";} ?>
                  <div class="col-md-6">
										<input class="form-control" type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" placeholder="Enter Last Name" />
                  </div>
									<?php if(form_error('last_name')){echo "<span style='color:red'>".form_error('last_name')."</span>";} ?>
                </div>
                
                <div class="row my-3">
                  <div class="col-md-12">
									<input class="form-control" type="email" name="email" value="<?php echo set_value('email'); ?>" placeholder="Enter Email" />
                  </div>
									<?php if(form_error('email')){echo "<span style='color:red'>".form_error('email')."</span>";} ?>
                </div>
								<div class="row my-3">
                  <div class="col-md-12">
									<input class="form-control" type="text" name="contact" value="<?php echo set_value('email'); ?>" placeholder="Enter Mobile Number" pattern="[7-9]{1}[0-9]{9}" />
                  </div>
                </div>
								<?php if(form_error('contact')){echo "<span style='color:red'>".form_error('contact')."</span>";} ?>
                <div class="row my-3">
                  <div class="col-md-6">
										<input class="form-control" type="password" name="password" value="<?php echo set_value('password'); ?>" placeholder="Enter Password" />
                  </div>
									<?php if(form_error('password')){echo "<span style='color:red'>".form_error('password')."</span>";} ?>
									<div class="col-md-6">
										<input class="form-control" type="password" name="confirm_password" value="<?php echo set_value('confirm_password'); ?>" placeholder="Confirm Password" />
                  </div>
									<?php if(form_error('confirm_password')){echo "<span style='color:red'>".form_error('confirm_password')."</span>";} ?>
                </div>
                <div class="row  my-3">
                  <div class="col-md-12">
                    <input type="text" name="referal_code" class="form-control" placeholder="Enter Referal Code">
                  </div>
                </div>
                <button class="btn btn-primary btn-block mt-4 mb-5 signup-btn">SIGNUP</button>
            </form>
            </div>
          </div>

      
      </div>

    </div>
  </div>
</div>
<script type="text/javascript">
	$(function(){
		alert();
	});
</script>
