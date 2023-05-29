<?php

require "./database/database.php";

if (isset($_GET['deleteId'])) {
   $id = $_GET['deleteId'];

   $sql = $conn->query("DELETE FROM projects WHERE id = $id");
   
   $_SESSION['delete-success'] = true;
   header("Location: /admin/projects");
   exit();

} // Delete Project method

if (isset($_GET['customerdelId'])) {
   $id = $_GET['customerdelId'];

   $sql = $conn->query("DELETE FROM user WHERE id = $id");
   
   $_SESSION['delete-success'] = true;
   header("Location: /admin/customers");
   exit();

} //Delet customer Method