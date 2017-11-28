<?php
session_start();
if(empty($_SESSION['email'])){
  echo '<script>window.location.href = "index.php";</script>';
  exit();
};
require_once('functions.php');
$output = array(
 'dashname' => $_POST['dashname'],
 'description' => $_POST['description'],
 'company' => $_SESSION['company'],
 'organisation' => $_SESSION['organisation'],
 'created_by' => $_SESSION['username']
);

for($r=1;$r < 10;$r++){
 $boxid = "box".$r."_";
 if($_POST[$boxid][0] != null ){
 $output["box$r"] = json_encode( array(
         'box' => $_POST[$boxid][0],
         'filter' => str_replace(',','|',$_POST[$boxid][1])
       ));
  }
 };

 create_dash($output,$conn,$company,$organisation);
 echo '<script>window.location.href = "main.php";</script>';
 exit();
 ?>
