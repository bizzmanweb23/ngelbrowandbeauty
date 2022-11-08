<div class="container">
        <div class="row">
            <div class="col-12 mt-4">
                <div class="card p-3">
                    <h5 class="mb-0 fw-bold h4">Payment Methods</h5>
                </div>
            </div>
            <div class="col-12">
                <div class="card p-3">
                    <!--<div class="card-body border p-0">
                        <p>
                            <a class="btn btn-primary w-100 h-100 d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                aria-controls="collapseExample">
                                <span class="fw-bold">PayPal</span>
                                <span class="fab fa-cc-paypal">
                                </span>
                            </a>
                        </p>
                        <div class="collapse p-3 pt-0" id="collapseExample">
                            <div class="row">
                                <div class="col-8">
                                    <span class="h4 mb-0">Summary</span>
                                    <p class="mb-0"><span class="fw-bold">Product:</span><span class="c-green">: Name of
                                            product</span></p>
                                    <p class="mb-0"><span class="fw-bold">Price:</span><span
                                            class="c-green">:$452.90</span></p>
                                    <p class="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque
                                        nihil neque
                                        quisquam aut
                                        repellendus, dicta vero? Animi dicta cupiditate, facilis provident quibusdam ab
                                        quis,
                                        iste harum ipsum hic, nemo qui!</p>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <div class="card-body border p-0">
                        <p>
                            <a class="btn btn-primary p-3 w-100 h-100 d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                                aria-controls="collapseExample">
                                <span class="fw-bold">QR Code</span>
                                <span class="">
                                    <span class="fab fa-cc-amex"></span>
                                    <span class="fab fa-cc-mastercard"></span>
                                    <span class="fab fa-cc-discover"></span>
                                </span>
                            </a>
                        </p>
                        <div class="collapse show p-3 pt-0" id="collapseExample">
                            <div class="row">
                                <div class="col-lg-5 mb-lg-0 mb-2">
                                    <p style="color: #000;" class="h4 mb-0">Summary</p>
                                    <p style="color: #000;" class="mb-0 pt-1">
									<span class="font-weight-bold">Product:</span><span style="color: #63d4d6;"> <?= $serviceOrderDetails['service_name']; ?></span>
                                    </p>
                                    <p style="color: #000;" class="mb-0 pt-1">
                                        <span class="font-weight-bold">Price:</span>
                                        <span style="color: #63d4d6;">$<?= $serviceOrderDetails['service_price']; ?></span>
                                    </p>
                                    <p style="color: #000;" class="mb-0 pt-1"> <span class="font-weight-bold">Service Type:</span>
                                        <span style="color: #63d4d6;">Package</span>
									</p>
                                </div>
                                <div class="col-lg-7 pt-1">
									<img src="<?= base_url(); ?>/assets/front/img/qr_code.jpeg" class="img-thumbnail">
										<!--<a href="<?php echo base_url('paymentGateService/'.$serviceOrderDetails['order_service_id']); ?>" class="btn btn-warning px-2">Pay with <img src="<?php echo base_url('uploads/paypal.png'); ?>" /></a>-->
                                       <!-- <div class="row">
                                            <div class="col-12 mt-2">
                                                <div class="form__div">
													
                                                    <input type="text" class="form-control" placeholder = "Card Number">
                                                   
                                                </div>
                                            </div>

                                            <div class="col-6 mt-2">
                                                <div class="form__div"> 
													
                                                    <input type="text" class="form-control" placeholder="MM /YY">
                                                   
                                                </div>
                                            </div>

                                            <div class="col-6 mt-2">
                                                <div class="form__div">  
													
                                                    <input type="password" class="form-control" placeholder="CVV">
                                                  
                                                </div>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <div class="form__div">
													
                                                    <input type="text" class="form-control" placeholder="Name Of The Card">
                                                    
                                                </div>
                                            </div>
                                            <div class="col-12 mt-2">
                                                <div class="btn btn-primary w-100">Sumbit</div>
                                            </div>
                                        </div>-->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
