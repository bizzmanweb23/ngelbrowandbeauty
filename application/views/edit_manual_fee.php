<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
		  <h1>Payroll Management</h1>
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
			  <form id="" action="<?= base_url('admin/Pay_Structure/post_edit_manual_fee') ?>" method="post" enctype="multipart/form-data">
				<div class="row">
					<input type="hidden" class="form-control" name="fee_id" value="<?= $allpay_structure['id']; ?>">
					<div class="col-md-6">   
						<div class="form-group">
							<label for="email" class="col-md-12 control-label">Type of Manual Fee</label>
							<div class="col-md-12">
								<input type="text" class="form-control" name="type_of_fee" id="type_of_fee" value="<?= $allpay_structure['type_of_fee']; ?>">
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="contact" class="col-sm-6 control-label">Amount</label>
							<div class="col-md-12">
								<input type="text" class="form-control" name="amount" id="amount" placeholder="Amount" value="<?= $allpay_structure['amount']; ?>">
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">  
						<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
					</div>
				</div>
				
			</form>
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
	h3{
		background-color: #b8860b;
		color: white;
		padding: 6px;
		text-align: left;
		border-radius: 10px;	
		padding-left: 10px;
	}
	td{
		padding: 7px;
	}
	
	.button{
		background-color: #b8860b;
		color:#fff;
		border: none;
		padding: 10px 15px;
	}
	
	.button:hover {
		cursor: pointer;
		box-shadow: 5px 5px 5px;
	}
</style>

	
	