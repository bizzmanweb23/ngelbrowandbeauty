<!--
<h1 class="heading" align="center">International N'gel Academy</h1>
<div class="col-md-11">
	<div class="card mb-3">
		<div class="card-header">
			<div class="d-inline"><h3>Course Deatils</h3></div>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-md-6">
					<h4 class="mb-0">Course Name</h4>
				</div>
				<div class="col-md-6 text-secondary">
					<?= $courseData['course_name'] ?>
				</div>
			</div>
			<div class="row pt-3">
				<div class="col-md-6">
				<h6 class="mb-0">Course Category</h6>
				</div>
				<div class="col-md-6 text-secondary">
					<?= $courseData['category_name']; ?>
				
				</div>
			</div>
			<div class="row pt-3">
				<div class="col-sm-6">
				<h6 class="mb-0">Trainer Name</h6>
				</div>
				<div class="col-sm-6 text-secondary">
				<?= $courseData['e_first_name'].' '.$courseData['e_last_name'] ?>
				</div>
			</div>

			<div class="row pt-3">
				<div class="col-sm-6">
				<h6 class="mb-0">Course fees</h6>
				</div>
				<div class="col-sm-6 text-secondary">$<?= $courseData['course_fees'] ?></div>
			</div>
			
			<div class="row pt-3">
				<div class="col-sm-6">
				<h6 class="mb-0">Durations</h6>
				</div>
				<div class="col-sm-6 text-secondary">
				<?= $courseData['durations'] ?>
				</div>
			</div>
			
			<div class="row pt-3">
				<div class="col-sm-6">
				<h6 class="mb-0">FOC Items</h6>
				</div>
				<div class="col-sm-6 text-secondary">
				<?= $courseData['foc_items'] ?>
				</div>
			</div>
			<div class="row pt-3">
				<div class="col-sm-6">
				<h6 class="mb-0">Description</h6>
				</div>
				<div class="col-sm-6 text-secondary">
				<?= $courseData['description']; ?>
				</div>
			</div>
			
		</div>
	</div>

</div>
<style>
	.heading{
		background-color: #61d3d4;
		color: white;
		padding: 5px;
		text-align: left;
		border-radius: 10px;
		padding-left: 10px;
	}
</style>-->
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
