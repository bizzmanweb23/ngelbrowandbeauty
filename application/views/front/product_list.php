<!-- PRODUCT SECTION -->
    <section class="container-fluid clearfix productArea">
			<div class="messages"></div>
      <div class="container">
        <div class="row">
				
          <div class="col-sm-3 col-xs-12">
            

            <!-- https://www.quackit.com/bootstrap/bootstrap_3/tutorial/bootstrap_collapse.cfm -->

            <div class="panel panel-default productSideBar mb-0">
              <div class="panel-heading">Filter by Price</div>
            </div>

            <div class="price-range mb-4 px-3" id="price-range">
              <div class="mb-4" id="slider-non-linear-step"></div>
              <div class="price-range-content">
                <span class="price-text">Price:</span>
                <span class="price-value" id="lower-value"></span>
                <strong class="price-icon">-</strong>
                <span class="price-value" id="upper-value"></span>
              </div>
            </div>

          </div>
        

        	<div class="col-sm-9 col-xs-12">

            <div class="row">
						<?php foreach($allproducts as $servicesImg_row): ?>
              <div class="col-md-6 col-lg-4">
                <div class="produtSingle">
                  <div class="produtImage">
										<?php if($servicesImg_row['p_image'] == ''){ ?>
											<img src="<?= base_url(); ?>/uploads/product_img/demo-product.jpg" data-src="<?= base_url(); ?>/uploads/product_img/demo-product.jpg" alt="Image Product" class="img-responsive">
										<?php	}else{ ?>
                    <img src="<?= base_url(); ?>/uploads/product_img/<?= $servicesImg_row['p_image'] ?>" data-src="<?= base_url(); ?>/uploads/product_img/<?= $servicesImg_row['p_image'] ?>" alt="Image Product" class="img-responsive">
										<?php } ?>
										<div class="productMask">
                      <ul class="list-inline productOption">
                        <li class="favourite-icon">
                         
													<?php $user_id = $this->session->userdata('id');  
													$orderTotal_sql = "SELECT nbb_wishlist.* 
													FROM nbb_wishlist 
													WHERE nbb_wishlist.product_id = '".$servicesImg_row['id']."' AND nbb_wishlist.userId = '".$user_id."'";  
														$orderTotal_query = $this->db->query($orderTotal_sql); 
														$orderTotal_num = $orderTotal_query->num_rows();
														if($orderTotal_num > 0){ ?>
																<a class="icon wishList" href="javascript:void(0)"><i class="fa fa-heart" style='color: #c90003' aria-hidden="true"></i></a>
																
														<?php }else{ ?>
															<a class="icon addwishList" href="javascript:void(0)" data-product_id="<?=  $servicesImg_row['id']; ?>"><i class="fa fa-heart wishList_<?=  $servicesImg_row['id']; ?>" aria-hidden="true" ></i></a>
														<?php } ?>
                            
                          
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="productCaption">
                    <h2><a href="single-product.html"><?= $servicesImg_row['name'] ?></a></h2>
											<h3>$<?php if($servicesImg_row['discounted_price'] == ''){ ?>
													<?= $servicesImg_row['price'] ?>
											<?php }else{ ?>
												<?= $servicesImg_row['discounted_price'] ?>
											<?php } ?>
												</h3>
                    <a href="<?= base_url(); ?>productDetails/<?= $servicesImg_row['id'] ?>" class="btn btn-primary btn-block mt-2">View Details</a>
                  </div>
                 
                </div>
              </div>
							<?php	endforeach; ?>

            </div>
            
            <div class="paginationCommon productPagination">
              <nav aria-label="Page navigation">
                <ul class="pagination">
                  <li>
                    <a href="javascript:void(0)" aria-label="Previous">
                      <span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                    </a>
                  </li>
                  <li class="active"><a href="javascript:void(0)">1</a></li>
                  <li><a href="javascript:void(0)">2</a></li>
                  <li><a href="javascript:void(0)">3</a></li>
                  <li><a href="javascript:void(0)">4</a></li>
                  <li><a href="javascript:void(0)">5</a></li>
                  <li>
                    <a href="javascript:void(0)" aria-label="Next">
                      <span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
        
			
			    </div>

		    </div>
      </div>
    </section>
<script>
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
		