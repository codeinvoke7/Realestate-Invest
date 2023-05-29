

    <!-- ==== dashboard header start ==== -->
    <?php require "partials/header.php" ?>
    <!-- ==== #dashboard header end ==== -->

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
                                    <h5>Investments</h5>
                                    <div>
                                        <a href="/">Home</a>
                                        <i class="fa-solid fa-arrow-right-long"></i>
                                        <a href="javascript:void(0)">Investments</a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="investment-table">
                                            <div class="intro">
                                                <h5>Transactions</h5>
                                            </div>
                                            <div class="table-wrapper">
                                                <table>
                                                    <tr>
                                                        <th>Project</th>
                                                        <th>Amount Invested</th>
                                                        <th>Date Invested</th>
                                                    </tr>
                                                    <?php 
                                                   
                                                    if (isset($_SESSION['user_id'])) {
                                                       $user_id = $_SESSION['user_id'];
                                                    }
                                                  
                                                    $sql = $conn->query("SELECT * FROM `transaction` WHERE user_id = $user_id");
                                                    // $trans = mysqli_fetch_assoc($sql);
                                                    if (mysqli_num_rows($sql) < 0) {
                                                        ?>
                                                        <tr>No investment found</tr>
                                                        <?php
                                                    }else{
                                                        while ($trans = mysqli_fetch_assoc($sql)) {
                                            $projectsql = $conn->query("SELECT * FROM projects WHERE id = '{$trans['project_id']}'");
                                            $row = mysqli_fetch_assoc($projectsql)
                                                           ?>
                                                 
                                                    <tr>
                                                        <td>
                                                            <img src="../uploads/projects/<?= $row['thumbnail'] ?>" alt="Investment" />
                                                            <?= $row['title'] ?>
                                                        </td>
                                                        
                                                        <td><?= $trans['amount'] ?></td>
                                                        <td><?= date('d M, Y', strtotime($trans['created_at']))  ?></td>
                                                    </tr>
                                                    <?php 
                                                           }
                                                        }
                                                        ?>
                                                  
                                                   
                                                   
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="investment-sidebar">
                                            <div class="statistics">
                                                <h5>Statistics</h5>
                                                <hr />
                                                <div class="group">
                                                    <img src="assets/images/icons/wallet.png" alt="Wallet" />
                                                    <div>
                                                        <h4>€537,00</h4>
                                                        <p>Monthly Income</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="explore">
                                                <img src="assets/images/icons/explore.png" alt="Explore" />
                                                <div class="group">
                                                    <h6>Explore More</h6>
                                                    <p class="secondary">Investment opportunities</p>
                                                    <a href="registration.html"
                                                        class="button button--effect">Explore</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dashboard-single__box investment-single-box">
                                    <div class="intro">
                                        <h5 class="investo">Investment Chart</h5>
                                        <a href="#">Generate Report</a>
                                    </div>
                                    <div id="investmentChartTwo"></div>
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

   