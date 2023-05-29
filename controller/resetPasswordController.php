<?php 
require "../database/database.php";


if(isset($_POST['reset_password'])){
    $email = $_POST['email'];
    $newpass = $_POST['new_password'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $newpass = filter_var($newpass, FILTER_SANITIZE_STRING);

    if (!empty($email) && !empty($newpass)) {
       if (strlen($newpass)  < 8) {
        $errors['newpass'] = "Password must be atleast 8 characters";
       }else{
        $newpass = password_hash($newpass, PASSWORD_DEFAULT);
       }
       $sql = $conn->query("SELECT * FROM user WHERE email = '$email'");
       if (empty($errors)) {
        if (mysqli_num_rows($sql) > 0) {
            # code...
            $sql = $conn->query("UPDATE user SET `password` = '$newpass'");
            $_SESSION['passupdated'] = true;
            header("Location: /login");
            exit();
        }else{
        $errors['email'] = "Email not found";
       }
       }
    }else{
        $errors['fieldempty'] = "Fields must not be empty";
    }
    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location: /reset-password");
    }
}