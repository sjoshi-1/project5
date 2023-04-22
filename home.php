<?php
 require('header.php');
 // If they're not logged in, redirect them
 session_start();
 if (!$_SESSION['user']) {
   $_SESSION['errors'][] = "You must log in.";
   header("Location: login.php");
   exit();
 }

 // Assign the user
 $user = $_SESSION['user'];
?>
<h1>Welcome to home page!!</h1>
