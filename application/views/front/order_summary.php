<!-- https://www.bootdey.com/snippets/view/order-details#css -->
<section class="clearfix orderSection padding">

		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="innerWrapper">
						<div class="orderBox patternbg">
							Order Details 
						</div>
				
							<!-- Title -->

							<!-- Main content -->
							<div class="row">
								<div class="col-lg-8">
									<!-- Details -->
									<div class="card mb-4">
										<div class="card-body">
											<div class="mb-3 d-flex justify-content-between">
												<h2 class="h5 me-3 px-3"><a href="#" class="text-muted"></a> Order #<?= $orderDateNumber['order_number']; ?></h2>
											</div>
											<div class="mb-3 d-flex justify-content-between">
												<div>
													<span class="me-3 px-3">Order Date:-&nbsp;&nbsp;<?= date("d-m-Y", strtotime($orderDateNumber['create_date'])); ?></span>
													<span class="badge rounded-pill bg-info px-2"><?php if($orderDateNumber['order_status'] == 1){ ?>
														Current Order
													<?php }elseif($orderDateNumber['order_status'] == 2){ ?>
														Complated
													<?php }elseif($orderDateNumber['order_status'] == 3){ ?>
														Canceled
													<?php }else{ ?>
														Pending
													<?php } ?></span>
												</div>
												<div class="d-flex">
													<a href="<?= base_url('front/product/showInvoice')?>?order_Id=<?php echo $orderId = $this->uri->segment(2); ?>" title="pdf" target="_blank"><button class="btn btn-info p-2 me-3 d-lg-block btn-icon-text"> <span class="text">Invoice</span></button></a>
												</div>
											</div>
											<table class="table table-borderless">
												<tbody>
													<?php foreach($orderProductDate as $orderProductRow){ ?>
														<tr>
															<td>
																<div class="d-flex mb-2">
																	<div class="flex-shrink-0 px-2">
																		<img src="<?= base_url()?>/uploads/product_img/<?= $orderProductRow['p_image']; ?>" width="40" class="img-fluid">
																	</div>
																	<div class="flex-lg-grow-1 ms-3">
																		<h6 class=" mb-1"><a href="#" class="text-reset"><?= $orderProductRow['product_name']; ?></a></h6>
																		<span class="">Color: <?= $orderProductRow['colour']; ?></span>
																	</div>
																</div>
															</td>
															<td>Quantity: <?= $orderProductRow['total_quantity']; ?></td>
															<td class="text-end">$<?= $orderProductRow['product_price']; ?></td>
														</tr>
													<?php }	?>
												</tbody>
												<tfoot>
													<tr>
														<td colspan="2">Subtotal</td>
														<td class="text-end">$<?= $producttotalPrice['total_price']; ?></td>
													</tr>
													<tr>
														<td colspan="2">Shipping</td>
														<td class="text-end">$<?= $orderDeliveryDetails['courier_price']; ?></td>
													</tr>
													<?php $sub_total = $producttotalPrice['total_price'] + $orderDeliveryDetails['courier_price']; 
													?>
													<tr class="fw-bold">
														<td colspan="2">TOTAL</td>
														<td class="text-end">$<?= $sub_total; ?></td>
													</tr>
												</tfoot>
											</table>
										</div>
									</div>
									<!-- Payment -->
									<div class="card mb-4">
										<div class="card-body">
											<div class="row">
												<div class="col-lg-6">
													<h3 class="h6">Payment Method</h3>
													<h5>Visa -1234 <br>
													Total: $<?= $sub_total; ?> <span class="badge bg-success rounded-pill">PAID</span></h5>
												</div>
												<div class="col-lg-6">
													<h3 class="h6">Billing address</h3>
													<address>
														<strong><?= $billingAddress['billing_firstname'].' '.$billingAddress['billing_lastname'] ?></strong><br><?= $billingAddress['billing_address'].','.$billingAddress['billing_hse_blk_no'] ?>,<br><?= $billingAddress['billing_unit_no'].','.$billingAddress['billing_street'] ?>,<?= $billingAddress['billing_country'] ?>
														<br>,<?= $billingAddress['billing_postal_code'] ?><br>
														<abbr title="Phone">P:</abbr> <?= $billingAddress['billing_contactno'] ?>
													</address>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-lg-4">
									<!-- Customer Notes -->
									<div class="card mb-4">
										<div class="card-body">
											<h3 class="h6">Delivery Information</h3>
											<strong><?= $orderDeliveryDetails['courierName']; ?></strong>
											<span><a href="#" class="text-decoration-underline" target="_blank"><?= $orderDeliveryDetails['tacking_number']; ?></a> <i class="bi bi-box-arrow-up-right"></i> </span>
											<span><a href="<?= $orderDeliveryDetails['traking_link']; ?>" class="text-decoration-underline" target="_blank"><?= $orderDeliveryDetails['traking_link']; ?></a> <i class="bi bi-box-arrow-up-right"></i> </span><br>
											<span><?= $orderDeliveryDetails['status_name']; ?> <i class="bi bi-box-arrow-up-right"></i></span>
										</div>
									</div>
									<div class="card mb-4">
										<!-- Shipping information -->
										<div class="card-body">
											<h3 class="h6">Shipping Information</h3>
											<h3 class="h6">Address</h3>
											<strong><?= $shippingAddress['shipping_firstname'].' '.$shippingAddress['shipping_lastname'] ?></strong><br><?= $shippingAddress['shipping_address'].','.$shippingAddress['shipping_hse_blk_no'] ?>,<br><?= $shippingAddress['shippingunit_no'].','.$shippingAddress['shipping_street'] ?>,<?= $shippingAddress['shipping_country'] ?>
												<br>,<?= $shippingAddress['shipping_postalcode'] ?><br>
												<abbr title="Phone">P:</abbr> <?= $shippingAddress['shipping_contactno'] ?>
											</address>
										</div>
									</div>
								</div>
							</div>
							
						</div>
					</div>
					</div>
				</div>
			</div>
</section>
  <style>
.card {
    box-shadow: 0 30px 35px 0 rgb(0 0 0 / 5%);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: 1rem;
}
.text-reset {
    --bs-text-opacity: 1;
    color: inherit!important;
}
/*a {
    color: #5465ff;
    text-decoration: none;
}*/
  </style>
