
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>N'gel Brow</title>
</head>
<body>
<div class="container">
   <div class="col-md-12">
      <div class="invoice">
        
         <div class="invoice-content">
		 <h1 class="heading" align="center">N'gel Brow & Beauty</h1>
            <!-- begin table-responsive -->
			<h2 style=" text-align: center;">Customer Deatils</h2>
            <div class="">
               <table class="table table-invoice">
                  <tbody>
                     <tr>
                        <td>
                           <span class="text-inverse">Customer Name</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['first_name'].' '.$CustomerData['last_name'] ?></td>
                        
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Referrel Code</span>
                           
                        </td>
						
                        <td class="text-center"><?= $CustomerData['referreduser_id']; ?></td>
                        
                     </tr>
					 <tr>
					 	<td>
                           <span class="text-inverse">email</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['email'] ?></td>
                        
                     </tr>
					 <tr>
					 	<td>
                           <span class="text-inverse">Date Of Birth</span>
                        </td>
						
                        <td class="text-center"><?= date("d-m-Y", strtotime($CustomerData['dob']));  ?></td>
                        
                     </tr>
					 <tr>
                        <td>
                           <span class="text-inverse">Contact</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['contact'] ?></td>
                        
                     </tr>
					 <tr>
                        <td>
                           <span class="text-inverse">Medical Information</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['medical_information'] ?></td>
                        
                     </tr>
					  <tr>
                        <td>
                           <span class="text-inverse">transactional Records</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['transactional_records']; ?></td>
                        
                     </tr>
					 <tr>
                        <td>
                           <span class="text-inverse">Skin Conditions</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['skin_conditions']; ?></td>
                        
                     </tr>
					 <tr>
                        <td>
                           <span class="text-inverse">Membership</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['membership']; ?></td>
                        
                     </tr>
                  </tbody>
               </table>
            </div>
			<h2 style=" text-align: center;">Shipping Address</h2>
			<div class="">
               <table class="table table-invoice">
                  <tbody>
				  	<tr>
                        <td>
                           <span class="text-inverse">Name</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['shipping_firstname'].' '.$CustomerData['billing_lastname']; ?></td>
                        
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Contact</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['shipping_contactno']; ?></td>
                        
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Address</span>
                           
                        </td>
						
                        <td class="text-center"><?= $CustomerData['shipping_address']; ?></td>
                        
                     </tr>
					 <tr>
					 	<td>
                           <span class="text-inverse">Hse / Blk No.</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['shipping_hse_blk_no'] ?></td>
                        
                     </tr>
					 <tr>
					 	<td>
                           <span class="text-inverse">Unit No.</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['shippingunit_no'];  ?></td>
                        
                     </tr>
					 <tr>
                        <td>
                           <span class="text-inverse">Building / Street Name</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['shipping_street'] ?></td>
                        
                     </tr>
					 <tr>
                        <td>
                           <span class="text-inverse">Country</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['shipping_country'] ?></td>
                        
                     </tr>
					 <tr>
                        <td>
                           <span class="text-inverse">Postal Code</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['shipping_postalcode'] ?></td>
                        
                     </tr>
					 
                  </tbody>
               </table>
            </div>
			<h2 style=" text-align: center;">Billing Address</h2>
			<div class="">
               <table class="table table-invoice">
                  <tbody>
				  	<tr>
                        <td>
                           <span class="text-inverse">Name</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['billing_firstname'].' '.$CustomerData['billing_lastname']; ?></td>
                        
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Contact</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['billing_contactno']; ?></td>
                        
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Address</span>
                           
                        </td>
						
                        <td class="text-center"><?= $CustomerData['billing_address']; ?></td>
                        
                     </tr>
					 <tr>
					 	<td>
                           <span class="text-inverse">Hse / Blk No.</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['billing_hse_blk_no'] ?></td>
                        
                     </tr>
					 <tr>
					 	<td>
                           <span class="text-inverse">Unit No.</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['billing_unit_no'];  ?></td>
                        
                     </tr>
					 <tr>
                        <td>
                           <span class="text-inverse">Building / Street Name</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['billing_street'] ?></td>
                        
                     </tr>
					 <tr>
                        <td>
                           <span class="text-inverse">Country</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['billing_country'] ?></td>
                        
                     </tr>
					 <tr>
                        <td>
                           <span class="text-inverse">Postal Code</span>
                        </td>
						
                        <td class="text-center"><?= $CustomerData['billing_postal_code'] ?></td>
                        
                     </tr>
					 
                  </tbody>
               </table>
            </div>

         </div>
      </div>
   </div>
</div>

<style type="text/css">

.heading{
		background-color: #61d3d4;
		color: white;
		padding: 5px;
		text-align: left;
		border-radius: 10px;
		padding-left: 10px;
	}
.invoice {
    background: #fff;
    padding: 20px
}
td {
	
	padding: 10px;
	}
</style>
</body>
</html>
