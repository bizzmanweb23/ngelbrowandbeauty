
<!-- FORM AREA SECTION -->
    <section class="clearfix formArea">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">
            <div class="panel panel-default formPart">
              <div class="panel-heading patternbg">log in your <span>account</span></div>
              <div class="panel-body">
                <form method="post" action="<?php echo base_url() ?>front/login" id="login-form" >
                  <div class="form-group">
                    <!--<i class="fa fa-envelope" aria-hidden="true"></i>-->
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email/Mobile Number" required>
                  </div>

                  <div class="form-group">
									<input type="password" class="form-control input100" name="password" id="logPwd" placeholder="Enter Password" required>
										<span class="fa fa-fw fa-eye field-icon" onclick="showPassword()"></span>
						
                  </div>

                  <div class="checkbox form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck0">
                    <label class="form-check-label" for="defaultCheck0">Remember me</label>
                  </div>

                  <button type="submit" class="btn btn-primary btn-block">Log In</button>
									<div class="row my-2">
										<div class="col-md-12">
											<h6>Don't have an account? <a href="<?php echo base_url('signup') ?>">Sign UP </a></h6>
										</div>
									</div>
                </form>
              </div>
            </div>
          </div>

          
        </div>
      </div>
    </section>
<style>
	.field-icon {
  float: right;
  margin-left: -25px;
  margin-top: -25px;
  position: relative;
  z-index: 2;
}

</style>
<script>

function showPassword() {
  var passwordVal = document.getElementById("logPwd");
  if (passwordVal.type === "password") {
    passwordVal.type = "text";
  } else {
    passwordVal.type = "password";
  }
}
</script>
