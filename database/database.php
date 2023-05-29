<?php
session_start();
$servername = 'localhost';
$username = 'realestate_db';
$password = 'TRjChFHycgskOC6[';
$dbname = 'realestate_db';

$conn = mysqli_connect($servername, $username, $password, $dbname );

// if(!$conn){
//     die('Connection failed:' . $conn->connect_error);
// }
// echo "Connection successful";