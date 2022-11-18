<section class="vh-100">
  <div class="container py-4 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100 text-center">
      <div class="col-8">
	  	<div class="modal-body text-start text-black p-4">
                <h5 class="modal-title text-uppercase mb-5" id="exampleModalLabel"><img alt="robot picture" class="" height="155" src="<?= site_url('/assets/front/img/logo.png'); ?>" width="155"></h5>
                <h4 class="mb-5" style="color: #63d4d6;">Thanks for your order</h4>
                <p class="mb-0" style="color: #000;">Payment summary</p>
                <hr class="mt-2 mb-4"
                  style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">

                <div class="d-flex justify-content-between">
                  <span class="font-weight-bold mb-0">Service name</span>
                  <span class="mb-0" style="color: #63d4d6;"><?= $serviceOrderDetails['service_name']; ?></span>
                </div>

                <div class="d-flex justify-content-between pt-2">
                  <span class="font-weight-bold mb-0">Service Type</span>
                 	 <span class="mb-0" style="color: #63d4d6;">
						<?php if($serviceOrderDetails['times_packages'] == 1){ ?>
							One Time session
						<?php }else{ ?>
						Package
						<?php } ?>
					</span>
                </div>

                <div class="d-flex justify-content-between pt-2">
                  <span class="font-weight-bold">Price</span>
                  <h4 class="font-weight-bold" style="color: #63d4d6;">$<?= $serviceOrderDetails['service_price']; ?></h4>
                </div>

              </div>
              <div class="modal-footer d-flex justify-content-center border-top-0 py-4">
								<a href="<?= base_url('appointmentList')?>" class="btn btn-primary first-btn px-2" target="_blank">Go to Booking page</a>
              </div>

      </div>
    </div>
  </div>
</section>
