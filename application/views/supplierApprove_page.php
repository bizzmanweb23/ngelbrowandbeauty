<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quotation Submit</title>
    <style type="text/css">
    body
    {
        margin: 0;
        background-color: #f6f6f6;
        padding: 0;
        font-family: poppins;
    }
    table
    {
        border-spacing: 0;
    }
    td
    {
        padding: 0;
    }
    img
    {
        border: 0;
    }
    .wrapper
    {
        width: 100%;
        table-layout: fixed;
        background-color: #fff;
        padding-bottom: 60px;
    }
    .webkit
    {
        background-color: #F6F6F6;
        max-width: 600px;     
    }
    .outer
    {
        Margin: 0 auto;
        width: 100%;
        max-width: 600px;
        border-spacing: 0;
        font-family: sans-serif;
        color: #464e5f;   
    }

    @media screen and (max-width:600px) {
        
    }

    @media screen and (max-width:400px){
        
    }
    
    </style>
</head>
<body>
    

    <center class="wrapper">

      <div class="webkit">


        <table class="outer" align="center">

            <tr>

                <td>

                    <table width= "100%" style="border-spacing: 0;">
                        <tr>
                            <td style="background-color: #F6F6F6; padding: 5px; text-align: center;">
                                <a href="#"><img src="<?= base_url('/assets/img/LOGO.png')?>" alt="logo" width="300" title="logo"></a>       
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table width="100%" style="border-spacing: 0;">
						<tr>
							<td style="padding: 15px;background-color: #f6f6f6;">
								<p style="font-size:18px; font-weight: bold;">Hi <?= $supplierOrderData['supplier_name']?>&excl;</p>

								<p style="line-height: 25px;font-family: poppins;color: #353b48;"><?= $supplierOrderData['order_details']?>&excl;</p>
							</td>
						</tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table width="100%" style="border-spacing: 0; padding: 20px;">
                        <tr>
							<?php if($supplierOrderData['status'] == 0) {?>
                            <td style="width: 500px;">
							<a href="<?= base_url('admin/ProcurementManagement/sendSupplierApprovel/'. $supplierOrderData['orderId'])?>"><button style="text-transform:uppercase;color: #fff; text-align: center;font-weight: 500;letter-spacing: 1px;font-family: poppins;background-color: #b8860b;padding: 15px 50px;border: none;margin: 4px 2px;cursor: pointer;">Approve</button></a>
                            </td>
							
							<td style="width: 500px;">
							<a href="<?= base_url('admin/ProcurementManagement/sendSupplierRejection/'.$supplierOrderData['orderId'])?>"><button style="text-transform:uppercase;color: #fff; text-align: center;font-weight: 500;letter-spacing: 1px;font-family: poppins;background-color: #b8860b;padding: 15px 50px;border: none;margin: 4px 2px;cursor: pointer;">Reject</button></a>
                            </td>
							<?php  }else{ ?>
								<td style="padding: 15px;background-color: #b8860b;">
									<p style="text-transform:uppercase;color: #fff; text-align: center;font-weight: 600;letter-spacing: 1px;font-family: poppins;">Thank you for your response</p>
								
								</td>
							<?php } ?>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td>
                    <table width="100%" style="border-spacing: 0;" role="presentation">
						 <tr>
							<td style="padding: 20px; width: 50%;" align="left">

								<p style="font-family: poppins;color: #0C1E2F;">You Order Id</p>

								<p style="font-family: poppins; color: #0C1E2F;">Submission Date</p>

							</td>

							<td style="padding: 20px; width: 50%;" align="right">
							
								<p style="text-transform:capitalize;font-family: poppins;">#<?= $supplierOrderData['order_code']?></p>

								<p style="text-transform: capitalize;font-family: poppins;"><?= $supplierOrderData['created_at']?></p>
							
							</td>
						  </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" valign="top">
                    <table cellpadding="0" cellspacing="0" border="0" style="width:100%;padding: 0px 20px;background-color: #F6F6F6;">
                    <tr>
                        <td>
                            <div style="display: block; width: 100%;height: 1px; background-color: #d5d5d5;"></div>
                        </td>
                    </tr>
                    </table>
                </td>
            </tr>

			</table>
		</td>
	   </tr>

           <tr>
               <td>
                   <table width = "100%" style="border-spacing: 0;" role="presentation">
                    <tr>
                        <td style="padding: 15px;">
							<p style="font-family: poppins; color: #0C1E2F;">We look forward to working with you.</p>
							<p style="font-family: poppins; color: #0C1E2F;">Kind Regards,</p>
							<p style="font-family: poppins; color: #0C1E2F;font-weight: bold;font-style: italic;text-transform: capitalize;">n'gel brow & beauty team</p>
                        </td>
                    </tr>
                </table>
               </td>
           </tr>
        </table>
      </div>
    </center>
</body>
</html>
