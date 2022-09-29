<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Payment</h1>
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
              <!-- /.card-header -->
              <div class="card-body">

                 <div class="site-table" style = "overflow: auto; height: 400px">
                <table class="table table-bordered payment_table" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
                  <thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
                  <tr>
                    <th>Customer Name </th>
                    <th>Customer Code</th>
										<th>Amount</th>
										<th>Payment date</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($paymenthistory as $paymenthistoryRow): ?>
                      <tr>
                        <td><?= $paymenthistoryRow['first_name'] .' '.$paymenthistoryRow['last_name']?></td>
												<td><?= $paymenthistoryRow['referreduser_id'] ?></td>	
                        <td><?= $paymenthistoryRow['amount']?></td>
                        <td><?= date("d-m-Y", strtotime($paymenthistoryRow['payment_date'])) ?></td>
											
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
