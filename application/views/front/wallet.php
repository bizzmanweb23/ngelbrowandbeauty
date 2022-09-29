<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-md-6">
            <div class="wallet-balance">
                <i class="fa fa-money"></i>
                <a href="#">$192.00</a>
                <p>Wallet Balance</p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="wallet-balance">
             <a href="#"> <i class="fa fa-plus-circle"></i></a>  
             <p>Add Balance</p>

            </div>
        </div>
    </div>

    <div class="tabCommon tabThree">
        <ul class="nav nav-tabs">
          <li><a class="active" data-toggle="tab" href="#WH">Expense Wallet</a></li>
          <li><a data-toggle="tab" href="#CW">Credit Wallet</a></li>
          <li><a data-toggle="tab" href="#PH">Payment History</a></li>
        </ul>

        <div class="tab-content">
          <div id="WH" class="tab-pane fade show active">
            <table class="table table-bordered">
                <thead>
                  <tr>
										<th>Amount</th>
                    <th>Payment Type</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
									<?php foreach($expense_wallet as $expense_walletRow): ?>
                  <tr>
                    <td><?= $expense_walletRow['balance']; ?></td>
                    <td><?= $expense_walletRow['payment_type']; ?></td>
                    <td>$<?= $expense_walletRow['status']; ?></td>
                    <td><?= $expense_walletRow['created_at']; ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
        </div>

          <div id="CW" class="tab-pane fade">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Referral Balance</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
								<?php foreach($credit_wallet as $credit_walletRow): ?>
                  <tr>
                    <td><?= $credit_walletRow['referral_balance']; ?></td>
                    <td><?= $credit_walletRow['status']; ?></td>
                    <td>$<?= $credit_walletRow['created_at']; ?></td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>    
        </div>
        <div id="LWH" class="tab-pane fade">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Username</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>John DOe</td>    
                    <td>$152.00</td>
                    <td>Pending</td>
                    <td>04.12.2021</td>
                  </tr>
                  
                </tbody>
              </table>    
        </div>

          <div id="PH" class="tab-pane fade">
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Order ID</th>
                    <th>Amount</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>#21235799</td>
                    <td>$152.00</td>
                    <td>04.12.2021</td>
                  </tr>
                  
                </tbody>
              </table>
        </div>
        </div>
      </div>
</div>
    

