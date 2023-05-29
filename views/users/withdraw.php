

    <!-- ==== dashboard header start ==== -->
    
    <!-- ==== #dashboard header end ==== -->
    <?php require "partials/header.php" ?>
    <!-- ==== dashboard section start ==== -->
    <div class="dashboard section__space__bottom">
        <div class="container">
            <div class="dashboard__area">
                <div class="row">
                      <!-- ==== dashboard sidebarstart ==== -->
              <?php require "partials/sidebar.php" ?>
                    <!-- ==== #dashboard sidebar end ==== -->
                    <div class="col-xxl-9">
                        <div class="main__content">
                            <div class="collapse__sidebar">
                                <h4>Dashboard</h4>
                                <a href="javascript:void(0)" class="collapse__sidebar__btn">
                                    <i class="fa-solid fa-bars-staggered"></i>
                                </a>
                            </div>
                            <div class="main__content-dashboard">
                                <div class="breadcrumb-dashboard">
                                    <h5>Withdraw</h5>
                                    <div>
                                        <a href="/">Home</a>
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                        <a href="javascript:void(0)">Withdraw</a>
                                    </div>
                                </div>
                                <div class="withdraw-funds">
                                    <div class="withdraw-funds__inner">
                                        <h5>Withdraw Funds</h5>
                                        <p>Use the form below to withdraw from wallet instantly</p>
                                        <form action="controller/withdrawController" method="post">
                                            <div class="input input--secondary">
                                                <label for="withdrawAmount">Amount</label>
                                                <input type="number" name="withdraw_amount" id="withdrawAmount"
                                                    placeholder="Enter Amount to Withdraw" required="required" />
                                            </div>
                                            
                                            <div class="regi__type">
                                                <label for="methodSelect">Payment Method</label>
                                                <select class="type__selec" class="methodSelect">
                                                    <option value="method">Payment Method</option>
                                                    <option value="paypal" selected>Paypal</option>
                                                </select>
                                            </div>
                                            <div class="regi__type">
                                                <label for="methodSelect">Currency</label>
                                                <select class="type__select" id="methodSelect">
                                                    <option value="currency">Currency</option>
                                                    <option value="USD">USD</option>
                                                    <option value="NGN">NGN</option>
                                                </select>
                                            </div>
                                            <button type="submit" name="withdraw" class="button button--effect">Withdraw</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==== #dashboard section end ==== -->

    <!-- ==== footer section start ==== -->
    <?php require "partials/footer.php" ?>
    <!-- ==== #footer section end ==== -->

    