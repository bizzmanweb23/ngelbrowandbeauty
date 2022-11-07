<!-- ORDER SECTION -->
      <section class="clearfix orderSection padding">
        <div class="container">
      

          <div class="row">
            <div class="col-12">
              <form>
                <div class="panel panel-default cartInfo">
                  <div class="panel-heading patternbg">your Order</div>
                  <div class="panel-body tableArea">
                    <div class="table-responsive">          
                      <table class="table">
                        <tbody>
												<?php foreach($wishlistData as $wishlistData_row): ?>
                          <tr>

													
                            <td>
														<?php if($wishlistData_row['p_image'] == ''){ ?>
															<a href="<?= base_url(); ?>productDetails/<?= $wishlistData_row['product_id'] ?>" class="cartImage"><img src="<?= base_url(); ?>/uploads/product_img/demo-product.jpg" data-src="<?= base_url(); ?>/uploads/product_img/demo-product.jpg" alt="Image Product" class="img-responsive"></a>
															<?php	}else{ ?>
																<a href="<?= base_url(); ?>productDetails/<?= $wishlistData_row['product_id'] ?>" class="cartImage"><img src="<?= base_url(); ?>/uploads/product_img/<?= $wishlistData_row['p_image'] ?>" data-src="<?= base_url(); ?>/uploads/product_img/<?= $wishlistData_row['p_image'] ?>" alt="Image Product" class="img-responsive"></a>
														<?php } ?>
															
														</td>

                            <td><?= $wishlistData_row['p_name'] ?> <br> <span>Qnt: 1</span></td>
                            <td><span class="price">$<?= $wishlistData_row['price'] ?></span></td>

                            <td>
															<?php if($wishlistData_row['available_stock'] == ''){ ?>
                              			<span style="color:red;font-weight:bold;font-size: 18px;">Out Of Stock</span>
															<?php }else{ ?>
																	<a class="btn btn-common" href="<?php echo site_url("front/Product/post_add_wishlisttocart"); ?>?product_id=<?php echo $wishlistData_row['product_id']; ?>&price=<?php echo $wishlistData_row['price']; ?>">Add to Cart</a>
															<?php } ?>
                            </td>

                            <td>
															<a href="<?php echo site_url("front/Product/deletewishlist"); ?>?wishlist_id=<?php echo $wishlistData_row['id']; ?>">
                                <span style="font-size:40px">×</span>
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
          </div>
        </div>
      </section>

