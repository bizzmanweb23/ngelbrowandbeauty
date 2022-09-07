
 <?php $date_now = date("Y-m-d"); ?>
<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Product Management</h1>
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
              <div class="card-header">
								
                <a href="<?=base_url('admin/ProductManagement/add_product')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add New Product </button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="site-table" style="overflow: auto; height: 400px ">
                <table class="table table-bordered product_table" style="overflow: auto; width: 800px; height: 250px; text-align: center;">
                  <thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
                  <tr>
                    <th>SKU</th>
                    <th>Product Name</th>
                    <th>Category</th>
					<th>Brand Name</th>
                    <th>Price</th>
					<th>Colour</th>
					<th>UOM</th>
                    <th>Total Stock</th>
					<th>Available stock</th>
					<th>MFG Date</th>
					<th>Expiry Date</th>
					<th>Bar Code</th>
                    <th>Short Description</th>
                    <th>Supplier Name</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($product as $productRow): ?>
                      <tr>
                        <td><?= $productRow['sku'] ?></td>
						<td>
							<?php if($productRow['available_stock'] < 10 ){?>

							<a href="#" data-toggle="tooltip" data-placement="top" title="The available stock of <?= $productRow['name']?> product is less than <?= $productRow['available_stock'] ?>!" target="_blank"><i class="fa fa-question-circle" style="font-size:20px;color:red;" data-tip="tip-first"></i></a>
							
							<?php }else{} ?>
							<?php if($productRow['expiry_date'] < $date_now){?>
							<span style="color:red;font-weight: bold;" data-toggle="tooltip" data-placement="top" title="Product is expired!"><?= $productRow['name']?></span>
							<?php }else{ ?>
								<?= $productRow['name']?>
							<?php	} ?>
						
						</td>
                        <td><?= $productRow['category_name']?></td>
						<td><?= $productRow['brand_name']?></td>
                        <td><?= $productRow['price']?></td>
						<td><?= $productRow['colour']?></td>
                        <td><?= $productRow['weight']?></td>
                        <td><?= $productRow['stock'] ?></td>
						<td><?= $productRow['available_stock'] ?><a data-product_Id="<?=  $productRow['id'];?>" data-p_stock = "<?= $productRow['available_stock'] ?>" href="javascript:void(0);" class="px-2 editStock_status" title="Update Stock" style="color:#61d3d4" ><i class="fa fa-edit" aria-hidden="true"></i></a></td>
						<td><?= $productRow['mfg_date']?></td>
						<td><?php if($productRow['expiry_date'] < $date_now){?>
							<span style="color:red;font-weight: bold;" data-toggle="tooltip" data-placement="top" title="Product is expired!"><?= $productRow['expiry_date']?></span>
							<?php }else{ ?>
								<?= $productRow['expiry_date']?>
							<?php	} ?>
						</td>
						<td><?php if($productRow['barcode'] == ''){ ?>
							<a href="<?php echo site_url("admin/ProductManagement/set_barcode"); ?>?product_id=<?= $productRow['id'] ?>&sku_code=<?= $productRow['sku'] ?>"> <button type="button" class="btn btn-secondary">Bar Code Generate</button></a>
						<?php }else{ ?>
							<img src="<?= base_url('uploads/barcode/'.$productRow['barcode'])?>" width="70" height="40">
							<?php } ?>
						</td>
                        <td><?= substr($productRow['short_description'],0,50); ?></td>
						<td><?php if($productRow['supplier_id']){ ?>
							<?= $productRow['supplier_name']?>(<?= $productRow['supplier_code']?>)
						<?php }else{}?>
							
						</td>
						<td><?php if($productRow['status'] == 1)
						{
							echo 'Active';
						}else{
							echo 'Inactive';
						} ?></td>
                        <td>
							<a data-productID="<?= $productRow['id']; ?>" href="javascript:void(0);" class="btn btn-default barCodeScannModal" title="Bar Code Scann" onclick="on_camera()" style="color:#61d3d4"><i class="fa fa-camera"></i></a>
							<a href="<?= base_url('admin/productManagement/editProduct/'.$productRow['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#61d3d4"><i class="fa fa-edit"></i></a>
							<a href="<?= base_url('admin/productManagement/deleteProduct/'.$productRow['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a>
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

 <div id="stockStatusModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Stock Management</h5>
                    <button type="button" class="close close_btn" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
										<form action="<?php echo base_url(); ?>admin/productManagement/updateStack_status" method="post" enctype="multipart/form-data">
											<input name="product_detailsId" type="hidden" class="modal_product_detailsId form-control" value=""/>
											
											<div class = "form-group">
												<label>Stock</label>
												<input name="product_stock" type="text" class="modal_product_stock form-control" value=""/>
											</div>
											<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
										</form>
								</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

	<div id="showBarCodeScannModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Scann Barcode</h5>
                    <button type="button" class="close close_btn" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
									
					<div class = "form-group">
						<div id="my_camera"></div>
						<button onClick="take_snapshot()"><i class="fa fa-camera"></i>Take Snapshot</button>
			
							<div id="results" ></div>

						<?php /* <form action="<?php echo base_url(); ?>admin/productManagement/updateBarcode_snap" method="post" enctype="multipart/form-data">
						<input name="product_detailsId" type="hidden" class="modal_product_Id form-control" value=""/>
						
						<input name="barcode" type="text" class="form-control" id="modal_barcode" value=""/>

						<input type="submit" class="btn btn-primary btn-custom" value="submit" style="width: 150px;">
					</form>*/ ?>
					<input type= "button" value="Save Snapshot" onClick="saveSnap()">
					</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close_btn" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.5.1/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.5.1/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!--<script src="<?= base_url(); ?>/assets/webcamjs/webcam.js"></script>-->
	<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>-->
	<script type="text/javascript" src="<?= base_url(); ?>/assets/webcamjs/webcam.min.js"></script>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   

			$(".editStock_status").click(function(){
				$("#stockStatusModal").modal('show');
				var product_detailsId = $(this).attr('data-product_Id');
				var product_stock = $(this).attr('data-p_stock');
				$("#stockStatusModal .modal_product_detailsId").val( product_detailsId );
				$("#stockStatusModal .modal_product_stock").val( product_stock );
			});
			$(".close_btn").click(function(){
					$("#stockStatusModal").modal("hide"); 
					
			});


			$(".barCodeScannModal").click(function(){
          $("#showBarCodeScannModal").modal('show');
					var product_id = $(this).attr('data-productID');
     			$("#showBarCodeScannModal .modal_product_Id").val( productID );
    
        });
				$(".close_btn").click(function(){
						$("#showBarCodeScannModal").modal("hide"); 
						
        });
	});
			
// Configure a few settings and attach camera
		function on_camera() {
    		Webcam.set({
				width: 250,
				height: 230,
				image_format: 'jpeg',
				jpeg_quality: 90
			});

			Webcam.attach('#my_camera');
					
		}
		
		function take_snapshot() {

			var shutter = new Audio();
			shutter.autoplay = true;
			shutter.src = navigator.userAgent.match(/Firefox/) ? '<?= base_url("assets/webcamjs/shutter.ogg")?>' : '<?= base_url("assets/webcamjs/shutter.mp3")?>';
					shutter.play();
			
					Webcam.snap( function(data_uri) {
						
							document.getElementById('results').innerHTML = 
							'<img id = "imageprev" src="'+data_uri+'"/>';
							document.getElementById("modal_barcode").value = data_uri;
					} );
					Webcam.reset();
			}
		function saveSnap(){

			// Get base64 value from <img id='imageprev'> source
			var base64image =  document.getElementById("imageprev").src;
			
			 Webcam.upload( base64image, '"<?= base_url(); ?>admin/productManagement/updateBarcode_snap"', function(code, text) {
				 console.log('Save Successfully');
				 
        });

		}
</script>
