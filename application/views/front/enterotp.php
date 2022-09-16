<!-- FORM AREA SECTION -->
<section class="clearfix formArea">
	<div class="container">
	<?php $message = $this->session->flashdata('msg');
		if(isset($message) && $message != '') { ?>
		<!--script>
			toastr.success('<?php echo $this->session->flashdata('msg'); ?>');
		</script-->
		
		<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><?php echo $this->session->flashdata('msg'); ?></div>
	<?php }else{ ?>
		<!--script>
			toastr.success('Verify OTP');
		</script-->
		<div class="alert alert-success alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Verify OTP</div>
	<?php } ?>
		
	<div class="row justify-content-center">
		<div class="col-md-6 col-lg-5 col-xl-4">
		<div class="panel panel-default formPart">
			<div class="panel-heading patternbg">Verify <span>OTP</span></div>
			<div class="panel-body">
				<form method="post" action="<?php echo base_url() ?>/front/home/add_post_otp"">
	
				<div class="form-group">
					<input class="form-control" type="text" name="otp" value="" placeholder="Enter OTP" require/>
				</div>

				<button type="submit" class="btn btn-primary btn-block">Submit</button>
			</form>
			</div>
		</div>
		</div>
	</div>
	</div>
</section>
