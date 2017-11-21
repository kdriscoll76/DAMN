<?php
session_start();
if(empty($_SESSION['email'])){
  header("location:/");
}
require_once("functions.php");
$email = $_SESSION['email'];
$info = accinfo($email,$conn);
$page = 'Account Info';
include_once("header.html");
include_once("top_bar.php");
?>
<div style='padding-top:1em;' class='container'>
<table style='color:#000000;background-color:#FFFFFF;' class='table'>
 <?php
   foreach($info as $key => $value ){
     echo "<tr><td>".strtoupper($key)."</td><td>$value</td></tr>";
   }
  ?>
</table>
</div>
