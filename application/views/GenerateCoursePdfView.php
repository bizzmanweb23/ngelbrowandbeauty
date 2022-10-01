
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
		 <h1 class="heading" align="center">International N'gel Academy</h1>
            <!-- begin table-responsive -->
			<h2 style=" text-align: center;">Course Deatils</h2>
            <div class="">
               <table class="table table-invoice">
                  <tbody>
                     <tr>
                        <td>
                           <span class="text-inverse">Course Name</span>
                        </td>
						
                        <td class="text-center"><?= $courseData['course_name'] ?></td>
                        
                     </tr>
                     <tr>
                        <td>
                           <span class="text-inverse">Course Category</span>
                           
                        </td>
						
                        <td class="text-center"><?= $courseData['category_name']; ?></td>
                        
                     </tr>
					 <tr>
                        <td>
                           <span class="text-inverse">Trainer Name</span>
                        </td>
						
                        <td class="text-center"><?= $courseData['e_first_name'].' '.$courseData['e_last_name'] ?></td>
                        
                     </tr>
					 <tr>
                        <td>
                           <span class="text-inverse">Course fees</span>
                        </td>
						
                        <td class="text-center">$<?= $courseData['course_fees'] ?></td>
                        
                     </tr>
					 <tr>
                        <td>
                           <span class="text-inverse">Durations</span>
                        </td>
						
                        <td class="text-center"><?= $courseData['durations'] ?></td>
                        
                     </tr>
					 <tr>
                        <td>
                           <span class="text-inverse">FOC Items</span>
                        </td>
						
                        <td class="text-center"><?= $courseData['foc_items'] ?></td>
                        
                     </tr>
					  <tr>
                        <td>
                           <span class="text-inverse">Description</span>
                        </td>
						
                        <td class="text-center"><?= $courseData['description']; ?></td>
                        
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
