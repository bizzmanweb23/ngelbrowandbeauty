<input type = 'hidden' id = 'ajax_pagination_total_value' value = "<?php echo $pagination_productdetails; ?>">
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
			<h2><a href="<?= base_url(); ?>productDetails/<?= $servicesImg_row['id'] ?>" target="_blank"><?= $servicesImg_row['name'] ?></a></h2>
				<h3>$<?php if($servicesImg_row['discounted_price'] == ''){ ?>
						<?= $servicesImg_row['price'] ?>
				<?php }else{ ?>
					<?= $servicesImg_row['discounted_price'] ?>
				<?php } ?>
					</h3>
			<a href="<?= base_url(); ?>productDetails/<?= $servicesImg_row['id'] ?>" target="_blank" class="btn btn-primary btn-block mt-2">View Details</a>
			</div>
			
		</div>
	</div>
<?php	endforeach; ?>
