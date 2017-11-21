<?php
 include_once("functions.php");
  $obj = json_decode($_GET['json'],ture);
  $api = $obj['api'];
  $key_check = check_api($api,$conn);
  if(isset($key_check)){
   $company = $key_check['company'];
   create($obj,$conn,$company);
  }else{
   echo "Invalid Key";
  }
 exit();
?>
