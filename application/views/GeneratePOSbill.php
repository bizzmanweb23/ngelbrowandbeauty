<div class="invoice-box">
				<table cellpadding="0" cellspacing="0">
				<tr class="top_rw">
				   <td colspan="3">
					  <h2 style="margin-bottom: 0px;"> N`gel brow & Beauty Invoice</h2>
					  <span style=""> Order Number: <?= $order_number ?>' Date: <?= $now = date("d-m-Y"); ?> </span>
				   </td>
					<td  style="width:30%; margin-right: 10px;">
						<!--PaytmMall Order Id: 6580083283-->
				   </td>
				</tr>
					<tr class="top">
						<td colspan="4">
							<table>
								<tr>
									<td>
									<b>N`gel Brow & Beauty </b> <br>
									5 HARPER ROAD , #02-01 <br>SINGAPORE 369673
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr class="information">
						  <td colspan="4">
							<table>
								<tr>
									<td> <b> Billing Address:</b><br>
									<?= $customer_fname .' '.$customer_lname ?><br><?= $customer_address ?><br>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<td colspan="5">
						<table cellspacing="0px" cellpadding="3px">
							<tr class="heading">
								<td style="width:15%; text-align:left;">
									SKU
								</td>
								<td style="width:25%; text-align:left;">
									Item
								</td>
								<td style="width:10%; text-align:left;">
									Qty.
								</td>
								<td style="width:10%; text-align:left;">
									Price
								</td>
								<td style="width:15%; text-align:left;">
								Total
								</td>
							</tr>
								<?php 
								$sku = '';
									$pName = '';
									$total_quantity = '';
									$product_price = '';
									$total_price = '';
								foreach($productlistingdata as $order_product_row){
									$sku = $order_product_row['sku'];
									$pName = $order_product_row['name'];
									$total_quantity = $order_product_row['total_quantity'];
									$product_price = $order_product_row['product_price'];
									$total_price = $order_product_row['total_price']; ?>
								<tr class="item">
									<td style="width:15%;text-align:left;"> <?= $sku ?></td>
									<td style="width:25%;text-align:left;"><?= $pName ?></td>
									<td style="width:10%; text-align:left;"><?= $total_quantity ?></td>
									<td style="width:10%; text-align:left;"><?= $product_price ?></td>
									<td style="width:15%; text-align:left;"><?= $total_price ?></td>
								</tr>
						<?php 	} ?>
					</table>
						</td>
					</tr>

					<tr>
						<td colspan="5">
						<table cellspacing="0px" cellpadding="3px">
							<tr class="heading">
								<td style="width:15%; text-align:left;">
									Service Name
								</td>
								<td style="width:25%; text-align:left;">
									Amount
								</td>
							</tr>
								<?php 
									$service_name = '';
									$service_price = '';
									
								foreach($servicedata as $servicedata_row){
									$service_name = $servicedata_row['service_name'];
									$service_price = $servicedata_row['price'];
								 ?>
								<tr class="item">
									<td style="width:15%;text-align:left;"> <?= $service_name ?></td>
									<td style="width:25%;text-align:left;"><?= $service_price ?></td>
								</tr>
						<?php 	} ?>
					</table>
						</td>
					</tr>

					<tr class="total">
					
					<td colspan="4" align="right">  Product Total :  <b>  <?= $producttotalPrice['total_price'] ?> </b> </td>
					
					</tr>
					<tr class="total">
					
					<td colspan="4" align="right">  Service Total :  <b>  <?= $servicetotalPrice['total_ServicePrice'] ?> </b> </td>
					</tr>
					<tr class="total">
					<?php $grandTotal = $producttotalPrice['total_price'] + $servicetotalPrice['total_ServicePrice'];?>
					<td colspan="4" align="right">  Service Total :  <b>  <?= $grandTotal; ?> </b> </td>
					</tr>
					<tr class="total">
						  <td colspan="4" align="right">  GST :  <b> </b> </td>
					</tr>
					<tr>
					   <td colspan="4">
						 <table cellspacing="0px" cellpadding="2px">
							<tr>
								<td width="50%">
								<b> Declaration: </b> <br>
		We declare that this invoice shows the actual price of the goods
		described above and that all particulars are true and correct. The
		goods sold are intended for end user consumption and not for resale.
								</td>
								<td>
								 * This is a computer generated invoice and does not
								  require a physical signature
								</td>
							</tr>
						 </table>
					   </td>
					</tr>
				</table>
			</div>
		<style>
			.top_rw{ background-color:#f4f4f4; }
			.td_w{ }
			button{ padding:5px 10px; font-size:14px;}
			.invoice-box {
				max-width: 890px;
				margin: auto;
				padding:10px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, .15);
				font-size: 14px;
				line-height: 24px;
				font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
				color: #555;
			}
			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
				border-bottom: solid 1px #ccc;
			}
			.invoice-box table td {
				padding: 5px;
				vertical-align:middle;
			}
			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}
			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}
			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}
			.invoice-box table tr.information table td {
				padding-bottom: 50px;
			}
			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
				font-size:12px;
			}
			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}
			.invoice-box table tr.item td{
				border-bottom: 1px solid #eee;
			}
			.invoice-box table tr.item.last td {
				border-bottom: none;
			}
			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}  
		</style>
