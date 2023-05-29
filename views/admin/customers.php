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
        window.location.href = `admin/customers/delete?customerdelId=${itemId}`;
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
               
            <h3 class="p-3 bg-white mb-3">Investors</h3>
            <div class="card">
                
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                      <th>S/N</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Reg Date</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $num = 1;
                        if (isset($_SESSION['id'])) {
                            $user_id = $_SESSION['id'];
                        }
                        $sql = $conn->query("SELECT * FROM user WHERE `role` = 'user' ");
                        if (mysqli_num_rows($sql) < 1) {
                            ?>
                            <tr class="text-warning fw-bold"><td>No Row found</td> </tr>
                        <?php
                            
                        }else{
                            while ($row = mysqli_fetch_assoc($sql)) {
                               ?>
                               <tr>
                      <td><?= $num ?></td>
                      <div style="width: 30px !im">
                        <td><?= $row['firstname'] ?></td></div>
                        <td><?= $row['email'] ?></td>
                        <?php if($row['verified'] == '1'){
                            ?>
                        <td><button class="btn btn-primary btn-sm">Verified</button></td>
                        <?php
                        }else{
                            ?>
                            <td><button class="btn btn-danger btn-sm">Not_verified</button></td>
                            <?php
                        }  
                        ?>
                        <td><?= date('d M,Y', strtotime($row['created_at']))  ?></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="admin/projects/edit?proId=<?= $row['id'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="admin/customers/delete?customerdelId=<?= $row['id'] ?>"
                               onclick="event.preventDefault(); showConfirmationDialog('<?= $row['id'] ?>');"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                          </div>
                        </td>
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
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Reg Date</th>
                        
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>

            </div>
            



    <!-- Footer -->
    <?php include "partials/footer.php" ?>
            <!-- / Footer -->
