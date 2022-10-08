
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
		<tr class="top_rw">
		   <td colspan="3">
		      <h2 style="margin-bottom: 0px;"> Order Details </h2>
			  <span style=""> Order Number: <?= $orderData['order_number'] ?> Date: <?= date("d-m-Y", strtotime($orderData['create_date'])); ?> </span>
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
							<b>N'gel Brow & Beauty </b> <br>
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
                            <td colspan="3">
							<b> Shipping Address: </b> <br>
                                <?= $shippingData['shipping_firstname'].' '.$shippingData['shipping_lastname'];?> <br>
								<?= $shippingData['shipping_contactno'];?><br>
								<?= $shippingData['shipping_address'];?>,<?= $shippingData['shipping_hse_blk_no'];?>,<?= $shippingData['shippingunit_no'];?>,<?= $shippingData['shipping_street'];?>,<?= $shippingData['shipping_postalcode'];?><br>
                                <?= $shippingData['shipping_country'];?><br>
								
                            </td>
                            <td> <b> Billing Address:</b><br>
							<?= $billingData['billing_firstname'].' '.$billingData['billing_lastname'];?> <br>
								<?= $billingData['billing_contactno'];?><br>
								<?= $billingData['billing_address'];?>,<?= $billingData['billing_hse_blk_no'];?>,<?= $billingData['billing_unit_no'];?>,<?= $billingData['billing_street'];?>,<?= $billingData['billing_postal_code'];?><br>
                                <?= $billingData['billing_country'];?><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
			<tr>
				<td colspan="4">
				<table cellspacing="0px" cellpadding="2px">
					<tr class="heading">
						<td style="width:25%; text-align:left;">
							ITEM
						</td>
						<td style="width:10%; text-align:left;">
							QTY.
						</td>
						<td style="width:10%; text-align:left;">
							PRICE
						</td>
						<td style="width:15%; text-align:left;">
						TOTAL AMOUNT
						</td>
					</tr>
					<?php foreach($productlistingdata as $productlistingRow){ ?>
						<tr class="item">
							<td style="width:25%;text-align:left;">
								<?= $productlistingRow['product_name']; ?>
							</td>
							<td style="width:10%; text-align:left;">
								<?= $productlistingRow['total_quantity']; ?>
							</td>
							<td style="width:10%; text-align:left;">
								<?= $productlistingRow['product_price']; ?>
							</td>
							<td style="width:15%; text-align:left;">
								<?= $productlistingRow['total_price']; ?>
							</td>
						</tr>
					<?php } ?>
					</table>
				</td>
			</tr>
            <tr class="total">
                  <td colspan="4" align="right">  Grand Total :  <b> <?= $producttotalPrice['total_price'] ?> </b> </td>
            </tr>
			<tr class="total">
                  <td colspan="4" align="right">  Delivery Charge :  <b> </b> </td>
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
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
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
