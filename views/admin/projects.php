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
               
            <h3 class="p-3 bg-white mb-3">Project Plans</h3>
                <div class="text-end">
            <a href="admin/projects/add"><button type="button" class="btn btn-primary mb-3">Add Project</button></a> 
            </div>
            <div class="card">
                
                <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>S/N</th>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Min Invest</th>
                        <th>Max Invest</th>
                        <th>Return Duration</th>
                        <th>Profit Range</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $num = 1;
                        if (isset($_SESSION['id'])) {
                            $user_id = $_SESSION['id'];
                        }
                        $sql = $conn->query("SELECT * FROM projects WHERE 1 ");
                        if (mysqli_num_rows($sql) < 1) {
                            ?>
                            <tr class="text-warning fw-bold"><td>No Row found</td> </tr>
                        <?php
                            
                        }else{
                            while ($row = mysqli_fetch_assoc($sql)) {
                               ?>
                               <tr>
                      <td><?= $num ?></td>
                      <td><img src="../uploads/projects/<?= $row['thumbnail'] ?>" alt="" width="150"></td>
                      <div>
                        <td><?= $row['title'] ?></td></div>
                        <td><?= $row['min-invest'] ?></td>
                        <td><?= $row['max-invest'] ?></td>
                        <td><?= $row['duration'] ?></td>
                        <td><span class="badge bg-label-primary me-1"><?= $row['profit'] ?>%</span></td>
                        <td>
                          <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                              <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                              <a class="dropdown-item" href="admin/projects/edit?proId=<?= $row['id'] ?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                              <a class="dropdown-item" href="admin/projects/delete?deleteId=<?= $row['id'] ?>"
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
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Min Invest</th>
                        <th>Max Invest</th>
                        <th>Return Duration</th>
                        <th>Profit Range</th>
                        <th>Actions</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>

            </div>
            



    <!-- Footer -->
    <?php include "partials/footer.php" ?>
            <!-- / Footer -->
