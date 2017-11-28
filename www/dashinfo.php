<?php
session_start();
if(empty($_SESSION['email'])){
  header("location:/");
}
require_once("functions.php");
$email = $_SESSION['email'];
$page = 'Account Info';
include_once("header.html");
include_once("top_bar.php");
$company = $_SESSION['company'];
$record = $_GET['record'];
$data = dashinfo($conn,$company,$record);
?>
<div style='padding-top:1em;' class='container'>
<div class='panel panel-primary'>
  <div class='panel-body'>
<form method='post'>
<table style='color:#000000;background-color:#FFFFFF;' class='table'>

<?php
 foreach( $data as $col => $value ){
   echo"<tr><td>$col</td><td>$value</td></tr>";
 }

 ?>
</table>
<div id='save_button'>
  <button class='btn btn-danger'>Update</button>
</div>
  <a class='btn btn-info' href='main.php'>Cancel</a>
</form>
</div>
</div>
</div>
<script>
$("#pass").hide();
$("#save_button").hide();
$("#change").click(function(){
  $("#pass").show();
  $("#save_button").show();
  $("#change").hide();
 });
</script>
