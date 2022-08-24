<?php foreach($orderProduct as $orderProductRow): 
		$order_id =   $orderProductRow['id'];
	?>
	<tr>
		<td><?= $orderProductRow['order_number'] ?></td>
		<td><?php if($orderProductRow['customer_firstname'] == ''){ ?>	
			<?= $orderProductRow['first_name'].' '.$orderProductRow['last_name'] ?>
			<?php }else{ ?>
				<?= $orderProductRow['customer_firstname'].' '.$orderProductRow['customer_lastname']?>
			<?php } ?>
		</td>
		<td><?= $orderProductRow['shipping_contactno'] ?></td>
		<td><?= $orderProductRow['shipping_address'] ?></td>
		<td><?= $orderProductRow['shipping_city'] ?></td>
		<td><?= $orderProductRow['shipping_state'] ?></td>
		<td><?= $orderProductRow['shipping_postalcode'] ?></td>
			<td><?= $orderProductRow['create_date']?></td>
			<td><?php if($orderProductRow['order_status'] == 1)
			{ ?>
			<span class = "btn btn-success" style="box-shadow:none !important; text-transform:uppercase;">Current Order</span>
			<?php }elseif($orderProductRow['order_status'] == 2){ ?>
			<span class="btn btn-info" style="box-shadow:none !important; text-transform:uppercase;">Complated</span>
			<?php }elseif($orderProductRow['order_status'] == 3){ ?>
			<span class="btn btn-danger" style="box-shadow:none !important; text-transform:uppercase;">Canceled</span>
			<?php }else{ ?>
			<span></span>
			<?php } ?></td>
			<td><a href="<?= base_url('admin/OrderManagement/editDeliveryDetails/'.$orderProductRow['id'])?>" target="_blank" title="Assign To Delivery"><span class = "btn btn-warning" style="box-shadow:none !important; text-transform:uppercase;">Assign To Delivery</span></a></td>
			<td><?= $orderProductRow['payment_method']?></td>
			<td>
			
				<a data-order_id="<?=  $order_id; ?>" href="javascript:void(0);" data-toggle="modal" data-target="#showOrderProduct" class="btn btn-default" title="Edit" style="color:#61d3d4" ><i class="fa fa-eye"></i></a>
			</td>					
	</tr>
	<?php endforeach; ?>
