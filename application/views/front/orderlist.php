<!-- CHECK OUT SECTION -->
    <section class="clearfix checkout">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="panel panel-default checkInfo">
              <div class="panel-heading patternbg">Shipping Address</div>
  
              <div class="panel-body">
                <div class="radio-inline chooseOption">
								<?php foreach($shippingAddress as $shippingAddressRow): ?>

                    <div class="row">
                      <label class="control-label text-md-right col-md-3 col-xl-2" for="card">Name:</label>
                      <div class="col-md-7">
                        <!--<input type="text" class="form-control" id="card" required="" placeholder="Name on Card">-->
												<p style="color: #000;"><?= $shippingAddressRow['shipping_firstname'].' '. $shippingAddressRow['shipping_lastname'] ?></p>
                      </div>
											
                    </div>
  
                    <div class="row">
                      <label class="control-label text-md-right col-md-3 col-xl-2" for="number">Contact Number:</label>
                      <div class="col-md-7">
                        <!--<input type="text" class="form-control" id="number" placeholder="###.###.###">-->
												<p style="color: #000;"><?= $shippingAddressRow['shipping_contactno'] ?></p>
                      </div>
                    </div>
  
                    <div class="row">
                      <label class="control-label text-md-right col-md-3 col-xl-2" for="number">Address:</label>
												<p style="color: #000;"><?= $shippingAddressRow['shipping_address'] ?></p>
                      <!--<div class="dateSelect col-md-7">
                        <div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                          <input type="text" class="form-control" placeholder="MM/DD/YYYY">
                          <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </div>
                        </div>
                      </div>-->

                    </div>
  
                    <div class="row">
                      <label class="control-label text-md-right col-md-3 col-xl-2" for="cvcnumber">Country:</label>
                      <div class="col-md-7">
                        <!--<input type="text" class="form-control" id="cvcnumber" placeholder="CVC">
                        <i class="fa fa-question-circle helpText" aria-hidden="true"></i>-->
												<p style="color: #000;"><?= $shippingAddressRow['shipping_country'] ?></p>
                      </div>
                    </div>
  
                    <div class="row">
                      <label class="control-label text-md-right col-md-3 col-xl-2" for="cvcnumber">State:</label>
                      <div class="countrySelect col-md-7">
												<p style="color: #000;"><?= $shippingAddressRow['stateName'] ?></p>
                        <!--<select name="guiest_id2" id="guiest_id2" class="select-drop">
                          <option value="0">- Select Country -</option>
                          <option value="1">UK</option>
                          <option value="2">Australia</option>
                          <option value="3">USA</option>
                        </select>-->
                      </div>
                    </div>

										<div class="row">
                      <label class="control-label text-md-right col-md-3 col-xl-2" for="cvcnumber">City:</label>
                      <div class="countrySelect col-md-7">
												<p style="color: #000;"><?= $shippingAddressRow['shipping_city'] ?></p>
                      </div>
                    </div>
  
                    <div class="row">
                      <label class="control-label text-md-right col-md-3 col-xl-2" for="postalcode">Postal Code:</label>
                      <div class="col-md-7">
												<p style="color: #000;"><?= $shippingAddressRow['shipping_postalcode'] ?></p>
                      </div>
                    </div>
  
                    <!--<div class="form-group row">
                      <div class="col-md-3 col-xl-2"></div>
                      <div class="col-md-7">
                        <div class="checkbox">
                          <label><input type="checkbox"> Remember this Card</label>
                        </div>
                      </div>
                    </div>
  
                    <div class="form-group row">
                      <div class="col-md-3 col-xl-2"></div>
                      <div class="col-md-7">
                        <button type="submit" class="btn btn-primary">Use this card</button>
                      </div>
                    </div>-->

                 
									<?php endforeach; ?>
                </div>
  							<hr>
                <div class="cardTitle extraSpace">
                  <h3>Payment Type</h3>
                </div>
  
                <div class="form-group row">

                  <div class="col-6">
                    <div class="radio-inline chooseOption">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                          Pay with <img src="<?= base_url(); ?>uploads/paypal.png" alt="Image paypal">
                        </label>
                      </div>
                    </div>
                  </div>

									<div class="col-6">
                    <div class="radio-inline chooseOption">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                          Pay with <img src="<?= base_url(); ?>uploads/gpay.png" alt="Image paypal">
                        </label>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="panel panel-default cartInfo mb-4">
              <div class="panel-heading patternbg">Comfirm and Pay</div>
              <div class="panel-body tableArea">
                <div>
                  <table class="table">
                    <tbody>
										<?php foreach($cartproductDetails as $cartproductRow): ?>
                      <tr>
                        <td><div class="cartImage"><img src="<?= base_url(); ?>/uploads/product_img/<?= $cartproductRow['p_image'] ?>" data-src="<?= base_url(); ?>/uploads/product_img/<?= $cartproductRow['p_image'] ?>" width="95" height="95" alt="Image cart"></div></td>
                        <td><?= $cartproductRow['p_name'];?> <br><span  class="font-weight-bold">Qnt:&nbsp;&nbsp; <?= $cartproductRow['total_quantity']; ?> </span></td>
                        <td><span class="price">$<?= $cartproductRow['total_price']; ?></span></td>
                      </tr>
											<?php endforeach; ?> 
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
						<form name ="payroll" action="<?= base_url('orderComplete')?>" method="post" enctype="multipart/form-data">
								
								<input type="hidden" class="form-control" name="order_id" value="<?= $producttotalPrice['order_id'] ?>">
								<input type="hidden" class="form-control" name="total_price" value="<?= $producttotalPrice['total_price']; ?>">
								<div class="paymentPart">
									<div class="form-group">
										<div class="totalAmount"><span>Total:</span><strong>$<?= $producttotalPrice['total_price']; ?></strong></div>
									<button type="submit" class="btn btn-primary">Complete payment</button>
									</div>
								</div>
						</form>
           

          </div>
        </div>
        
      </div>
    </section>
		<script>

			
		</script>




