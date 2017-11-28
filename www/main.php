<?php
session_start();
if(empty($_SESSION['email'])){
  echo '<script>window.location.href = "index.php";</script>';
  exit();
};
include_once('functions.php');
$email = $_SESSION['email'];
$company = $_SESSION['company'];
$page = 'Home';
$now = time();
$filename = basename($_SERVER['PHP_SELF']);
require('header.html');
$data = view($conn,$company);
include_once("top_bar.php");
?>
<div style='padding-top:50px;' class='container'>
 <div class='panel panel-primary'>
   <div class='panel-heading'>Alerts</div>
   <div class='panel-body table-responsive'>
    <table id='mytable1' class='table'>
      <thead>
        <tr>
          <th></th>
          <th>SYSTEMNAME</th>
          <th>MESSAGE</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if(!empty($data)){
         foreach($data as $key => $value ){
          echo"<tr><td><a class='btn btn-success' href='info.php?record=".$value['record']."'>Details</a></td>";
          echo"<td>".$value['systemname']."</td>";
          echo"<td>".$value['message']."</td>";
          echo"</tr>";
         }
       }else{
         echo "<tr><td colspan='2'>NO DATA</td><tr>";
       }
         ?>
      </tbody>
    </table>
   </div>
 </div>
</div>
<div style='padding-top:10px;' class='container'>
 <div class='panel panel-primary'>
   <div class='panel-heading'>
     <div class='panel-title'>Dashboards</div>
     <a class='btn btn-info' href='new_dash.php'>New Dash</a>
   </div>
   <div class='panel-body table-responsive'>
    <table id='mytable2' class='table'>
      <thead>
        <tr>
          <th></th><th>DASH</th><th>DESCRIPTION</th>
        </tr>
      </thead>
      <tbody>
        <?php
          if(!empty($data)){
           $dash = dashlist($conn,$company);
          }
          foreach($dash as $dashboard ){
            $dashname = $dashboard['dashname'];
            if($dashname != null ){
            echo"<tr><td><a class='btn btn-success' href='dashinfo.php?record=".$dashboard['record']."'>Details</a></td>
            <td><a href='dashboard.php?dashname=$dashname'>$dashname</a></td><td>".$dashboard['description']."</td></tr>";
         }
       }
        ?>
      </tbody>
    </table>
   </div>
 </div>
</div>
<!-- footer -->
<?php
 include('footer.php');
?>
