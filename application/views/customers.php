<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Customer management</h1>
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
                <a href="<?=base_url('admin/CustomerManagement/add_customer')?>"><button type="button" class="btn btn-primary btn-custom" style="float: right;">Add Customer</button></a>         
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                
                    <div class="site-table" style="overflow: auto; height: 350px ">            
                    <table class="table table-bordered" id = "customer_table">
                    <thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
                          <tr>
                            <th>First Name</th>
                            <th>Last Name</th>
														<th>Referral Code</th>
                            <th>DOB</th>
                            <th>Age</th>
                            <th>Email</th>
                            <th>Contact No.</th>
                            <th>Created At</th>
														<th>Refered User</th>
                            <th>Action</th>
                          </tr>
                      </thead>
                     <tbody>
                    <?php foreach($customer as $customers): ?>
                      <tr>
                        <td><?= $customers['first_name']?></td>
                        <td><?= $customers['last_name']?></td>
												<td><?= $customers['referreduser_id']?></td>
                        <td><?= $customers['dob']?></td>
                        <td><?= $customers['age']?></td>
                        <td><?= $customers['email']?></td>
                        <td><?= $customers['contact']?></td>
                        <td><?= $customers['created_at']?></td>
												
												<td>
													<a href="<?= base_url('admin/welcome/all_referredby/'.$customers['referreduser_id'])?>" target="_blank" class="btn btn-default" data-toggle="tooltip" title="Payment History" style="color:#00000">View</a></td>
                        <td> 

													<a href="<?= base_url('admin/CustomerManagement/showCustomerPdf')?>?customer_Id=<?php echo $customers['id']; ?>" class="btn btn-default" title="pdf" target="_blank"><img src="<?= base_url('uploads/pdf_download.png')?>" class="rounded" width="30" height="30">
													</a>

													<a href="<?= base_url('admin/CustomerManagement/editCustomer/'. $customers['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#61d3d4"><i class="fa fa-edit"></i></a>

													<a href="<?= base_url('admin/welcome/viewPastTransaction/'.$customers['id'])?>" target="_blank" class="btn btn-default" data-toggle="tooltip" title="past transaction history" style="color:#61d3d4"><i class="fa fa-eye"></i></a>

													<a href="<?= base_url('admin/welcome/all_paymenthistory/'.$customers['id'])?>" target="_blank" class="btn btn-default" data-toggle="tooltip" title="Transaction History" style="color:#61d3d4"><i class="fa fa-credit-card"></i></a>

													<a href="<?= base_url('admin/welcome/all_ExpenseWallet/'.$customers['id'])?>" target="_blank" class="btn btn-default" data-toggle="tooltip" title="Expense Wallet" style="color:#61d3d4"><i class="fa fa-wallet"></i></a>

													<a href="<?= base_url('admin/welcome/all_CreditWallet/'.$customers['id'])?>" target="_blank" class="btn btn-default" data-toggle="tooltip" title="Credit Wallet" style="color:#61d3d4"><i class="fa fa-wallet"></i></a>

                         	<a href="<?= base_url('admin/CustomerManagement/deleteCustomer/'. $customers['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a>

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
<!--
<link rel="stylesheet" href="<?= base_url(); ?>/assets/plugins/ajax_datatables/css/jquery.dataTables.css"> 
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/assets/plugins/ajax_datatables/js/ajax-jquery-1.8.2.min.js"></script>
<script type="text/javascript" charset="utf8" src="<?= base_url(); ?>/assets/plugins/ajax_datatables/js/ajax-jquery.dataTables.min.js"></script>
<script>
$(function() {
$("#customer_table").dataTable({
	"ordering": false,
});
});

</script> -->
