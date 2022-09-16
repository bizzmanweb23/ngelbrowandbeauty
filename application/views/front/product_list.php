<!-- PRODUCT SECTION -->
    <section class="container-fluid clearfix productArea">
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
                    <img src="<?= base_url(); ?>/uploads/product_img/<?= $servicesImg_row['p_image'] ?>" data-src="<?= base_url(); ?>/uploads/product_img/<?= $servicesImg_row['p_image'] ?>" alt="Image Product" class="img-responsive">
                  </div>
                  <div class="productCaption">
                    <h2><a href="single-product.html"><?= $servicesImg_row['name'] ?></a></h2>
                    <?php if($servicesImg_row['name'] != ''){ ?>
											<h3>$<?= $servicesImg_row['price'] ?></h3>
										<?php }else{} ?>
                    <a href="#" class="btn btn-primary btn-block mt-2">View Details</a>
                  </div>
                 
                </div>
              </div>
							<?php	endforeach; ?>
              <!--<div class="col-md-6 col-lg-4">
                <div class="produtSingle">
                  <div class="produtImage">
                    <img src="img/products/product-2.jpg" data-src="img/products/product-2.jpg" alt="Image Product" class="img-responsive lazyestload">
                    <div class="productMask">
                      <ul class="list-inline productOption">
                        <li class="favourite-icon">
                          <a class="icon" href="javascript:void(0)">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                          </a>
                        </li>

                        <li><a href="cart.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>

                        <li>
                          <a href="javascript:void(0)" data-morphing id="morphing" data-src="#morphing-content">
                            <i class="fa fa-search" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="productCaption">
                    <h2><a href="single-product.html">Handmade Soap</a></h2>
                    <h3>$19</h3>
                    <a href="#" class="btn btn-primary btn-block mt-2">Add to cart</a>
                  </div>
                  
                </div>
              </div>

              <div class="col-md-6 col-lg-4">
                <div class="produtSingle">
                  <div class="produtImage">
                    <img src="img/products/product-3.jpg" data-src="img/products/product-3.jpg" alt="Image Product" class="img-responsive lazyestload">
                    <div class="productMask">
                      <ul class="list-inline productOption">
                        <li class="favourite-icon">
                          <a class="icon" href="javascript:void(0)">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                          </a>
                        </li>

                        <li><a href="cart.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>

                        <li>
                          <a href="javascript:void(0)" data-morphing id="morphing" data-src="#morphing-content">
                            <i class="fa fa-search" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="productCaption">
                    <h2><a href="single-product.html">Handmade Soap</a></h2>
                    <h3>$19</h3>
                    <a href="#" class="btn btn-primary btn-block mt-2">Add to cart</a>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-4">
                <div class="produtSingle">
                  <div class="produtImage">
                    <img src="img/products/product-4.jpg" data-src="img/products/product-4.jpg" alt="Image Product" class="img-responsive lazyestload">
                    <div class="productMask">
                      <ul class="list-inline productOption">
                        <li class="favourite-icon">
                          <a class="icon" href="javascript:void(0)">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                          </a>
                        </li>

                        <li><a href="cart.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>

                        <li>
                          <a href="javascript:void(0)" data-morphing id="morphing" data-src="#morphing-content">
                            <i class="fa fa-search" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="productCaption">
                    <h2><a href="single-product.html">Handmade Soap</a></h2>
                    <h3>$19</h3>
                    <a href="#" class="btn btn-primary btn-block mt-2">Add to cart</a>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-4">
                <div class="produtSingle">
                  <div class="produtImage">
                    <img src="img/products/product-5.jpg" data-src="img/products/product-5.jpg" alt="Image Product" class="img-responsive lazyestload">
                    <div class="productMask">
                      <ul class="list-inline productOption">
                        <li class="favourite-icon">
                          <a class="icon" href="javascript:void(0)">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                          </a>
                        </li>

                        <li><a href="cart.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>

                        <li>
                          <a href="javascript:void(0)" data-morphing id="morphing" data-src="#morphing-content">
                            <i class="fa fa-search" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="productCaption">
                    <h2><a href="single-product.html">Handmade Soap</a></h2>
                    <h3>$19</h3>
                    <a href="#" class="btn btn-primary btn-block mt-2">Add to cart</a>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-4">
                <div class="produtSingle">
                  <div class="produtImage">
                    <img src="img/products/product-6.jpg" data-src="img/products/product-6.jpg" alt="Image Product" class="img-responsive lazyestload">
                    <div class="productMask">
                      <ul class="list-inline productOption">
                        <li class="favourite-icon">
                          <a class="icon" href="javascript:void(0)">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                          </a>
                        </li>

                        <li><a href="cart.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>

                        <li>
                          <a href="javascript:void(0)" data-morphing id="morphing" data-src="#morphing-content">
                            <i class="fa fa-search" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="productCaption">
                    <h2><a href="single-product.html">Handmade Soap</a></h2>
                    <h3>$19</h3>
                    <a href="#" class="btn btn-primary btn-block mt-2">Add to cart</a>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-4">
                <div class="produtSingle">
                  <div class="produtImage">
                    <img src="img/products/product-7.jpg" data-src="img/products/product-7.jpg" alt="Image Product" class="img-responsive lazyestload">
                    <div class="productMask">
                      <ul class="list-inline productOption">
                        <li class="favourite-icon">
                          <a class="icon" href="javascript:void(0)">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                          </a>
                        </li>

                        <li><a href="cart.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>

                        <li>
                          <a href="javascript:void(0)" data-morphing id="morphing" data-src="#morphing-content">
                            <i class="fa fa-search" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="productCaption">
                    <h2><a href="single-product.html">Handmade Soap</a></h2>
                    <h3>$19</h3>
                    <a href="#" class="btn btn-primary btn-block mt-2">Add to cart</a>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-4">
                <div class="produtSingle">
                  <div class="produtImage">
                    <img src="img/products/product-8.jpg" data-src="img/products/product-8.jpg" alt="Image Product" class="img-responsive lazyestload">
                    <div class="productMask">
                      <ul class="list-inline productOption">
                        <li class="favourite-icon">
                          <a class="icon" href="javascript:void(0)">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                          </a>
                        </li>

                        <li><a href="cart.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>

                        <li>
                          <a href="javascript:void(0)" data-morphing id="morphing" data-src="#morphing-content">
                            <i class="fa fa-search" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="productCaption">
                    <h2><a href="single-product.html">Handmade Soap</a></h2>
                    <h3>$19</h3>
                    <a href="#" class="btn btn-primary btn-block mt-2">Add to cart</a>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-lg-4">
                <div class="produtSingle">
                  <div class="produtImage">
                    <img src="img/products/product-9.jpg" data-src="img/products/product-9.jpg" alt="Image Product" class="img-responsive lazyestload">
                    <div class="productMask">
                      <ul class="list-inline productOption">
                        <li class="favourite-icon">
                          <a class="icon" href="javascript:void(0)">
                            <i class="fa fa-heart" aria-hidden="true"></i>
                          </a>
                        </li>

                        <li><a href="cart.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i></a></li>

                        <li>
                          <a href="javascript:void(0)" data-morphing id="morphing" data-src="#morphing-content">
                            <i class="fa fa-search" aria-hidden="true"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="productCaption">
                    <h2><a href="single-product.html">Handmade Soap</a></h2>
                    <h3>$19</h3>
                    <a href="#" class="btn btn-primary btn-block mt-2">Add to cart</a>
                  </div>
                </div>
              </div>-->


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
