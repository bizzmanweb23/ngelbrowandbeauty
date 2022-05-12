<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>n'gel brow & beauty</title>

	<style type="text/css">
		table {
			  font-family: arial, sans-serif;
			  border-collapse: collapse;
			  width: 100%;
			}
			th {
			  border: 1px solid #dddddd;
			  background-color:#b8860b !important;
			  text-align: left;
			  padding: 8px;
			}
			td{
			  border: 1px solid #dddddd;
			  text-align: left;
			  padding: 8px;
			}

			/*tr:nth-child(even) {
			  background-color: #dddddd;
			}*/
			img{
				max-width: 200px; height: auto; display: block;
			}
	</style>
</head>
<body>

<div id="container">
	
	<header style="margin: 0px 10px 0 10px;padding-top: 40px;">
		<table>
			<tr>
				<td width="80%" style="border:unset;">
					<h4>n'gel Brow & Beauty Holiday List</h4>
				</td>
			<td style="border:unset;">
			<span style="margin: 0 0 1em 1em;max-height: 25%;position:relative;"><img src="http://localhost/ngelbrowandbeauty//assets/img/LOGO.png" class="navbar-brand-img" alt="main_logo" style="width:200px; max-height:80px;"></span>
			</td>
			</tr>
		</table>
    </header>
	<div id="body">
		
		<table >
			<tr>
				<th>Year</th>
				<th>Date</th>
				<th>Day</th>
				<th>Holiday Name</th>
			</tr>
			<tbody>
				<?php foreach ($empHoliday as $empHolidayRow) {?>
					<tr>	
						<td><?= $empHolidayRow['year'];?></td>
						<td><?= $empHolidayRow['date'];?></td>
						<td><?= $empHolidayRow['day'];?></td>
						<td><?= $empHolidayRow['holidays'];?></td>
					</tr>	
				<?php } ?>
			</tbody>
		</table>

</div>

</body>
</html>
