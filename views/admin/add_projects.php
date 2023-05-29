<?php
include "partials/headtags.php";
$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : array();
$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : array();
unset($_SESSION['errors']);
unset($_SESSION['form_data']);

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
                    <!-- <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Basic Layout</h5>
                        <small class="text-muted float-end">Default label</small>
                    </div> -->
                    <div class="card-body">

                        <?php if (!empty($errors['error'])) echo '<p style="color:red"> * ' . $errors['error'] . '</p>'; ?>
                      <form action="controller/addProjectController.php" method="post"  id="myForm" enctype="multipart/form-data">
                        <div class="mb-3">
                          <label class="form-label" for="title">Title</label>
                          <input type="text" class="form-control" id="title" name="title" placeholder="Project title"
                          value="<?= isset($form_data['title']) ? $form_data['title'] : '' ?>">
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for="invest-type">Investment Type</label>
                        <select class="form-select" id="invest-type" name="invest-type" aria-label="Default select example">
                          <option selected="">-Select-</option>
                          <option value="yes" <?= isset($form_data['invest-type']) && $form_data['invest-type'] == 'yes' ? 'selected' : '' ?>>Yes</option>
                          <option value="no" <?= isset($form_data['invest-type']) && $form_data['invest-type'] == 'no' ? 'selected' : '' ?>>No</option>
                        </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="min-invest">Minimum Investment</label>
                          <input type="number" class="form-control" id="min-invest" name="min-invest" placeholder="Minimum Investment Amount"
                          value="<?= isset($form_data['min-invest']) ? $form_data['min-invest'] : '' ?>">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="max-invest">Maximum Investment</label>
                          <input type="number" class="form-control" id="max-invest" name="max-invest" placeholder="Maximum Investment Amount"
                          value="<?= isset($form_data['max-invest']) ? $form_data['max-invest'] : '' ?>">
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for="capital">Capital Back</label>
                        <select class="form-select" id="capital" name="capital-back" aria-label="Default select example">
                          <option selected="">-Select-</option>
                          <option value="yes" <?= isset($form_data['capital-back']) && $form_data['capital-back'] == 'yes' ? 'selected' : '' ?>>Yes</option>
                          <option value="no" <?= isset($form_data['capital-back']) && $form_data['capital-back'] == 'no' ? 'selected' : '' ?>>No</option>
                        </select>
                        </div>
                        <div class="mb-3">
                        <label class="form-label" for="duration">Period Duration</label>
                        <select class="form-select" id="duration" name="duration" aria-label="Default select example">
                          <option selected="">-Select-</option>
                          <option value="monthly" <?= isset($form_data['duration']) && $form_data['duration'] == 'monthly' ? 'selected' : '' ?>>Monthly</option>
                          <option value="yearly" <?= isset($form_data['duration']) && $form_data['duration'] == 'yearly' ? 'selected' : '' ?>>Yearly</option>
                        </select>
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="profit">Profit Range</label>
                          <input type="number" id="profit" class="form-control" name="profit" placeholder="In percentage or fixed"
                          value="<?= isset($form_data['profit']) ? $form_data['profit'] : '' ?>">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="location">Location</label>
                          <input type="text" id="location" class="form-control" name="location" placeholder="Location"
                          value="<?= isset($form_data['location']) ? $form_data['location'] : '' ?>">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="address">address</label>
                          <input type="text" id="address" class="form-control" name="address" placeholder="Address"
                          value="<?= isset($form_data['address']) ? $form_data['address'] : '' ?>">
                        </div>
                        <div class="mb-3">
                          <label class="form-label" for="basic-default-message">Description</label>
                          <textarea id="basic-default-message" class="form-control" name="descr" placeholder="Project Description"><?= isset($form_data['descr']) ? $form_data['descr'] : '' ?></textarea>
                        </div>

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
                      <div class="d-grid gap-2 col-lg-12 mx-auto">
                        <button type="submit" class="btn btn-primary btn-md" name="addProject">Save</button>
                        </div>
                      </form>
                      <?php
                // Clear the session variable
                // unset($_SESSION['errors']);
                ?>
                    </div>
                  </div>

            </div>
    <!-- / container -->
   




<!-- Footer -->
<?php include "partials/footer.php" ?>
        <!-- / Footer -->