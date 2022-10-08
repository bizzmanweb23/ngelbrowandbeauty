<?php
	foreach($ajaxallservices as $servicesImg_row): 
	$id = $servicesImg_row['id']; ?>
	<div class="tab-pane" id="braidstwist_<?= $id; ?>">
		<div class="varietyContent">
			<img src="<?= base_url(); ?>/uploads/service_img/<?= $servicesImg_row['service_icon'] ?>" data-src="<?= base_url(); ?>/uploads/service_img/<?= $servicesImg_row['service_icon'] ?>" alt="Image Variety" class="img-responsive">
			<h3><?= $servicesImg_row['service_name'] ?></h3>
			<h4>$<?= $servicesImg_row['service_price'] ?> Per Head</h4>
			<p><?= $servicesImg_row['description'] ?></p>
			<div class="d-flex justify-content-center">
				<a href="<?= base_url('appointmentBooking/'.$id)?>" class="btn btn-primary first-btn px-2" target="_blank">make An Appoinment</a>
			</div>
		</div>	
														
    </div>
<?php endforeach; ?>
