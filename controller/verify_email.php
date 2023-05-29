<?php

require "./database/database.php";

if (isset($_GET['token'])) {
   $token = $_GET['token'];

   $sql = $conn->query("SELECT * FROM user WHERE token = '$token'");

   if (mysqli_num_rows($sql) > 0) {
    $sql = $conn->query("UPDATE user SET verified=1 WHERE token = '$token'");
    $_SESSION['verified'] = true;
    header('Location: /login');
   }
}