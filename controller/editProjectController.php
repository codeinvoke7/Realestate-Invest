<?php
// require "../database/database.php";

if (isset($_GET['proId'])) {
    $id = $_GET['proId'];

    $sql = $conn->query("SELECT * FROM projects WHERE id = $id");
    $row = mysqli_fetch_assoc($sql);
    // $_SESSION['data'] = $row;

    $dbtitle =  $row['title'];
    $dbinvestType =  $row['invest-type'];
    $dbminInvest =  $row['min-invest'];
    $dbmaxInvest =  $row['max-invest'];
    $dbcapital =  $row['capital-back'];
    $dbduration =  $row['duration'];
    $dbprofit =  $row['profit'];
    $dblocation =  $row['location'];
    $dbaddress =  $row['address'];
    $dbdescr =  $row['description'];
    $dbthumbnail =  $row['thumbnail'];
    $dbgallery =  $row['gallery'];

    if (isset($_POST['editProjects'])) {
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
    


    if (!empty($title) && !empty($investType) && !empty($minInvest) && !empty($maxInvest) && !empty($capital) && !empty($duration) && !empty($profit) && !empty($location) && !empty($address) && !empty($descr)) {
      
       
    if (empty($errors)) {
        $sql = $conn->query("UPDATE projects SET `title` = '$title', `invest-type` = '$investType', `min-invest` = '$minInvest', `max-invest` = '$maxInvest', `capital-back` = '$capital', `duration` = '$duration', `profit` = '$profit', `location` = '$location', `address` = '$address',`description` = '$descr'  WHERE id = $id");
    }
    if ($sql) {
        echo "<script>alert('Plan successfully updated')</script>";
        header("Location: /admin/projects");
    }


    }else{
        $errors['error'] = "Kindly fill all inputs";
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: /admin/projects/edit?proId=$id");
        exit();
    }
    }
    
    
    if (isset($_POST['editImage'])) {
        $thumbnail = $_FILES['thumbnail']['name'];
        $thumbnail_tmp = $_FILES['thumbnail']['tmp_name'];
        $gallery = $_FILES['gallery'];
        
        if (!empty($thumbnail) && !empty($thumbnail_tmp) && !empty($gallery['name'][0])) {
            move_uploaded_file($thumbnail_tmp, "./uploads/projects/$thumbnail");
            $gallery_files = array();
            for ($i = 0; $i < count($gallery['name']); $i++) {
                $gallery_name = $gallery['name'][$i];
                $gallery_tmp = $gallery['tmp_name'][$i];
                move_uploaded_file($gallery_tmp, "./uploads/projects/$gallery_name");
                $gallery_files[] = $gallery_name;
            }
    
            $stmt = $conn->prepare("UPDATE projects SET `thumbnail` = ?, `gallery` = ? WHERE id = ?");
            $stmt->bind_param("ssi", $thumbnail, json_encode($gallery_files), $id);
            $result = $stmt->execute();
            if ($result) {
                echo "<script>alert('Images successfully updated')</script>";
                header("Location: /admin/projects");    
                exit();
            } else {
                $errors['image'] = "Failed to update images";
            }
        } else {
            $errors['image'] = "Image and gallery files must not be empty";
        }
    
        if (!empty($errors)) {
            $_SESSION['errors'] = $errors;
            header("Location: /admin/projects/edit?proId=$id");
            exit();
        }
    }
    
}

?>