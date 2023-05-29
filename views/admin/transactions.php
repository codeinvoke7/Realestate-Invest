<?php
include "partials/headtags.php";
?>
            <script>
  function showConfirmationDialog(itemId) {
    swal({
      title: "Are you sure?",
      text: "Once deleted, you will not be able to recover this item!",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location.href = `admin/projects/delete?deleteId=${itemId}`;
      }
    });
  }
</script>


<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->
  <?php include "partials/sidebar.php" ?>
        
        <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->
          <?php include "partials/header.php" ?>

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
               
            <h3 class="p-3 bg-white mb-3">Transactions</h3>
               
            <div class="card">
                
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Ref</th>
                        <th>Plan</th>
                        <th>User</th>
                        <th>Amount</th>
                        <th>Total Share</th>
                        <th>Return Starting Date</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $num = 1;
                       
                        $sql = $conn->query("SELECT * FROM `transaction` WHERE 1 ");
                        if (mysqli_num_rows($sql) < 1) {
                            ?>
                            <tr class="text-warning fw-bold"><td>No Row found</td> </tr>
                        <?php
                            
                        }else{
                            while ($trans = mysqli_fetch_assoc($sql)) {
                                $usersql = $conn->query("SELECT * FROM user WHERE id = '{$trans['user_id']}'");
                                $user = mysqli_fetch_assoc($usersql);

                                $projectsql = $conn->query("SELECT * FROM projects WHERE id = '{$trans['project_id']}'");
                                $project = mysqli_fetch_assoc($projectsql);
                               ?>
                               <tr>
                      <td><?= $num ?></td>
                      <td><?= $trans['ref'] ?></td>
                      <div>
                        <td><?= $project['title'] ?></td></div>
                        <td><?= $user['email'] ?></td>
                        <td>$<?= $trans['amount'] ?></td>
                        <td><span class="badge bg-label-primary me-1"><?= $project['profit'] ?>%</span></td>
                        <td><?= date('d M, Y', strtotime( $trans['created_at'])) ?></td>
                        
                      </tr>
                      <?php
                      $num ++;
                            }
                        }
                      ?>
                      
                      
                      
                    </tbody>
                    <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>S/N</th>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Min Invest</th>
                        <th>Max Invest</th>
                        <th>Return Duration</th>
                        <th>Profit Range</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>

            </div>
            



    <!-- Footer -->
    <?php include "partials/footer.php" ?>
            <!-- / Footer -->
