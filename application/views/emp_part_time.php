<style>
  .visits input:checked~.visit-rsn {
    background-color: #b88609 !important;
    color: #fff;
    border-radius: 4px;
}
.modal-backdrop.show {
    opacity: 0 !important;
    -webkit-transition-duration: 400ms;
    transition-duration: 400ms;
}
.visits span.visit-rsn:before {
    color: #541728;
}
.chosen-container-multi .chosen-choices{
	padding: 10px !important;
	margin-left: 19px !important;
}
</style>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Part Time</h1>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="">
            <div class="card" style="border-radius: 15px">
              <section>
              <div class="card-body row ">
                <div class="col">
                      <div class="form-group">
                        <label >Employee</label>
                          <select class="form-control chosen chosen-select-deselect form-sm workmanship-select" required>
                            <option disabled value="">Select Employee</option>
                            <?php foreach ($employees as $employee) { ?>
                              <option value="<?= $employee['id'] ?>"><?= $employee['first_name'].' '.$employee['last_name']?></option>
                            <?php } ?>
                          </select>
                          <?php echo site_url("PartTime/save"); ?>
                      </div>
                  </div>

                  <div class="col">
                      <div class="form-group ">
                          <label >Total Amount
                            <i class="required">*</i>
                          </label>
                            <select class="form-control chosen chosen-select-deselect form-sm sales-amount" required>
                              <option disabled value="">Select Amount</option>
                              <?php foreach ($sales as $amount) { ?>
                               <option value="<?= $amount['sales_amount'] ?>"><?= $amount['sales_amount'] ?></option>
                             <?php } ?>
                            </select>
                      </div>
                  </div>

                  <div class="col">
                    <div class="form-group ">
                            <label for="amount"  >Products
                              <i class="required">*</i>
                            </label>
                              <select class="form-control chosen chosen-select-deselect form-sm sales-product" required>
                                <option disabled value="">Select product</option>
                                <?php foreach ($product as $product) { ?>
                                 <option value="<?= $product['price'] ?>"><?= $product['name'] ?></option>
                               <?php } ?>
                              </select>
                    </div>
                  </div>
              </div>
            </section>
              <section>
              <div class="container-fluid">
                <form id="form"  >
                <hr>
                <div class="row  ">
                  <div class="col form-group">
                    <label for="">workmanship</label>
                    <input type="text" name="workmanship-commission" class="form-control form-sm workmanship-commission" readonly>
                  </div>
                  <div class="col form-group">
                    <label for="">sales commission</label>
                    <input type="text" name="sales-commission" class="form-control form-sm sales-commission" readonly>
                  </div>
                  <div class="col form-group">
                    <label for="">product commission</label>
                    <input type="text" name="product-commission" class="form-control form-sm product-commission" readonly>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="col">
                      <input type="submit" class="btn btn-primary btn-custom form-submit" value="submit" style="width: 150px;">
                  </div>
                </div>
                </form>
              </div>
            </section>
            </div>
        </div>
      </div>
    </div>
    </div>
  </section>
</div>

<script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/theia-sticky-sidebar/ResizeSensor.js"></script>
<script src="<?= base_url(); ?>assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"></script>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->

<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style1.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- this link for multiple selection-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
<link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>

<script>
$(document).ready(function(){
  result = 0.00;
  pkg = 0.00;
  prod = 0.00;
  workmanshipCommission = 0.00;
  productCommission = 0.00;
  salesCommission = 0.00;
  freeTrialCommission = 0.00;
  $(document).on('change','.workmanship-select', function(e){
    e.preventDefault();
    $data = $(this).find(':selected').text();
        $('.workmanship').html($data);
          $('.workmanship-commission').val($data);
  });

  $(document).on('change','.package-select', function(e){
    pkg = $(this).val();
    $('.package').text(pkg);
  });
  $(document).on('change','.sales-amount', function(e){
    e.preventDefault();
    $sales_amount = $(this).find(':selected').val();
        $('.totalAmount').val($sales_amount);
        $('.totalAmount').html($sales_amount);
        if($sales_amount > 500 || $sales_amount <= 1000){
          $result = parseFloat($sales_amount*6/100);
        }

        if($sales_amount > 8000 || $sale_amount <= 11999){
          $result = parseFloat($sales_amount*5/100);
        }
        if($sales_amount > 12000 || $sale_amount <= 15999){
          $result = parseFloat($sales_amount*5/100);
        }
        if($sales_amount > 16000 || $sale_amount <= 19999){
          $result = parseFloat($sales_amount*5/100);
        }
        if($sales_amount > 20000){
          $result = parseFloat($sales_amount*5/100);
        }
        $('.result').html($result);
        $('.sales-commission').val($result);

  });

  $(document).on('change','.sales-product', function(e){
    e.preventDefault();
    $data = $(this).find(':selected');
          $product_percent = parseFloat($data.val()*5/100);
          $('#products').html($product_percent);
          $('.product-commission').val($product_percent);
  });

  ///form submit
  $(document).on('submit','#form',function(e){
    $formdata = $('#form').serialize();
    $.ajax({
      url : '<?php echo site_url("PartTime/save_parttime") ?>',
      type : 'post',
      data : $formdata,
      success : function(data){

      }
    });

  });


});


</script>
