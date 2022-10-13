
<!-- USER SECTION -->
<section class="clearfix userSection padding">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="innerWrapper">
                <div class="orderBox  patternbg">
                  Referal Link
                </div>

                <div class="profile">
                  <div class="row">
                  

                    <div class="col-md-12 col-xl-12">
                      <form class="form-horizontal" action="<?php echo base_url() ?>/front/referalCode" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                          
                          <div class="col-md-8 col-xl-10">
                            <input type="text" class="form-control" id="referalLink" name="referalLink" readonly value="<?= base_url(); ?>ReferredRegister/<?= $userReferal['referreduser_id'];?>" placeholder="">
														<input type="hidden" class="form-control" name="referalCode" readonly value="<?= $userReferal['referreduser_id'];?>">
                          </div>
                          	<div class="col-md-2">
                            	<button class="btn btn-primary" onclick="copyreferalCode()">COPY</button>
                        	</div>
                        </div>

                        <div class="form-group row">
                          
                          <div class="col-md-12 col-xl-12">
                            <input type="text" class="form-control" name="email" placeholder="Enter Refer Friend's Email">
                          </div>
                          <div class="col-md-12 col-xl-12 mt-2">
                          <input type="submit" class="btn btn-primary btn-block" value="Share the link">
                        	</div>
						</div>
                        
                        
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

<script>
	function copyToClipboard(text) {
		var sampleTextarea = document.createElement("textarea");
		document.body.appendChild(sampleTextarea);
		sampleTextarea.value = text; //save main text in it
		sampleTextarea.select(); //select textarea contenrs
		document.execCommand("copy");
		document.body.removeChild(sampleTextarea);
	}

	function copyreferalCode(){
		var copyText = document.getElementById("referalLink");
		copyToClipboard(copyText.value);
	}
</script>
