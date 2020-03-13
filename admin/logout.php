<?php
include 'public/header.php';
//session_start();
$username_session = $_SESSION["username"];
$query = mysqli_query($con,"UPDATE users SET online = 'no' WHERE username = '$username_session'");
session_destroy();
header('Location: ../index.php');



 ?>
