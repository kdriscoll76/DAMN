<?php
 session_start();
 if(empty($_SESSION['email'])){
   echo '<script>window.location.href = "index.php";</script>';
   exit();
 }
 require_once("header.html");
 require_once("functions.php");
 $email = $_SESSION['email'];
 $page = 'New Dashboard';
 require_once("top_bar.php");
?>
