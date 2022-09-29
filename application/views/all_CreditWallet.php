<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Credit Wallet</h1>
          </div>
        </div>
      </div><!-- /.container-fluid --> 
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card" style="border-radius: 15px">
             <?php /* <div class="card-header">
							
                <a href="<?=base_url('admin/OfferAndPackages/add_Coupon')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add Coupon </button></a>
								<h2>Packages List</h2>
              </div>*/ ?>
              <!-- /.card-header -->
              <div class="card-body">

                 <div class="site-table" style = "overflow: auto; height: 400px">
                <table class="table table-bordered" id = "salary_table" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
                  <thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
                  <tr>
                    <th>Customer Name </th>
                    <th>Customer Code</th>
					<th>Balance</th>
					<th>Created At</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($creditWallet as $creditWalletRow): ?>
                      <tr>
                        <td><?= $creditWalletRow['first_name'] .' '.$creditWalletRow['last_name']?></td>
						<td><?= $creditWalletRow['referreduser_id'] ?></td>	
                        <td><?= $creditWalletRow['referral_balance']?></td>
                        <td><?= date("d-m-Y", strtotime($creditWalletRow['created_at'])) ?></td>
											
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
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
	.product_style{
		background-color: #b8860b;
		color: white;
		padding: 5px;
		text-align: left;
		border-radius: 10px;
		padding-left: 10px;
	}
</style>
<script>
	$(function() {
		$("#salary_table").dataTable({
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": false,
			"info": false,
			"autoWidth": false,
			"responsive": false,
		});
	});
	
</script>
