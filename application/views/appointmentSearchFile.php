<?php foreach($allAppointment as $appointmentsRow): ?>
	<tr>
		<td><?= $appointmentsRow['customer_number']?></td>
		<td><?= $appointmentsRow['customer_name']?></td>
		<td><?php
		$splittedstring2 = explode(",", $appointmentsRow['services']);
		foreach ($splittedstring2 as $key => $value) {
			$service_sql2 = "SELECT nbb_service.service_name FROM nbb_service WHERE nbb_service.id = '".$value."'";
			$service_query2 = $this->db->query($service_sql2);	
			foreach($service_query2->result_array() as $serviceRow2){
				
				echo  $service_name2 = $serviceRow2['service_name'];

			}
			if(count($splittedstring2) > 1){
				echo ',';
			}
		}
		?></td>
		<td><?= $appointmentsRow['first_name'].''.$appointmentsRow['last_name']?></td>
		<td><?= $appointmentsRow['start_date']?></td>
		<td><?= $appointmentsRow['start_time']?></td>
		<td><?= $appointmentsRow['end_date']?></td>
		<td><?= $appointmentsRow['end_time']?></td>
		<td><?= $appointmentsRow['amount']?></td>
		<td>
			<?php if($appointmentsRow['status'] == 1){ ?>
				<span class="font-weight-bold" style='color: #00008B'></i>Approved</span>
			<?php }elseif($appointmentsRow['status'] == 2){ ?>
				<span class="font-weight-bold" style='color: #008000'></i>Completed</span>
			<?php }else{ ?>
				<span class="font-weight-bold" style='color: #FFA500;'>Pending</span>
			<?php }?>
		</td>
		<td>
			<a data-appointments_id="<?= $appointmentsRow['id'] ?>" href="javascript:void(0);" data-toggle="modal" data-target="#appoinmentStatus" class="btn btn-default" title="Edit" style="color:#b8860b" ><i class="fa fa-edit"></i></a>
			<a href="<?= base_url('admin/ServiceCategoryCtl/deleteAppointment/'. $appointmentsRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a>
		</td>
	</tr>
<?php endforeach; ?>
