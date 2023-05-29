<?php 
require "../database/database.php";
require_once "SendEmailController.php";
use PHPMailer\PHPMailer\PHPMailer;


if(isset($_POST['register'])){
    $select = $_POST['select'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $confirmpass = $_POST['confirm_pass'];
    $terms =  $_POST['terms'];
    $role = $_POST['role'];
    $token = bin2hex(random_bytes(50)); // generate unique token
    $phpmailer = new PHPMailer();
    

    // input sanitize
    $firstname = filter_var($firstname, FILTER_SANITIZE_STRING);
    $lastname = filter_var($lastname, FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING);
    $confirmpass = filter_var($confirmpass, FILTER_SANITIZE_STRING);
    

    if (!empty($firstname) && !empty($email) && !empty($pass) && !empty($confirmpass)) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email address";
        }
        if(strlen($pass) < 8){
            $errors['pass'] = "Password must be 8 characters";
        }else{
            $pass = password_hash($pass, PASSWORD_DEFAULT);
        }
        if(password_verify($confirmpass, $pass)){
           
        }else{
            $errors['confirmpass'] = "Password must match";
        }
        if (!isset($_POST['terms'])) {
            $errors['terms'] = 'You must agree to the terms and conditions';
        }

        $sql = $conn->query("SELECT * FROM user WHERE email = '$email'");
        if (mysqli_num_rows($sql) > 0) {
            $errors['email'] = "Email address already exists";
        }
       // If there are no errors, insert the user information into the database
    if (empty($errors)) {
        $stmt = $conn->prepare("INSERT INTO user (account_type, firstname, lastname, email, `password`, `role`, `token`) VALUES (?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssss", $select, $firstname, $lastname, $email, $pass, $role, $token);
        $result = $stmt->execute();

        if ($result) {
            sendVerificationCode($phpmailer, $email, $token);
            $_SESSION['registration_success'] = true;
           
            header("Location: /login");
            exit();
        }

    }
    }else{
        $errors['empty'] = "Field must not be empty";
    }
    if (!empty($errors)) {
        $_SESSION['form_data'] = $_POST;
        $_SESSION['errors'] = $errors;
            header("Location: /registration" );
    exit();
    }
} //End Method


if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
     // Sanitize the input data
     $email = filter_var($email, FILTER_SANITIZE_EMAIL);
     $pass = filter_var($pass, FILTER_SANITIZE_STRING);
 
     // Validate the input data
     $errors = array();
     if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $errors['email'] = 'Please enter a valid email address';
     }
     if (empty($pass) || strlen($pass) < 8) {
         $errors['pass'] = 'Please enter a password with at least 8 characters';
     }
 
     // Query the database to retrieve the user record
     $sql = $conn->query("SELECT * FROM user WHERE email = '$email'");
     $user = mysqli_fetch_assoc($sql);
 
     // Verify the password
     if (empty($errors)) {
     if ($user && password_verify($pass, $user['password']) && $user['role'] === 'user') {

        if ($user['verified'] == 0) {
            $_SESSION['not_verified'] = true;
            header('Location: /login');
            exit();
        }
            // Password is correct, create a session for the user
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['firstname'];
            $_SESSION['user_email'] = $user['email'];
            // Redirect to home page or other protected content
            header('Location: /users/dashboard');
            exit;

        
    //  }elseif ($user && password_verify($pass, $user['password']) && $user['role'] === 'admin') {
    //     // $_SESSION['user_name'] = $user['name'];
    //     $_SESSION['id'] = $user['id'];
    //     $_SESSION['user_email'] = $user['email'];
        
    //     header('Location: /admin/dashboard');
    //     exit;
     } else {
         // Password is incorrect or user does not exist, display an error message
         $errors['login'] = 'Invalid email or password';
     }
    }
     // Display any validation errors or login errors
     if (!empty($errors)) {
        $_SESSION['form_data'] = $_POST;
         $_SESSION['errors'] = $errors;
        //  $redirect_url = "/login";
            // $current_url = "http://$_SERVER[HTTP_HOST]";
            // $redirect = $current_url . $redirect_url;
            header("Location: /login");
         exit;
     }
 
}  //End Method

if(isset($_POST['adminlogin'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
     // Sanitize the input data
     $email = filter_var($email, FILTER_SANITIZE_EMAIL);
     $pass = filter_var($pass, FILTER_SANITIZE_STRING);
 
     // Validate the input data
     $errors = array();
     if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $errors['email'] = 'Please enter a valid email address';
     }
     if (empty($pass) || strlen($pass) < 8) {
         $errors['pass'] = 'Please enter a password with at least 8 characters';
     }
 
     // Query the database to retrieve the user record
     $sql = $conn->query("SELECT * FROM user WHERE email = '$email'");
     $user = mysqli_fetch_assoc($sql);
 
     // Verify the password
     if (empty($errors)) {
    if ($user && password_verify($pass, $user['password']) && $user['role'] === 'admin') {
        $_SESSION['id'] = $user['id'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['user_email'] = $user['email'];
        // Redirect to admin dashboard
        header('Location: /admin/dashboard');
        exit;
     } else {
         // Password is incorrect or user does not exist, display an error message
         $errors['login'] = 'Invalid email or password';
     }
    }
     // Display any validation errors or login errors
     if (!empty($errors)) {
        $_SESSION['form_data'] = $_POST;
         $_SESSION['errors'] = $errors;
            header("Location: /admin/login" );
         exit;
     }
 
}  //End Method

