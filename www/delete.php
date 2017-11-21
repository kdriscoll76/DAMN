<?php
session_start();
if(empty($_SESSION['email'])){
  header("location:/");
}
$company = $_SESSION['company'];
require_once('functions.php');
$rec = $_GET['record'];
delete($rec,$conn,$company);
header("location:main.php");
?>
