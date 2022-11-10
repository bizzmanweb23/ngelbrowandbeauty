<div class="content-wrapper" style="margin-left: 270px;">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category Management</h1>
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
                <a href="<?=base_url('admin/ServiceCategoryCtl/add_category')?>" target="_blank"><button type="button" class="btn btn-primary btn-custom" style=" float: right;">Add Category </button></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                 <div class="site-table" style="overflow: auto; height: 400px ">
                <table class="table table-bordered Childcategory_table" style="overflow: auto; width: 100%; height: 250px; text-align: center;">
                  <thead style="background-color: #61d3d4; color:#000000;position: sticky;top: 0;">
                  <tr>
                    <th>Main Category</th>
                    <th>Sub-Category</th>
										<th>Image</th>
                    <th>Category Detail</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php foreach($category as $categories): ?>
                      <tr>
												<td><?= $categories['parent_name']?></td>
                        <td><?= $categories['category_name']?></td>
												<td><?php if($categories['product_cat_image'] == ''){ ?>

												<?php }else{ ?>
													<img src="<?= base_url(); ?>uploads/category_image/<?= $categories['product_cat_image'] ?>" width="60" height="60">
												<?php } ?>
													</td>
                        <td><?php if($categories['category_details'] != ''){ ?>
													<?= substr($categories['category_details'],0,50); ?>...
												<?php }else{} ?>
												</td>
                        <td><?php if($categories['status'] == 1){ ?>
													Active
												<?php }else{ ?>
													Inactive
												<?php } ?></td>
                        <td>
													<a href="<?= base_url('admin/ServiceCategoryCtl/edit_category/'.$categories['id'])?>" class="btn btn-default" data-toggle="tooltip" title="Edit" style="color:#61d3d4"><i class="fa fa-edit"></i></a>
													<a href="<?= base_url('admin/ServiceCategoryCtl/deleteCategory/'. $categories['id'])?>" onclick="return confirm('Are you sure you want to delete this data?')" class="btn btn-default" data-toggle="tooltip" title="Delete" style="color:#61d3d4"><i class="fa fa-trash"></i></a></td>
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
