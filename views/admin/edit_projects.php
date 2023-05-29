<?php
include "partials/headtags.php";

// unset($_SESSION['form_data']);
require "controller/editProjectController.php";
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : array();
unset($_SESSION['errors']);

?>


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

                <div class="card mb-4">
                    <div class="card-body">

                        <?php if (!empty($errors['error'])) echo '<p style="color:red"> * ' . $errors['error'] . '</p>'; ?>
                      <form action="" method="post"  id="myForm" enctype="multipart/form-data">
                        <div class="mb-3">
                          <label class="form-label" for="title">Title</label>
                          <input type="text" class="form-control" id="title" name="title" placeholder="Project title"
                          value="<?= $dbtitle ?>">
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for="invest-type">Investment Type</label>
                        <select class="form-select" id="invest-type" name="invest-type" aria-label="Default select example">
                          <option selected="<?= $dbinvestType ?>">-Select-</option>
                          <option value="yes" <?= $dbinvestType == 'yes' ? 'selected' : ''  ?>>Yes</option>
                          <option value="no" <?= $dbinvestType == 'no' ? 'selected' : ''  ?>>No</option>
                        </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="min-invest">Minimum Investment</label>
                          <input type="number" class="form-control" id="min-invest" name="min-invest" placeholder="Minimum Investment Amount"
                          value="<?= $dbminInvest ?>">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="max-invest">Maximum Investment</label>
                          <input type="number" class="form-control" id="max-invest" name="max-invest" placeholder="Maximum Investment Amount"
                          value="<?= $dbmaxInvest ?>">
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for="capital">Capital Back</label>
                        <select class="form-select" id="capital" name="capital-back" aria-label="Default select example">
                          <option selected="">-Select-</option>
                          <option value="yes" <?= $dbcapital == 'yes' ? 'selected' : ''  ?>>Yes</option>
                          <option value="no" <?= $dbcapital == 'no' ? 'selected' : ''  ?>>No</option>
                        </select>
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for="duration">Period Duration</label>
                        <select class="form-select" id="duration" name="duration" aria-label="Default select example">
                          <option selected="">-Select-</option>
                          <option value="monthly" <?= $dbduration == 'monthly' ? 'selected' : ''  ?>>Monthly</option>
                          <option value="yearly" <?= $dbduration == 'yearly' ? 'selected' : ''  ?>>Yearly</option>
                        </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="profit">Profit Range</label>
                          <input type="number" id="profit" class="form-control" name="profit" placeholder="In percentage or fixed"
                          value="<?= $dbprofit ?>">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="location">Location</label>
                          <input type="text" id="location" class="form-control" name="location" placeholder="Location"
                          value="<?= $dblocation ?>">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="address">address</label>
                          <input type="text" id="address" class="form-control" name="address" placeholder="Address"
                          value="<?= $dbaddress ?>">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-message">Description</label>
                          <textarea id="basic-default-message" class="form-control" name="descr" placeholder="Project Description"><?= $dbdescr ?></textarea>
                        </div>

                      
                      <div class="d-grid gap-2 col-lg-12 mx-auto">
                        <button type="submit" class="btn btn-primary btn-md" name="editProjects">Update</button>
                        </div>
                      </form>
                      </div>
                  </div>

                  <div class="card mb-4">
                    <div class="card-body">

                        <?php if (!empty($errors['image'])) echo '<p style="color:red"> * ' . $errors['image'] . '</p>'; ?>
                      <form action="" method="post"  id="myForm" enctype="multipart/form-data">
                        

                        <div class="mb-3">
                        <label for="formFile" class="form-label">Thumbnail Image</label>
                        <input class="form-control" type="file" name="thumbnail" id="formFile" onchange="prevThumbnail(this);">
                        <div id="prev_thumbnail"></div>
                      </div>
                      <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Project Gallery Images</label>
                        <input class="form-control" type="file" id="formFileMultiple" name="gallery[]" multiple="" onchange="prevGallery(this);">
                        <div id="prev_gallery"></div>
                      </div>
                     
                        <button type="submit" class="btn btn-primary btn-md" name="editImage">Update</button>
                        
                      </form>
                      </div>
                  </div>

            </div>
    <!-- / container -->
   




<!-- Footer -->
<?php include "partials/footer.php" ?>
        <!-- / Footer -->