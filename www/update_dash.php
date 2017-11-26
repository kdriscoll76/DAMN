<?php
session_start();
if(empty($_SESSION['email'])){
  echo '<script>window.location.href = "index.php";</script>';
  exit();
};
var_dump($_POST);
echo "<hr/>";
for($r=1;$r < 10;$r++){
 $boxid = "box".$r."_";
 $box = array(
         'box' => $_POST[$boxid][0],
         'filter' => $_POST[$boxid][1],
       );
 };
 $dashname = $_POST['dashname'];
 $description = $_POST['description'];
 var_dump( json_encode($box) );
 echo "<hr/>";
 ?>
