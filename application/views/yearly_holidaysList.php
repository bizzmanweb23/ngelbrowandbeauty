<?php foreach($emp_holidays as $emp_holidaysRow): ?>
	<tr>
		<td><?= $emp_holidaysRow['year'] ?></td>
		<td><?= $emp_holidaysRow['date']?></td>
		<td><?= $emp_holidaysRow['day'] ?></td>
		<td><?= $emp_holidaysRow['holidays'] ?></td>
		<td>
			<a data-holidays_Id="<?=  $emp_holidaysRow['id'];?>"
			data-year="<?=  $emp_holidaysRow['year'];?>"
			data-date="<?=  $emp_holidaysRow['date'];?>" 
			data-day="<?=  $emp_holidaysRow['day'];?>"
			data-holidays ="<?=  $emp_holidaysRow['holidays'];?>" href="javascript:void(0);" class="btn btn-default editholidays_data" title="Edit" style="color:#61d3d4" ><i class="fa fa-edit" aria-hidden="true"></i></a>
			<a href="<?= base_url('admin/employeeManagement/deleteEmpHoliday/'. $emp_holidaysRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
<?php endforeach; ?>
