<?php
session_start();
require_once('header.html');
require_once('functions.php');
if(empty($_SESSION['email'])){
  echo '<script>window.location.href = "index.php";</script>';
  exit();
}
$email = $_SESSION['email'];
$company = $_SESSION['company'];
$record = $_GET['record'];
require_once('top_bar.php');
$data = info($conn,$company,$record);
?>
<div style='padding-top:50px;' class='container'>
<div class='panel panel-primary'>
 <div class='panel-heading'>
  <div class='panel-title'>
    <h1><?php echo $data['systemname']; ?></h1>
  </div>
 </div>
  <div class='panel-body text-info'>
    <table class='table table-bordered'>
    <?php
     foreach($data as $key => $value){
       $filter = '/created_by/';
       if(!preg_match($filter,$key)){
        echo "<tr><td>".strtoupper($key)."</td><td>$value</td></tr>";
       }
     }
     ?>
     <tr>
     <td colspan='2'>NOTES:<br/>
     <textarea style='width:100%;'></textarea></td>
     </tr>
   </table>
   <button class='btn btn-success' type='submit'>Update</button>
    <a class='btn btn-danger' href='#'>Delete</a>
  </div>
 </div>
</div>
