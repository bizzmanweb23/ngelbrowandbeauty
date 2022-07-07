<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Lead management</h1>
						<?php $message = $this->session->flashdata('error_msg');
							if (isset($message)) {
						?>
						<div class="alert alert-success">
							<?= $this->session->flashdata('error_msg') ?>
						</div>
						<?php } ?>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card" style="border-radius: 15px;height: 35rem;">
              <div class="card-header">
                <a href="<?=base_url('admin/leadManagement/add_lead')?>"><button type="button" class="btn btn-primary btn-custom" style="float: right;">Add Lead</button></a>  
									<form action="<?php echo site_url("admin/leadManagement/import_csv"); ?>" method="post" enctype="multipart/form-data" id="import_form">
										<div class="row">
										<div class="col-md-4">
												<input type="file" name="file" class="form-control" style="display:inline-block;" require/>
										</div>
										<div class="col-md-4">
												<input type="submit" class="btn btn-primary btn-custom" name="importBtn" value="IMPORT">
										</div>
										</div>
									</form>       
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                    <div class="site-table" style="overflow: auto; height: 350px ">            
                    <table class="table table-bordered" id = "customer_table">
                    <thead style="background-color: #fff; color:#b8860b">
                          <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Contact No.</th>
                            <th>Reference Name</th>
                            <th>Source</th>
														<th>Source Link</th>
                            <th>Action</th>
                          </tr>
                      </thead>
                     <tbody>
                    <?php foreach($allLead as $allLeadRow): ?>
                      <tr>
                        <td><?= $allLeadRow['first_name'].' '.$allLeadRow['last_name']?></td>
                        <td><?= $allLeadRow['email']?></td>
                        <td><?= $allLeadRow['contact']?></td>
                        <td><?= $allLeadRow['admin_name']?></td>
                        <td><?= $allLeadRow['source_name']?></td>
												<td><a href = "<?= $allLeadRow['source_link'] ?>" target="_blank" class="btn btn-custom">view</a></td>
                        <td> 
													<a href="<?= base_url('admin/leadManagement/viewleadDetails/'.$allLeadRow['id'])?>" target="_blank" class="btn btn-default" data-toggle="tooltip" title="past transaction history" style="color:#b8860b"><i class="fa fa-eye"></i></a>
													<a href="<?= base_url('admin/leadManagement/edit_lead/'. $allLeadRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#b8860b"><i class="fa fa-edit"></i></a>
                         	<a href="<?= base_url('admin/leadManagement/delete_lead/'. $allLeadRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#b8860b"><i class="fa fa-trash"></i></a>
												</td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
</div>

<link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/ajax_datatables/css/jquery.dataTables.css"> 
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/assets/plugins/ajax_datatables/js/ajax-jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/assets/plugins/ajax_datatables/js/ajax-jquery.dataTables.min.js"></script>
<script>
$(function() {
$("#customer_table").dataTable();
});
</script> 
