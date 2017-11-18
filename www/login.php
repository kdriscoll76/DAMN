<?php 
session_start();
include_once('functions.php');
// - Login Info
$username = $_POST['username'];
$password = md5($_POST['password']);
$field = check($username,$password,$conn);
if(isset($field)){
 $_SESSION['email'] = $field['email'];
 $_SESSION['role'] = $field['role'];
 $_SESSION['company'] = $field['company'];
 $_SESSION['organisation'] = $field['organisation'];
 header("location:main.php");
 }else{
   header("location:/?error=1");
 }
unset($_POST);
unset($field);
?>
