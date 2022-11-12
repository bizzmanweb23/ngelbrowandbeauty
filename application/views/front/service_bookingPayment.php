<div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card p-3">
                    <h5 class="mb-0 fw-bold h4">Payment Methods</h5>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-3">
                    <div class="card-body border p-0">
                        <p>
                            <a class="btn btn-primary p-3 w-100 h-100 d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                aria-controls="collapseExample">
                                <span class="fw-bold">Pay Now</span>
                                <span class="">
                                    <span class="fab fa-cc-amex"></span>
                                    <span class="fab fa-cc-mastercard"></span>
                                    <span class="fab fa-cc-discover"></span>
                                </span>
                            </a>
                        </p>
                        <div class="collapse show p-3 pt-0" id="collapseExample">
                            <div class="row">
                                <div class="col-md-6 mb-lg-0 mb-2">
                                    <p style="color: #000;" class="h4 mb-0">Summary</p>
                                    <p style="color: #000;" class="mb-0 pt-3 h6">
									<span class="font-weight-bold">Product:</span><span style="color: #63d4d6;"> <?= $serviceOrderDetails['service_name']; ?></span>
                                    </p>
                                    <p style="color: #000;" class="mb-0 pt-3 h6">
                                        <span class="font-weight-bold">Price:</span>
                                        <span style="color: #63d4d6;">S$<?= $serviceOrderDetails['service_price']; ?></span>
                                    </p>
                                    <p style="color: #000;" class="mb-0 pt-3 h6"> <span class="font-weight-bold">Service Type:</span>
                                        <span style="color: #63d4d6;">Package</span>
									</p>
                                </div>
                                <div class="col-md-4 pt-1">
									<div class="form-group">
										<img src="<?= base_url(); ?>/assets/front/img/qr_code.jpeg" class="img-responsive">
									</div>
									
										<form id="add_customer" action="<?php echo base_url('paymentGateService') ?>" method="post" enctype="multipart/form-data">
											<input type="hidden" class="form-control" name="order_service_id" value="<?= $serviceOrderDetails['order_service_id']; ?>">
											<?php $serviceId = $this->uri->segment(2); ?>
											<input type="hidden" class="form-control" name="serviceId" value="<?= $serviceId; ?>">
											<input type="hidden" class="form-control" name="service_price" value="<?= $serviceOrderDetails['service_price']; ?>">
											
											<div class="form-group pt-2">
												<label for="image" class="col-md-6 control-label">Payment Slip</label>
												<div class="col-md-12">
													<input type="file" name="payment_file" class="form-control" required>
												</div>
											</div>
											<div class="form-group pt-1">
												<button type="submit" class="btn btn-primary first-btn px-1">Submit</button>
											</div>
										</form>
									</div>
                                
								
                            </div>
							
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
