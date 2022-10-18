<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
   <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product</h1>
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
			  <h3 class="heading" align="center">Bulk Product Import</h3>
			  
			  	<form action="<?php echo site_url("admin/productManagement/import_csv"); ?>" method="post" enctype="multipart/form-data" id="import_form">
					<div class="row pt-2" >
						<div class="col-md-4">
							<input type="file" name="file" class="form-control" style="display:inline-block;" require/>
						</div>
						<div class="col-md-4">
							<input type="submit" class="btn btn-primary btn-custom" name="importBtn" value="IMPORT">
						</div>

					</div>
				</form> 
				<div class="row">
					<p style="color: red;">While adding category And sub-category in the csv file, the following id's should be input.</p>
					<div class="col-md-4">
						<h5>Main Category</h5>
						<p>Product => 2 </p>
					</div>
					<div class="col-md-6">
						<h5>Sub-Category</h5>
						<?php foreach($allcategory as $categoryRow){ ?>
							<p><?= $categoryRow['child_category_name']; ?> => <?= $categoryRow['id']; ?> </p>
						<?php } ?>
						
					</div>
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
	.heading{
		background-color: #61d3d4;
		color: white;
		padding: 5px;
		text-align: left;
		border-radius: 10px;
		padding-left: 10px;
	}
		
</style>
