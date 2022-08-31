<body id="body" class="body-wrapper static">
  <div class="se-pre-con"></div>
  <div class="main-wrapper">
    <!-- HEADER --> 

<!-- CHECK OUT SECTION -->

    <section class="clearfix checkout">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-8">
            <div class="panel panel-default checkInfo">
              <div class="panel-heading patternbg">1. Billing</div>
  
              <div class="panel-body">
                <div class="radio-inline chooseOption">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                    <label class="form-check-label" for="exampleRadios1">
                      Pay with new card
                    </label>
                  </div>
  
                  <form class="form-horizontal">
                    <div class="form-group row">
                      <label class="control-label text-md-right col-md-3 col-xl-2" for="card">Name on Card:</label>
                      <div class="col-md-7">
                        <input type="text" class="form-control" id="card" required="" placeholder="Name on Card">
                      </div>
                    </div>
  
                    <div class="form-group row">
                      <label class="control-label text-md-right col-md-3 col-xl-2" for="number">Card Number</label>
                      <div class="col-md-7">
                        <input type="text" class="form-control" id="number" placeholder="###.###.###">
                      </div>
                    </div>
  
                    <div class="form-group row">
                      <label class="control-label text-md-right col-md-3 col-xl-2" for="number">Expires on:</label>
                      <div class="dateSelect col-md-7">
                        <div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
                          <input type="text" class="form-control" placeholder="MM/DD/YYYY">
                          <div class="input-group-addon">
                            <span class="fa fa-calendar"></span>
                          </div>
                        </div>
                      </div>
                    </div>
  
                    <div class="form-group row">
                      <label class="control-label text-md-right col-md-3 col-xl-2" for="cvcnumber">Security Code:</label>
                      <div class="col-md-7">
                        <input type="text" class="form-control" id="cvcnumber" placeholder="CVC">
                        <i class="fa fa-question-circle helpText" aria-hidden="true"></i>
                      </div>
                    </div>
  
                    <div class="form-group row">
                      <label class="control-label text-md-right col-md-3 col-xl-2" for="cvcnumber">Country:</label>
                      <div class="countrySelect col-md-7">
                        <select name="guiest_id2" id="guiest_id2" class="select-drop">
                          <option value="0">- Select Country -</option>
                          <option value="1">UK</option>
                          <option value="2">Australia</option>
                          <option value="3">USA</option>
                        </select>
                      </div>
                    </div>
  
                    <div class="form-group row">
                      <label class="control-label text-md-right col-md-3 col-xl-2" for="postalcode">Postal Code:</label>
                      <div class="col-md-7">
                        <input type="text" class="form-control" id="postalcode" placeholder="Postal Code">
                      </div>
                    </div>
  
                    <div class="form-group row">
                      <div class="col-md-3 col-xl-2"></div>
                      <div class="col-md-7">
                        <div class="checkbox">
                          <label><input type="checkbox"> Remember this Card</label>
                        </div>
                      </div>
                    </div>
  
                    <div class="form-group row">
                      <div class="col-md-3 col-xl-2"></div>
                      <div class="col-md-7">
                        <button type="submit" class="btn btn-primary">Use this card</button>
                      </div>
                    </div>
                  </form>
                </div>
  
                <div class="cardTitle extraSpace">
                  or
                </div>
  
                <div class="form-group row">
                  <div class="col-12">
                    <div class="radio-inline chooseOption">
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                          Pay with <img src="img/extra/paypal.png" alt="Image paypal">
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="panel panel-default cartInfo mb-4">
              <div class="panel-heading patternbg">2. Comfirm and Pay</div>
              <div class="panel-body tableArea">
                <div>
                  <table class="table">
                    <tbody>
                      <tr>
                        <td><div class="cartImage"><img src="<?= base_url()?>/assets/front/img/products/cart-product-1.jpg" data-src="img/products/cart-product-1.jpg" class="lazyestload" alt="Image cart"></div></td>
                        <td>Lorem ipsum dolor sit consectetur. <br> <span>Qnt: 1</span></td>
                        <td><span class="price">$79</span></td>
                      </tr>
                      
                      <tr>
                        <td><div class="cartImage"><img src="<?php echo base_url() ?>/assets/front/img/products/cart-product-2.jpg" data-src="img/products/cart-product-2.jpg" class="lazyestload"  alt="Image cart"></div></td>
                        <td>Lorem ipsum dolor sit consectetur. <br> <span>Qnt: 1</span></td>
                        <td><span class="price">$79</span></td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
  
            <div class="paymentPart">
              <div class="form-group">
                <div class="totalAmount"><span>Total:</span><strong>$158</strong></div>
                <button type="submit" class="btn btn-primary">Complete payment</button>
              </div>
            </div>
          </div>
        </div>
        <form>
       

    
        </form>
      </div>
    </section> 
 <!-- FOOTER -->
 
  </div>


  <!-- FANCY SEARCH -->
  <div id="morphing-content" class="morphing-content">
    <!-- FORM -->
    <section class="morphing-searchBox" id="quote">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="text-center">Search our product</h2>
            <div class="row">
              <div class="col-lg-6">
                <form class="fancymorphingForm" action="#" method="post" id="fancymorphingForm">
                  <div class="input-group">
                    <input type="text" class="form-control" required="" id="expire" placeholder="Search...">
                    <div class="input-group-append">
                      <button class="input-group-text btn" type="submit"><i class="fa fa-search text-white"></i></button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</body>