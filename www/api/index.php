<?php
 include_once("functions.php");
  //$json = urldecode($_GET['json']);
  $data = json_decode(file_get_contents("php://input"),true);
  $api = $data['api'];
  $key_check = check_api($api,$conn);
  if(isset($key_check)){
   $company = $key_check['company'];
   $organisation = $key_check['organisation'];
   unset($data['api']);
   $data['created_by'] = $api;
   create($data,$conn,$company,$organisation);
   echo "Alert Added";
  }else{
   echo "Invalid Key";
  }
 exit();
?>
