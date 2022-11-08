<form name ="payroll" action="<?= base_url('add_to_service')?>" method="post" enctype="multipart/form-data">
<?php
	foreach($ajaxallservices as $servicesImg_row): 
		$id = $servicesImg_row['id']; 
		$user_id = $this->session->userdata('id');
		$order_servicerownum_sql = "SELECT nbb_order_service.*
		FROM nbb_order_service 
		WHERE nbb_order_service.user_id = '".$user_id."' AND nbb_order_service.service_id = $id AND nbb_order_service.payment_status = '1' AND nbb_order_service.status = '2'";
		$order_servicerownum_query = $this->db->query($order_servicerownum_sql);
		$order_service_rownum = $order_servicerownum_query->num_rows();
		?>
		<input type="hidden" name="service_id" value="<?= $id; ?>">
		<div class="tab-pane" id="braidstwist_<?= $id; ?>">
			<div class="varietyContent">
				<div class="row">

					<div class="col-md-5">
						<img src="<?= base_url(); ?>/uploads/service_img/<?= $servicesImg_row['service_icon'] ?>" data-src="<?= base_url(); ?>/uploads/service_img/<?= $servicesImg_row['service_icon'] ?>" alt="Image Variety" class="img-responsive">
					</div>
					<div class="col-md-7">

					<h3 class="mt-5 pt-2"><?= $servicesImg_row['service_name'] ?></h3>
				
			<div class="row pt-2">	
				<div class="col-md-12">
					<label class="font-weight-bold">Description:</label>
				</div>
			</div>
			<div class="row pt-1">
						
						<div class="col-md-12">
							<?= $servicesImg_row['description'] ?>
						</div>
			</div>
			<?php /* <div class="row mt-3">
							<div class="col-md-6" style="font-size: 20px; color: #63d4d6;">
							<?php if($order_service_rownum > 0){ ?>
									
							<?php }else{ ?>
								<input type="radio" id="timesPrice1" name="timePrice" value="1" required>
							<?php } ?>
								
  							<label>One Time price</label>
							</div>
							<div class="col-md-6 font-weight-bold" style="font-size: 28px; color: #63d4d6;">
									<?php if($servicesImg_row['discount_price'] == 0){ ?>
									s$<?= $servicesImg_row['service_price'] ?>
									<input type="hidden" name="service_price" value="<?= $servicesImg_row['service_price']; ?>">
								<?php }else{ ?>
									s$<?= $servicesImg_row['discount_price'] ?>
									<input type="hidden" name="service_price" value="<?= $servicesImg_row['discount_price']; ?>">
								<?php } ?>
							</div>
				</div> */ ?>
			<?php if($servicesImg_row['service_category'] == 1){ ?>
				<div class="row mt-3">
							<div class="col-md-6" style="font-size: 20px; color: #63d4d6;">
							<?php if($order_service_rownum > 0){ ?>
									
							<?php }else{ ?>
								<input type="radio" id="timesPrice1" name="timePrice" value="1" required>
							<?php } ?>
								
  							<label>One Time price</label>
							</div>
							<div class="col-md-6 font-weight-bold" style="font-size: 28px; color: #63d4d6;">
									
									s$<?= $servicesImg_row['service_price'] ?>
									<input type="hidden" name="service_price" value="<?= $servicesImg_row['service_price']; ?>">
							</div>
				</div>
				<div class="row pt-2">
						<div class="col-md-6" style="font-size: 20px; color: #63d4d6;">
								<?php if($order_service_rownum > 0){ ?>
								
								<?php }else{ ?>
										<input type="radio" id="timesPrice2" name="timePrice" value="10" required>
								<?php } ?>
  								<label><?= $servicesImg_row['package_session'] ?> Times Package:</label>
							</div>
							<div class="col-md-6 font-weight-bold" style="font-size: 28px; color: #63d4d6;">
							s$<?= $servicesImg_row['package_times_price'] ?>
							<input type="hidden" name="package_times_price" value="<?= $servicesImg_row['package_times_price']; ?>">
							</div>
				</div>
				<?php }else{ ?>
					<div class="row pt-3">
							<div class="col-md-2" style="font-size: 20px; color: #63d4d6;">
  							<label>Price:</label>
							</div>
							<div class="col-md-6 font-weight-bold" style="font-size: 28px; color: #63d4d6;">
							<?php if($servicesImg_row['lowest_price'] != 0){ ?>
								S$&nbsp;<?= $servicesImg_row['lowest_price'] ?>&nbsp;-&nbsp;
							<?php } ?>					
									S$&nbsp;<?= $servicesImg_row['service_price'] ?>
									<input type="hidden" name="service_price" value="<?= $servicesImg_row['service_price']; ?>">
							</div>
					</div>

				<?php } ?>
				
				<div class="mt-3">
				<?php if($this->session->userdata('id')>0){ 
						if($order_service_rownum > 0){ 
					?>
					<a href="<?= base_url('appointmentBooking/'.$id)?>" class="btn btn-primary first-btn px-2" target="_blank">make An Appoinment</a>
				<?php }else{ ?>
					<button type="submit" class="btn btn-primary first-btn w-75 px-2">Buy now</button>
					<?php } ?>
					

				<?php }else{ ?>
					<a href="javascript:void(0)" onclick="return swal('Please Login First')" class="btn btn-primary first-btn px-2">Buy now</a>
				<?php } ?>
				<?php /*if($this->session->userdata('id')>0){ ?>
					<a href="<?= base_url('appointmentBooking/'.$id)?>" class="btn btn-primary first-btn px-2" target="_blank">make An Appoinment</a>
				<?php }else{ ?>
					<a href="javascript:void(0)" onclick="return swal('Please Login First')" class="btn btn-primary first-btn px-2">make An Appoinment</a>
				<?php }*/  ?>
			</div>

		</div>	
			

		</div>

	</div>
						
	</div>
<?php endforeach; ?>
</form>
