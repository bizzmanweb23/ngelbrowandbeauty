<!-- ORDER SECTION -->
      <section class="clearfix orderSection padding">
        <div class="container">
       
          <div class="row">
            <div class="col-12">
              <div class="innerWrapper">
                <div class="orderBox patternbg">
                  My Orders
                </div>

                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Order ID</th>
                        <th>Date</th>
												<th>Item</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th></th>
                      </tr>
                    </thead>

                    <tbody>
										<?php foreach($allorders as $allorders_row): ?>
											<?php 
												
											?>
                      <tr>
                        <td>#<?= $allorders_row['order_number']; ?></td>
                        <td><?=  date("d-m-Y", strtotime($allorders_row['create_date'])); ?></td>
												<td><?php 
													$totalrow_sql = "SELECT nbb_order_product.id
														FROM nbb_order_product
														WHERE nbb_order_product.order_id = '".$allorders_row['id']."'";
													$totalrow_query = $this->db->query($totalrow_sql); 
													$totalrow_rownum = $totalrow_query->num_rows(); ?>
													
													<?= $totalrow_rownum; ?>
												</td>
                        <td>
													<?php 
													$orderTotal_sql = "SELECT nbb_order_product.id, SUM(nbb_order_product.total_price) AS total_price
														FROM nbb_order_product
														WHERE nbb_order_product.order_id = '".$allorders_row['id']."'";
												$orderTotal_query = $this->db->query($orderTotal_sql); 
												$orderTotal_result = $orderTotal_query->result_array();	
												foreach($orderTotal_result as $row){	
														echo '$'.$row['total_price'];
													
												} ?></td>
                        <td><?php if($allorders_row['order_status'] == 1)
											{ ?>
											<span class="label label-primary">Processing</span>
											<?php }elseif($allorders_row['order_status'] == 2){ ?>
												<span class="label label-success">Completed</span>
											<?php }elseif($allorders_row['order_status'] == 3){ ?>
												<span class="label label-danger">Canceled</span>
											<?php } ?>
													
												
												
												</td>
                        <td><a href="<?= base_url(); ?>orderSummary/<?= $allorders_row['id']; ?>" class="btn btn-default">View Summary</a></td>
                      </tr>
											<?php	endforeach; ?>
                     
                    </tbody>
                  </table>
                </div>
              </div>
							
            </div>
          </div>
        </div>
      </section>
