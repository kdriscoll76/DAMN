<?php
 include_once("../functions.php");
 $api = $_GET['api'];
 $key_check = check_api($api,$conn);
 $company = $key_check['company'];
 if(isset($company)){
  $data = $_GET;
  var_dump( create($data,$conn,$company));
 }else{
  echo "PassKey Failed!";
 }
?>
