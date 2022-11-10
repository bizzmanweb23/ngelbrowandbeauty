<section class="clearfix pageTitleArea lipsbanner" style="background-image: url(../assets/front/img/blog/All_Product.png);">
        <div class="container">
		<h1>Products<h1>
        </div>
</section>

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
						<div class="range-slider mt-2">
						
							<span>
								<input type="number" value="1" min="0" max="50" name = "fromPriceRange" class = "fromPriceRange categoryPriceSlider" readonly/>-
								<input type="number" value="50" min="0" max="50" name = "toPriceRange" class = "toPriceRange categoryPriceSlider" readonly/>
							</span>
							<input value="1" min="0" max="500" step="1" type="range" class = "priceSlider categoryPriceSlider"/>
							<input value="500" min="0" max="500" step="1" type="range" class = "priceSlider categoryPriceSlider"/>
						</div>
						<?php $catId = $this->uri->segment(2); ?>
						<input type="hidden" class="catId" name="catId" value="<?= $catId; ?>">
            <!--<div class="price-range mb-4 px-3" id="price-range">
              <div class="mb-4" id="slider-non-linear-step"></div>
              <div class="price-range-content">
                <span class="price-text">Price:</span>
                <span class="price-value" id="lower-value"></span>
                <strong class="price-icon">-</strong>
                <span class="price-value" id="upper-value"></span>
              </div>
							
            </div>-->
						

          </div>
        

        	<div class="col-sm-9 col-xs-12">

            <div class="row allfilterdata">
				<?php foreach($allproducts as $productImg_row): ?>
              <div class="col-md-6 col-lg-4">
                <div class="produtSingle">
                  <div class="produtImage">
						<?php if($productImg_row['p_image'] == ''){ ?>
							<img src="<?= base_url(); ?>/uploads/product_img/demo-product.jpg" data-src="<?= base_url(); ?>/uploads/product_img/demo-product.jpg" alt="Image Product" class="img-responsive">
						<?php	}else{ ?>
                    <img src="<?= base_url(); ?>/uploads/product_img/<?= $productImg_row['p_image'] ?>" data-src="<?= base_url(); ?>/uploads/product_img/<?= $productImg_row['p_image'] ?>" alt="Image Product" class="img-responsive">
										<?php } ?>
										<div class="productMask">
                      <ul class="list-inline productOption">
                        <li class="favourite-icon">
                         
							<?php $user_id = $this->session->userdata('id');  
							$orderTotal_sql = "SELECT nbb_wishlist.* 
							FROM nbb_wishlist 
							WHERE nbb_wishlist.product_id = '".$productImg_row['id']."' AND nbb_wishlist.userId = '".$user_id."'";  
								$orderTotal_query = $this->db->query($orderTotal_sql); 
								$orderTotal_num = $orderTotal_query->num_rows();
								if($orderTotal_num > 0){ ?>
										<a class="icon wishList" href="javascript:void(0)"><i class="fa fa-heart" style='color: #c90003' aria-hidden="true"></i></a>
										
								<?php }else{ ?>
									<a class="icon addwishList" href="javascript:void(0)" data-product_id="<?=  $productImg_row['id']; ?>"><i class="fa fa-heart wishList_<?=  $productImg_row['id']; ?>" aria-hidden="true" ></i></a>
								<?php } ?>
                            
                          
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="productCaption h-75">
                    <span class="align-middle"><a class ="text-dark" href="<?= base_url(); ?>productDetails/<?= $productImg_row['id'] ?>" target="_blank"><b><?= $productImg_row['name'] ?></b></a></span>
						<h3 class="align-middle"><?php if($productImg_row['discounted_price'] != 0){ ?>
								S$<?= $productImg_row['discounted_price']; ?>
						<?php }else{ ?>
							S$<?= $productImg_row['price']; ?>
						<?php } ?>
							</h3>
                    <a href="<?= base_url(); ?>productDetails/<?= $productImg_row['id'] ?>" target="_blank" class="btn btn-primary btn-block mt-2">View Details</a>
                  </div>
                 
                </div>
              </div>
			<?php	endforeach; ?>

            </div>

            <input type="hidden" class="catId" name="catId" value="<?= $catId = $this->uri->segment(2); ?>">
			
            <!--div class="paginationCommon productPagination">
              <nav aria-label="Page navigation">
			 
                <ul class="pagination">
				<?php if(!empty($total_pages) && $total_pages >1){ ?>
                  <li>
                    <a href="javascript:void(0)" aria-label="Previous">
                      <span aria-hidden="true"><i class="fa fa-chevron-left" aria-hidden="true"></i></span>
                    </a>
                  </li>
				  <?php for($i=1; $i<=$total_pages; $i++){
					if($i == 1){ ?>
                  <li class="active page_link pageitem"><a href="javascript:void(0)" data-pageid="<?php echo $i;?>" onclick="showpagination(<?php echo $i;?>);"><?= $i; ?></a></li>
				  <?php }else{ ?>
					<li class="page_link pageitem"><a href="javascript:void(0)" data-pageid="<?php echo $i;?>" onclick="showpagination(<?php echo $i;?>);"><?= $i; ?></a></li>
				  <?php } } ?>
                  <li>
                    <a href="javascript:void(0)" aria-label="Next">
                      <span aria-hidden="true"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                    </a>
                  </li>
				  <?php } ?>	
                </ul>
				
              </nav>
            </div-->
        
			
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

				$(".categoryPriceSlider").on("keyup change", function(e){	
					var catId = $('.catId').val();
					var fromPriceRange = $('.fromPriceRange').val();
	  			var toPriceRange = $('.toPriceRange').val();
					//alert(catId);

					var url = "<?php echo base_url() ?>front/Product/get_product_filter";
					
					$.ajax({
						type : 'POST',
						url : url, 
						data :  {catId:catId,fromPriceRange:fromPriceRange,toPriceRange:toPriceRange}, 
						success : function(result){
              $(".allfilterdata").html(result);
						}
					});

				});
			});


		(function() {

var parent = document.querySelector(".range-slider");
if(!parent) return;

var
	rangeS = parent.querySelectorAll("input[type=range]"),
	numberS = parent.querySelectorAll("input[type=number]");

rangeS.forEach(function(el) {
	el.oninput = function() {
		var slide1 = parseFloat(rangeS[0].value),
				slide2 = parseFloat(rangeS[1].value);

		if (slide1 > slide2) {
			[slide1, slide2] = [slide2, slide1];
			// var tmp = slide2;
			// slide2 = slide1;
			// slide1 = tmp;
		}

		numberS[0].value = slide1;
		numberS[1].value = slide2;
	}
});

numberS.forEach(function(el) {
	el.oninput = function() {
		var number1 = parseFloat(numberS[0].value),
				number2 = parseFloat(numberS[1].value);
		
		if (number1 > number2) {
			var tmp = number1;
			numberS[0].value = number2;
			numberS[1].value = tmp;
		}

		rangeS[0].value = number1;
		rangeS[1].value = number2;

	}
});

})();

function showpagination(page){
	
   var category_id = $(".catId").val();	
   //alert(page);
 
   var url = "<?php echo base_url() ?>front/Product/pagination_product_filter";
   $.ajax({
	 url: url,
	 type: "POST",
	 data:  {page:page,categoryId:category_id},
	 success: function(dataResult){
	   $(".allfilterdata").html(dataResult);
	   $(".pageitem").removeClass("active");
	   $("#"+page).addClass("active");
	   
	 }
   });
 }

</script>
<style>
.range-slider {
	width: 250px;
	margin: auto;
	text-align: center;
	position: relative;
	height: 3em;
}

.range-slider svg,
.range-slider input[type=range] {
	position: absolute;
	left: 0;
	bottom: 0;
}

input[type=number] {
	border: 1px solid #ddd;
	text-align: center;
	font-size: 1.3em;
	-moz-appearance: textfield;
}

input[type=number]::-webkit-outer-spin-button,
input[type=number]::-webkit-inner-spin-button {
	-webkit-appearance: none;
}

input[type=number]:invalid,
input[type=number]:out-of-range {
	border: 2px solid #ff6347;
}

input[type=range] {
	-webkit-appearance: none;
	width: 100%;
}

input[type=range]:focus {
	outline: none;
}

input[type=range]:focus::-webkit-slider-runnable-track {
	background: #2497e3;
}

input[type=range]:focus::-ms-fill-lower {
	background: #2497e3;
}

input[type=range]:focus::-ms-fill-upper {
	background: #2497e3;
}

input[type=range]::-webkit-slider-runnable-track {
	width: 100%;
	height: 5px;
	cursor: pointer;
	animate: 0.2s;
	background: #2497e3;
	border-radius: 1px;
	box-shadow: none;
	border: 0;
}

input[type=range]::-webkit-slider-thumb {
	z-index: 2;
	position: relative;
	box-shadow: 0px 0px 0px #000;
	border: 1px solid #2497e3;
	height: 18px;
	width: 18px;
	border-radius: 25px;
	background: #a1d0ff;
	cursor: pointer;
	-webkit-appearance: none;
	margin-top: -7px;
}


input[type=range]::-ms-track {
	width: 100%;
	height: 5px;
	cursor: pointer;
	animate: 0.2s;
	background: transparent;
	border-color: transparent;
	color: transparent;
}

input[type=range]::-ms-fill-lower,
input[type=range]::-ms-fill-upper {
	background: #2497e3;
	border-radius: 1px;
	box-shadow: none;
	border: 0;
}

input[type=range]::-ms-thumb {
	z-index: 2;
	position: relative;
	box-shadow: 0px 0px 0px #000;
	border: 1px solid #2497e3;
	height: 18px;
	width: 18px;
	border-radius: 25px;
	background: #a1d0ff;
	cursor: pointer;
}
</style>	
