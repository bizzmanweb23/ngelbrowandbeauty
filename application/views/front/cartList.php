<!-- ORDER SECTION -->
    <section class="clearfix orderArea my-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
            <form>
              <div class="panel panel-default cartInfo">
                <div class="panel-heading patternbg">your Cart List</div>
                <div class="panel-body tableArea mb-4 mb-lg-0">
                  <div>          
                    <table class="table">
                      <tbody>
											<?php foreach($cartproductDetails as $cartproductRow): ?>
                        <tr>
                          <td><a href="<?= base_url(); ?>productDetails/<?= $cartproductRow['product_id'] ?>" target="_blank" class="cartImage"><img src="<?= base_url(); ?>/uploads/product_img/<?= $cartproductRow['p_image'] ?>" class="img-rounded" data-src="<?= base_url(); ?>/uploads/product_img/<?= $cartproductRow['p_image'] ?>" width="100" height="100"></a></td>

                          <td><a class="text-wrap" href="<?= base_url(); ?>productDetails/<?= $cartproductRow['product_id'] ?>"><?= $cartproductRow['p_name'];?></a> <br><span  class="font-weight-bold">Qnt:&nbsp;&nbsp; <?= $cartproductRow['total_quantity']; ?> </span></td>

                          <td><span class="price">S$&nbsp;<?= $cartproductRow['total_price']; ?></span></td>
                          <td>
														<a href="<?= base_url(); ?>deleteorderProduct/<?= $cartproductRow['order_productId'] ?>">
															<button type="button" class="close">
																<span aria-hidden="true" class="hidden-xs">×</span>
															</button>
														</a>
                          </td>
                        </tr>
												<?php endforeach; ?>
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </form>
          </div>

          <div class="col-lg-4">
            <form>
              <div class="panel panel-default cartInfo">
                <div class="panel-heading patternbg">Total </div>
                <div class="panel-body">
                 <div class="cart-total-list">
                  <ul>
                    <li>Product name goes here <span class="text-right pull-right">S$&nbsp;<?= $producttotalPrice['total_price']; ?></span></li>
                    <li>Delivary Charge <span class="text-right pull-right">S$0.00&nbsp;</span></li>
                    <li><strong>Total</strong> <span class="text-right pull-right"> S$&nbsp;<?= $producttotalPrice['total_price']; ?></span></li>
                    
                  </ul>
                 </div>
                  <?php /*<p>Click on a coupon code to apply</p>
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Apply Coupon Code" aria-describedby="basic-addon221" required>
                    <button type="submit" class="input-group-addon" id="basic-addon221">Submit</button>
                  </div> */ ?>
									<?php if($producttotalPrice['total_price'] == ''){ ?>
										
									<?php }else{ ?>
											<a href="<?= base_url(); ?>productOrder" class="btn btn-primary btn-block">Checkout</a>
									<?php } ?>
                  
                </div>
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </section>
