<?php

require "../database/database.php";

$errors = array();

if (isset($_POST['addProject'])) {
    $title = $_POST['title'];
    $investType = $_POST['invest-type'];
    $minInvest = $_POST['min-invest'];
    $maxInvest = $_POST['max-invest'];
    $capital = $_POST['capital-back'];
    $duration = $_POST['duration'];
    $profit = $_POST['profit'];
    $location = $_POST['location'];
    $address = $_POST['address'];
    $descr = $_POST['descr'];
    $thumbnail = $_FILES['thumbnail']['name'];
    $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];
    $gallery = $_FILES['gallery'];

    if (isset($_SESSION['id'])) {
        $user_id = $_SESSION['id'];
    }

    if (!empty($title) && !empty($investType) && !empty($minInvest) && !empty($maxInvest) && !empty($capital) && !empty($duration) && !empty($profit) && !empty($location) && !empty($address) && !empty($descr) && !empty($thumbnail) && !empty($thumbnail_tmp) && !empty($gallery['name'][0])) {
        
        move_uploaded_file($thumbnail_tmp, "../uploads/projects/$thumbnail");
        $gallery_files = array();

        for ($i = 0; $i < count($gallery['name']); $i++) {
            $gallery_name = $gallery['name'][$i];
            $gallery_tmp = $gallery['tmp_name'][$i];
            // Process the uploaded file
            move_uploaded_file($gallery_tmp, "../uploads/projects/$gallery_name");
            $gallery_files[] = $gallery_name;
        }
        if (empty($errors)) {
            $stmt = $conn->prepare("INSERT INTO projects (user_id, title, `invest-type`, `min-invest`, `max-invest`, `capital-back`, `duration`, `profit`, `location`, `address`,`description`, `thumbnail`, `gallery`)VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stmt->bind_param('sssssssssssss', $user_id, $title, $investType, $minInvest, $maxInvest, $capital, $duration, $profit, $location, $address, $descr, $thumbnail, json_encode($gallery_files));
            $result = $stmt->execute();
            if ($result) {
                $_SESSION['project-success'] = true;
                header("Location: /admin/projects");
                exit();
            }
        }
    } else {
        $errors['error'] = "Kindly complete the empty fields";
        // $_SESSION['form_data'] = $_POST; // save form data in session
        // $_SESSION['errors'] = $errors;
        // header("Location: /admin/projects/add");
        // exit();
    }
    if (!empty($errors)) {
        $_SESSION['form_data'] = $_POST; // save form data in session
        $_SESSION['errors'] = $errors;
        header("Location: /admin/projects/add");
        exit();
    }
}

?>
