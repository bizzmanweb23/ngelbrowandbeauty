<section class="vh-100">
  <div class="container py-4 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100 text-center">
      <div class="col-8">
	  	<div class="modal-body text-start text-black p-4">
                <h5 class="modal-title text-uppercase mb-5" id="exampleModalLabel"><img alt="robot picture" class="" height="155" src="<?= site_url('/assets/front/img/logo.png'); ?>" width="155"></h5>
                <h4 class="mb-5" style="color: #63d4d6;">Thanks for your order</h4>
                <p class="mb-0" style="color: #000;">Payment summary</p>
                <hr class="mt-2 mb-4"
                  style="height: 0; background-color: transparent; opacity: .75; border-top: 2px dashed #9e9e9e;">

                <div class="d-flex justify-content-between">
                  <span class="font-weight-bold mb-0">Order Number </span>
                  <span class="mb-0" style="color: #63d4d6;">#<?= $order_number; ?></span>
                </div>

                <div class="d-flex justify-content-between pt-2">
                  <span class="font-weight-bold">Total Amount</span>
                  <h4 class="font-weight-bold" style="color: #63d4d6;">$<?= $total_price; ?></h4>
                </div>
				<div class="d-flex justify-content-between pt-2">
                  <span class="font-weight-bold">Delivery Address</span>
                  	<h4 class="text-justify" style="color: #63d4d6;">
				  		<?php foreach($shipping_address as $shipping_addressRow){?>
							<?= $shipping_addressRow['shipping_firstname'].' '.$shipping_addressRow['shipping_lastname']; ?><br>
							<?= $shipping_addressRow['shipping_contactno']; ?><br>
							<?= $shipping_addressRow['shipping_hse_blk_no']; ?><br>
							<?= $shipping_addressRow['shippingunit_no']; ?>,<?= $shipping_addressRow['shipping_street']; ?><br>
							<?= $shipping_addressRow['shipping_address']; ?><br>
							<?= $shipping_addressRow['shipping_postalcode']; ?>
							<br> <?= $shipping_addressRow['shipping_country']; ?>
						<?php } ?>
					</h4>
                </div>

              </div>
              <div class="d-flex justify-content-center border-top-0">
			  	<a href="<?= base_url(); ?>home" class="btn btn-primary first-btn px-2" target="_blank">Shop Again</a>
              </div>
			  <br>

      </div>
    </div>
  </div>
</section>

    
	
	
<!--	<style type="text/css">
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        img {
            border: 0;
            height: auto;
            line-height: 100%;
            outline: none;
            text-decoration: none;
        }

        table {
            border-collapse: collapse !important;
        }

        body {
            height: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        @media screen and (max-width: 480px) {
            .mobile-hide {
                display: none !important;
            }

            .mobile-center {
                text-align: center !important;
            }
        }

        div[style*="margin: 16px 0;"] {
            margin: 0 !important;
        }
    </style>

<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">

    <table border="0" cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" valign="top" style="font-size:0; padding: 35px;" bgcolor="#fff">
                            <div style="display:inline-block; max-width:100%; min-width:100px; vertical-align:top; width:100%;">
                                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:100%">
                                    <tr>
                                        <td align="center" valign="top" style=" text-align: center;" class="mobile-center">
                                            <img src="<?= base_url(); ?>assets/front/img/logo.png" class="img-fluid" alt="" style="margin: 0 auto;">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">
                                <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                    <tr>
                                        <td align="right" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                                            <table cellspacing="0" cellpadding="0" border="0" align="right">
                                                <tr>
                                                    
                                                   
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 5px 5px 10px 5px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;"><i class="fa fa-check" width="125" height="120" style="display: block; border: 0px;color:green;" ></i><br>
                                        <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;"> Thank You For Your Order! </h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">
                                        <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777; text-align: center;"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium iste ipsa numquam odio dolores, nam. </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;"> Order Confirmation # </td>
                                                <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; text-align: right;"> <?= $order_number; ?> </td>
                                            </tr>
                                         
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="left" style="padding-top: 20px;">
                                        <table cellspacing="0" cellpadding="0" border="0" width="100%">
                                            <tr>
                                                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;"> TOTAL AMOUNT</td>
                                                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee; text-align: right;"> $<?= $total_price; ?> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" height="100%" valign="top" width="100%" style="padding: 0 10px 35px 10px; background-color: #ffffff;" bgcolor="#ffffff">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">
                                <tr>
                                    <td align="center" valign="top" style="font-size:0;">
                                        <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                <tr>
                                                    <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">
                                                        <p style="font-weight: 800;">Delivery Address</p>
                                                        <p><?php foreach($shipping_address as $shipping_addressRow){?>
															<?= $shipping_addressRow['shipping_firstname'].' '.$shipping_addressRow['shipping_lastname']; ?><br>
															<?= $shipping_addressRow['shipping_contactno']; ?><br>
															<?= $shipping_addressRow['shipping_hse_blk_no']; ?>,<?= $shipping_addressRow['shippingunit_no']; ?>,<?= $shipping_addressRow['shipping_street']; ?>,<?= $shipping_addressRow['shipping_address']; ?>,<?= $shipping_addressRow['shipping_postalcode']; ?>
															<br> <?= $shipping_addressRow['shipping_country']; ?>
															<?php } ?>
														</p>
														
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                        <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">
                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                                                <tr>
                                                    <td align="right" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; text-align: right;">
                                                        <p style="font-weight: 800; text-align: right;">Estimated Delivery Date</p>
                                                        <p>October 1st, 2022</p>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style=" padding: 35px; background-color: #63d4d6;" bgcolor="#1b9ba3">
                            <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                                <tr>
                                    <td align="center" style="padding: 25px 0 15px 0;">
                                        <table border="0" cellspacing="0" cellpadding="0">
                                            <tr>
                                                <td align="center" style="border-radius: 5px;" bgcolor="#66b3b7"> <a href="<?= base_url(); ?>home" target="_blank" style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #000; padding: 15px 30px; border: 1px solid #000; display: block;">Shop Again</a> </td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>-->
