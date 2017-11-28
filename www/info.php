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
$organisation = $_SESSION['organisation'];
$record = $_GET['record'];
if(isset($_POST['notes'])){
  $notes = $_POST['notes'];
  update_note($record,$conn,$notes);
  echo "<script>window.location.href = 'info.php?record=$record';</script>";
  exit();
}
$page = 'Alert Details';
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
       $filter = '/created_by|notes/';
       if(!preg_match($filter,$key)){
        echo "<tr><td>".strtoupper($key)."</td><td>$value</td></tr>";
       }
     }
     ?>
     <form method='post'>
     <tr>
     <td colspan='2'>NOTES:<br/>
     <textarea name='notes' style='width:100%;' value='<?php echo $data['notes']; ?>'><?php echo $data['notes']; ?></textarea></td>
     </tr>
   </table>
   <button class='btn btn-success' type='submit'>Update</button>
 </form>
    <a class='btn btn-danger' href='delete.php?record=<?php echo $record;?>'>Delete</a>
    <a class='btn btn-info' href='main.php'>Cancel</a>
  </div>
 </div>
</div>
