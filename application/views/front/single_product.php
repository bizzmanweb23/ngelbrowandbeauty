<!-- SINGLE PRODUCT SECTION -->
    <section class="clearfix singleProduct">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="singleIamge">
              <img src="<?= base_url(); ?>uploads/product_img/<?= $productDetails['p_image']; ?>" alt="Image Single Product" class="img-responsive">
			  	
            </div>
				<!--<ul class="preview-thumbnail nav nav-tabs">
					<li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
					<li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
					<li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
					<li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
					<li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
				</ul>-->
          </div>

			<form name ="payroll" action="<?= base_url('add_to_cart')?>" method="post" enctype="multipart/form-data">
								
						<input type="hidden" class="form-control" name="product_id" value="<?= $productDetails['id'] ?>">
						<input type="hidden" class="form-control stock" name="stock" value="<?= $productDetails['stock'] ?>">
						<input type="hidden" class="form-control" name="product_price" value="<?= $productDetails['price'] ?>">
							<div class="col-md-12">
								<div class="singleProductInfo">
									<div class="row">
										<div class="col-md-12">
										<h2 class="font-weight-bold"><?= $productDetails['pname'] ?>(<?= $productDetails['sku'] ?>)</h2>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
										<h3><?php if($productDetails['discounted_price'] != ''){ ?>	
												$<?= $productDetails['discounted_price'] ?>
											<?php }else{ ?>
												$<?= $productDetails['price'] ?>
											<?php } ?>
											<del><?php if($productDetails['discounted_price'] != ''){ ?>	
												$<?= $productDetails['price'] ?>
											<?php }else{ ?>
												
											<?php } ?></del></h3>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<ul class="list-inline category">
												<li><span class="font-weight-bold"> Color:</span></li>
												<li><a href="javascript:void(0)"><?= $productDetails['colour'] ?></a></li>
											</ul>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<ul class="list-inline category">
												<li><span class="font-weight-bold">Brand Name:</span></li>
												<li><a href="javascript:void(0)"><?= $productDetails['brand_name'] ?></a></li>
											</ul>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<label class="font-weight-bold">Short Description:</label>
											<p style="color: #000;"><?= $productDetails['short_description'] ?></p>
										</div>
									</div>
									<div class="row">
									<div class="col-md-3">
										<div class="form-group mt-0">
										<label class="font-weight-bold">Quantity:</label>
										
											<?php if($productDetails['discounted_price'] != ''){ ?>	
												<input type="text" class="form-control quantity" name="quantity" value="1" min="1" max="999" onkeyup="calculate_total_price(<?= $productDetails['discounted_price'] ?>)">
											<?php }else{ ?>
												<input type="text" class="form-control quantity" name="quantity" value="1" min="1" max="999" onkeyup="calculate_total_price(<?= $productDetails['price'] ?>)">
											<?php } ?>
										</div>
									</div>
									<div class="col-md-4">
										<div class="form-group">
										<label class="font-weight-bold">Total price:</label>
										<?php if($productDetails['discounted_price'] != ''){ ?>	
											<input type="text" class="form-control displayprice" name="totalPrice" value="<?= $productDetails['discounted_price'] ?>" min="1" max="999" readonly>
											<?php }else{ ?>
												<input type="text" class="form-control displayprice" name="totalPrice" value="<?= $productDetails['price'] ?>" min="1" max="999" readonly>
											<?php } ?>
											
										</div>
									</div>
									</div>
									
									<div class="row">
										<div class="col-md-5">
											<div class="finalCart">
												<button type="submit" class="btn btn-primary"><i class="fa fa-shopping-basket" aria-hidden="true"></i>Add to cart</button>
											</div>
										</div>
										<div class="col-md-4">
										<div class="">
										<?php $user_id = $this->session->userdata('id');  
											$orderTotal_sql = "SELECT nbb_wishlist.* 
											FROM nbb_wishlist 
											WHERE nbb_wishlist.product_id = '".$productDetails['id']."' AND nbb_wishlist.userId = '".$user_id."'";  
												$orderTotal_query = $this->db->query($orderTotal_sql); 
												$orderTotal_num = $orderTotal_query->num_rows();
												if($orderTotal_num > 0){ ?>
														<!--<button class="btn btn-primary icon wishList"><i class="fa fa-heart" style='color: #c90003' aria-hidden="true"></i></button>-->
														<a class="icon wishList like btn btn-default" href="javascript:void(0)"><span class="fa fa-heart" style='color: #c90003'></span></a>
														
												<?php }else{ ?>
													<!--<a class="icon addwishList" href="javascript:void(0)" data-product_id="<?=  $productDetails['id']; ?>"><i class="fa fa-heart wishList_<?=  $productDetails['id']; ?>" aria-hidden="true" ></i></a>-->
													<a class="icon addwishList like btn btn-default" data-product_id="<?=  $productDetails['id']; ?>" href="javascript:void(0)"><span class="fa fa-heart wishList_<?=  $productDetails['id']; ?>"></span></a>
												<?php } ?>
										</div>
										</div>
									</div>
									

									<!--<ul class="list-inline shareSocial">
										<li>Share:</li>
										<li><a href="javascript:void(0)"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
										<li><a href="javascript:void(0)"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
										<li><a href="javascript:void(0)"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
										<li><a href="javascript:void(0)"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
										<li><a href="javascript:void(0)"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
									</ul>-->
								</div>
							</div>
					</form>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="tabCommon tabOne singleTab">
        

              <div class="tab-content patternbg">
              <div id="details" class="tab-pane show fade in active">
                  <h4>More Description</h4>
                  <p style="color: #000;"><?= $productDetails['description'] ?></p>
                </div>
                <!--<div id="reviews" class="tab-pane fade">
                  <div class="blogCommnets">
                    <div class="media">
                      <a class="media-left" href="javascript:void(0)">
                        <img class="media-object " data-src="img/blog/user-1.jpg" src="img/blog/user-1.jpg" alt="Image">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading">Integer blandit</h4>
                        <h5><span><i class="fa fa-calendar" aria-hidden="true"></i>22 September, 2016</span></h5>
                        <p>Reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                        <button class="btn btn-link">Reply</button>
                      </div>
                    </div>
                    <div class="media mediaMargin">
                      <a class="media-left" href="javascript:void(0)">
                        <img class="media-object " data-src="img/blog/user-2.jpg" src="img/blog/user-2.jpg" alt="Image">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading">Integer blandit</h4>
                        <h5><span><i class="fa fa-calendar" aria-hidden="true"></i>22 September, 2016</span></h5>
                        <p>Reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                        <button class="btn btn-link">Reply</button>
                      </div>
                    </div>
                    <div class="media">
                      <a class="media-left" href="javascript:void(0)">
                        <img class="media-object " data-src="img/blog/user-3.jpg" src="img/blog/user-3.jpg" alt="Image">
                      </a>
                      <div class="media-body">
                        <h4 class="media-heading">Integer blandit</h4>
                        <h5><span><i class="fa fa-calendar" aria-hidden="true"></i>22 September, 2016</span></h5>
                        <p>Reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>
                        <button type="button" class="btn btn-link">Reply</button>
                      </div>
                    </div>
                  </div>
                </div>-->

              </div>
            </div>
          </div>
        </div>

  


      </div>
    </section>
<script type = "text/javascript">
	function calculate_total_price(price){
		var quantity = $( ".quantity" ).val(); 
		var available_stock = $( ".stock" ).val();
		
    var product_total_base_price = price * quantity;
		var result2 = available_stock - quantity;
		//alert(result2); 
		$(".displayprice").val(product_total_base_price);
		$(".stocknow").val(result2);
	}

	$(document).ready(function(){
			$(".addwishList").on('click', function(e){
					var product_id = $(this).attr('data-product_id');
					//alert(product_id);
					var url = "<?php echo base_url() ?>front/Product/post_add_wishList";
						$('.wishList_'+product_id).css('color', '#c90003');

					$.ajax({
						type : 'POST',
						url : url, 
						data :  {productId:product_id}, 
						success : function(data){
              //$(".wishList").find('.fa-heart').css('color', '#c90003');
							/*$('.wishList').hide();
							var alertBox = '<i class="fa fa-heart" style="color: #c90003" aria-hidden="true"></i>';
							$('.wishListlogo').html(alertBox);*/
							
						}
					});
				});
		});
</script>
<style>
	.like {
  background: #63d4d6;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .like:hover {
    background: #63d4d6;
    color: #fff; }
</style>
