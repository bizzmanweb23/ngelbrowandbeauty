<!-- FORM AREA SECTION -->
<section class="clearfix formArea">
	<div class="container">
		<script>
			toastr.success('Please check your Mail for confirmation');
		</script>
	<div class="row justify-content-center">
		<div class="col-md-6 col-lg-5 col-xl-4">
		<div class="panel panel-default formPart">
			<div class="panel-heading patternbg">Create an <span>account</span></div>
			<div class="panel-body">
				<form method="post" action="<?php echo base_url() ?>/front/signup" id="login-form">
	
				<div class="form-group">
					<input class="form-control" type="text" name="first_name" value="" placeholder="Enter OTP" require/>
				</div>

				<button type="submit" class="btn btn-primary btn-block">Submit</button>
			</form>
			</div>
		</div>
		</div>
	</div>
	</div>
</section>
