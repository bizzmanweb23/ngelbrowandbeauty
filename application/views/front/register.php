
<!-- FORM AREA SECTION -->
<section class="clearfix formArea">
      <div class="container">
			<script type="text/javascript">
				<?php /* if($this->session->flashdata('msg')){ ?>
						toastr.success("<?php echo $this->session->flashdata('msg'); ?>");
				<?php } */?>
				</script>
				 <div class="messages"></div>
        <div class="row justify-content-center">

          <div class="col-md-6 col-lg-5 col-xl-4">
            <div class="panel panel-default formPart">
              <div class="panel-heading patternbg">Create an <span>account</span></div>
              <div class="panel-body">
			    <form method="post" action="<?php echo base_url() ?>/front/signup" class="registerform">
		
					<div class="form-group">
						<input class="form-control" type="text" name="first_name" value="" placeholder="Enter First Name" required/>
					</div>
					      
					<div class="form-group">
						<input class="form-control" type="text" name="last_name" value="" placeholder="Enter Last Name" required/>
					</div>
                
					<div class="form-group">
						<input class="form-control useremail" type="email" name="email" value="" placeholder="Enter Email" required/>
					</div>
					<span class="CheckEmailMatch"></span> 
					<div class="form-group">
						<input class="form-control usercontact" type="text" name="contact" value="" placeholder="Enter Mobile Number" required/>
					</div>
					<span class="CheckContactMatch"></span> 
					<div class="form-group">
						<input class="form-control password" type="password" name="password" value="" placeholder="Enter Password" required />
					</div>        
					<div class="form-group">
						<input class="form-control confirm_password" type="password" name="confirm_password" value="" placeholder="Confirm Password" required/>
                  	</div>
                  	<span class="CheckPasswordMatch"></span>
                  
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

		$(".useremail").keyup(function(e){
			e.preventDefault();
				var userEmail = $(this).val();

				$.ajax({
					url: "<?= base_url("uniqueEmail")?>",
					type: 'GET',
					data: {email: userEmail},
					success: function(response) {
						if(response > 0)
						{
							//alert("Enter Duplicate SRN");
							$(".CheckEmailMatch").html("Email already exists.You enter anther Email!").css("color", "red");
						}else{
							$(".CheckEmailMatch").html("");
						}
					}
				});
		});

		$(".usercontact").keyup(function(e){
			e.preventDefault();
				var usercontact = $(this).val();

				$.ajax({
					url: "<?= base_url("uniqueContact")?>",
					type: 'GET',
					data: {contact: usercontact},
					success: function(response) {
						if(response > 0)
						{
							//alert("Enter Duplicate SRN");
							$(".CheckContactMatch").html("Mobile number already exists.You enter anther Number!").css("color", "red");
						}else{
							$(".CheckContactMatch").html("");
						}
					}
				});
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
                success: function (data) 
					{
						//alert(data.msg);
						var messageText = data.msg;
						var alertBox = '<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'+messageText+'</div>';
							$('.messages').html(alertBox);
					}
            });
            return false;
        }
    });

  </script>
