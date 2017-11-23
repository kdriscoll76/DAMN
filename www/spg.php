<?php
session_start();
if(empty($_SESSION['email'])){
  echo '<script>window.location.href = "index.php";</script>';
  exit();
};
include_once('functions.php');
$email = $_SESSION['email'];
$company = $_SESSION['company'];
$organisation = $_SESSION['organisation'];
$page = 'Home';
$now = time();
$filename = basename($_SERVER['PHP_SELF']);
require_once('header.html');
$data = view($conn,$company);
?>
<head>
<meta http-equiv="refresh" content="30">
<title><?php echo $company;?>Dashboard</title>
</head>
<div style='color:#FFFFFF;' class='text-center'>
 <h1><?php echo strtoupper($company)." - ".strtoupper($organisation);?></h1>
 <p>Time: <?php echo date("c");?></p>
</div>
<div style='padding-top:50px;' class='container'>
<div class='row-fluid'>
<?php
$dashname = 'overview';
$dashdata = dashboards($conn,$company,$dashname);
 for($c = 1;$c < 10;$c++){
  $box = "box$c";
  foreach( $dashdata as $json ){
    $obj = json_decode($json[$box]);
    $b = $obj->box;
    $f = $obj->filter;
    $filters[$b] = $f;
 }
}

foreach($data as $value){
 foreach($filters as $filter => $text ){
  if( preg_match("/$text/i", $value[message])){
    $$filter++;
   }
 }
 $total++;
};

 $boxes['total'] = $total ?:0;

foreach( $filters as $boxname => $text ){
  $boxes[$boxname] = $$boxname ?:0;
}

foreach($boxes as $key => $value){
 if($key == 'error'){
   $status = 'btn-info';
 }elseif($key == 'warning'){
   $status = 'btn-warning';
 }elseif($key == 'critical'){
   $status = 'btn-danger';
 }else{
   $status = 'btn-primary';
 }
echo "<button class='widget btn $status btn-lg'><h2>".strtoupper($key)."</h2>
       <p style='font-size:2em;'>$value</p>
     </button>";
}
?>
</div>
</div>
<?php
 include('footer.php');
?>
