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
if(isset($_POST['pass'][0])){
if( $_POST['pass'][0] == $_POST['pass'][1]){
  echo"<div class='alert alert-success'>
 <strong>Success!</strong> Password was changed!.
 </div>";
 $pass = md5($_POST['pass'][0]);
 update_acc($email,$pass,$conn);
}else{
  echo"<div class='alert alert-danger'>
    <strong>Danger!</strong> Passwords do not match!.
  </div>";
}}

?>
<div style='padding-top:1em;' class='container'>
<div class='panel panel-primary'>
  <div class='panel-body'>
<form method='post'>
<table style='color:#000000;background-color:#FFFFFF;' class='table'>
 <?php
  extract($info);
  echo"
   <tr><td>USERNAME</td><td>$username</td></tr>
   <tr><td>EMAIL</td><td>$email</td></tr>
   <tr><td>PASSWORD</td>";

   if(preg_match('/demo/',$email)){
   echo "<td class='text-danger'>Demo Account Password can not be changed.</td>";
   }else{
   echo "<td><button id='change' type='button' class='btn btn-success'>Change</button>";
   }
   echo"<div id='pass'>
   <input class='form-control' type='password' name='pass[]' placeholder='New Password'/>
   <input class='form-control' type='password' name='pass[]' placeholder='Again'/>

   </div>
   </td></tr>
   <tr><td>API</td><td>$api</td></tr>
   <tr><td>ROLE</td><td>$role</td></tr>
   <tr><td>COMPANY</td><td>$company</td></tr>
   <tr><td>ORGANISATION</td><td>$organisation</td></tr>
   <tr><td>CREATED</td><td>$created</td></tr>
  ";
  ?>
</table>
<div id='save_button'>
  <button class='btn btn-danger'>Update</button>
  <a class='btn btn-info' href='main.php'>Cancel</a>
</div>
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
