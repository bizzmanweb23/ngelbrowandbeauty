
<!-- FORM AREA SECTION -->
<section class="clearfix formArea">
      <div class="container">
			<script type="text/javascript">
				<?php /* if($this->session->flashdata('msg')){ ?>
						toastr.success("<?php echo $this->session->flashdata('msg'); ?>");
				<?php } */ ?>
				</script>
				 <div class="messages"></div>
        <div class="row justify-content-center">

          <div class="col-md-6 col-lg-5 col-xl-4">
            <div class="panel panel-default formPart">
              <div class="panel-heading patternbg">Create an <span>account</span></div>
              <div class="panel-body">
			          <form method="post" action="<?php echo base_url() ?>/front/signup" class="registerform">
		
                  <div class="form-group">
					          <input class="form-control" type="text" name="first_name" value="" placeholder="Enter First Name" require/>
                  </div>
					          <?php if(form_error('email')){echo "<span style='color:red'>".form_error('email')."</span>";} ?>
                  <div class="form-group">
					          <input class="form-control" type="text" name="last_name" value="" placeholder="Enter Last Name" require/>
                  </div>
					          <?php if(form_error('last_name')){echo "<span style='color:red'>".form_error('last_name')."</span>";} ?>
                
                  <div class="form-group">
                    <input class="form-control" type="email" name="email" value="" placeholder="Enter Email" require/>
                  </div>
					        <?php if(form_error('email')){echo "<span style='color:red'>".form_error('email')."</span>";} ?>
                  <div class="form-group">
					          <input class="form-control" type="text" name="contact" value="" placeholder="Enter Mobile Number" require/>
                  </div>
					        <?php if(form_error('contact')){echo "<span style='color:red'>".form_error('contact')."</span>";} ?>
        
                  <div class="form-group">
					          <input class="form-control password" type="password" name="password" value="" placeholder="Enter Password" />
                  </div>
					          <?php if(form_error('password')){echo "<span style='color:red'>".form_error('password')."</span>";} ?>
					        <div class="form-group">
						        <input class="form-control confirm_password" type="password" name="confirm_password" value="" placeholder="Confirm Password" />
                  </div>
                  <span class="CheckPasswordMatch"></span>
                  <?php if(form_error('confirm_password')){echo "<span style='color:red'>".form_error('confirm_password')."</span>";} ?>

                  <button type="submit" class="btn btn-primary btn-block">Sign UP</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
	<script>
    $(document).ready(function() {
      $(".confirm_password").on('keyup', function() {

        var password = $(".password").val();
        var confirmPassword = $(".confirm_password").val();
		//alert(confirmPassword);
        if (password != confirmPassword)
          $(".CheckPasswordMatch").html("Password does not match !").css("color", "red");
        else
          $(".CheckPasswordMatch").html("Password match !").css("color", "green");
      });

    });

		$('.registerform').on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            var url = "<?php echo base_url() ?>/front/signup";

            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
								dataType: "json",
                success: function (data) {
									//alert('text');
                    /*var messageAlert = 'alert-' + data.type;*/
										/*$.each(data,function(key,value){
											var messageText = value.;
											alert(messageText);
										});*/

                    

                    var alertBox = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Please check your Mail for confirmation.</div>';
										$('.messages').html(alertBox);
                },
								error:function(data){
									var alertBox = '<div class="alert alert-warning alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Please check your Mail for confirmation.</div>';
										$('.messages').html(alertBox);
								}

            });
            return false;
        }
    });

  </script>
