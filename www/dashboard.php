<?php
session_start();
if(empty($_SESSION['email'])){
  echo '<script>window.location.href = "index.php";</script>';
  exit();
};
$dashname = $_GET['dashname'];
include_once('functions.php');
$email = $_SESSION['email'];
$company = $_SESSION['company'];
$organisation = $_SESSION['organisation'];
$page = 'Dashboad';
$now = time();
$filename = basename($_SERVER['PHP_SELF']);
require_once('header.html');
$data = view($conn,$company);
?>
<head>
<meta http-equiv="refresh" content="30">
<title><?php echo $dashname;?></title>
</head>
<div style='color:#FFFFFF;' class='text-center'>
 <h1><?php echo strtoupper($company)." - ".strtoupper($dashname);?></h1>
 <p>Time: <?php echo date("c");?></p>
</div>
<div style='padding-top:50px;' class='container'>
<div class='col-xs-12'>
<?php
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
 if($key != NULL ){
 if($key == 'error'){
   $status = 'btn-info';
 }elseif($key == 'warning'){
   $status = 'btn-warning';
 }elseif($key == 'critical'){
   $status = 'btn-danger';
 }else{
   $status = 'btn-primary';
 }
echo "<span class='col-xs-12 col-md-3'><button  class='widget btn $status btn-lg  '><h2>".strtoupper($key)."</h2>
       <div style='font-size:2em;'>$value</div>
     </button></span>";
 }
}
?>
<span class='col-xs-12 col-md-3'>
<a class='widget btn btn-primary btn-lg' href="http://www.kjdtoolbox.kjdhosting.com/main.php">
<h2>HOME</h2>
<i style="color:#000000;font-size:2em;" class="glyphicon glyphicon-home"></i></a>
</span>
</div>
</div>
<?php
 include('footer.php');
?>
