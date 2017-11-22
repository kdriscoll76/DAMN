<?php
date_default_timezone_set('America/NewYork');
// - DATABASE
#############
# DB        /
# Conection /
# Info      /
#############
$obj = json_decode(file_get_contents('../../config/setup.json'));
$servername = $obj[0]->dbname;
$dbuser = $obj[0]->dbuser;
$dbpass = $obj[0]->dbpass;
$dbname = "kjdtooldb";
// Create connection
$conn = new mysqli($servername, $dbuser, $dbpass, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

############
# View   ///
############
function view($conn,$company){
 $sql="SELECT * FROM alerts WHERE company='".$company."' ORDER BY `system`,`updated` DESC";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
   while($row = $result->fetch_assoc()){
    $rows[] = $row;
   }
   return $rows;
 }
 $conn->close();
}
############
# Create ///
############
function create($data,$conn,$company,$organisation){
 extract($data);
 $values = "'$systemname','$company','$organisation','$message','$created_by'";
 $columns = 'systemname,company,organisation,massage,created_by';
 $sql="INSERT INTO alerts ($columns) VALUES ($values)";
 $result = $conn->query($sql);
 return $result;
 $conn->close();
}
############
# Remove ///
############
####################
# Check Accout   ///
####################
function check($username,$password,$conn){
 $sql="SELECT * FROM `accounts` Where username = '".$username."' AND password = '".$password."'";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
   return $result->fetch_assoc();
 }
$conn->close();
}
####################
# Check Key
###################
function check_api($api,$conn){
 $sql="SELECT * FROM accounts Where api = '".$api."' ";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
   return $result->fetch_assoc();
 }
$conn->close();
}
?>
