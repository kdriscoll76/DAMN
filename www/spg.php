<?php
session_start();
if(empty($_SESSION['email'])){
 header("location:index.php");
};
include_once('functions.php');
$email = $_SESSION['email'];
$company = $_SESSION['company'];
$page = 'Home';
$now = time();
$filename = basename($_SERVER['PHP_SELF']);
require_once('header.html');
$data = view($conn,$company);
?>

<div style='color:#FFFFFF;' class='text-center'>
 <h1><?php echo strtoupper($company);?></h1>
 <p>Time: <?php echo date("c");?></p>
</div>
<div style='padding-top:50px;' class='container'>
<div class='row-fluid'>
<?php
 foreach($data as $value){
 if($value['system'] != $system ){
 $epoch = strtotime($value['updated']);   
 if((($now - $epoch)/60 %60) <= 15 ){
     $status = 'btn-success'; 
 }else{
     $status = 'btn-warning';
 }
   echo "<button class='widget btn $status btn-lg'><h2>".strtoupper($value['system'])."</h2>
          CPU: ".round($value['cpu'])."%
          <br/>
          MEM: ".round($value['mem'])."%
          <br/>
          DISK: ".round($value['disk'])."%
          <p>".date("H:i:s",$epoch)."</p>
        </button>";
  }
   $system = $value['system'];
 }
?>
</div>
</div>
<?php
 include('footer.php');
?>
