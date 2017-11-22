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
require('header.html');
$data = view($conn,$company);
include_once("top_bar.php");
?>
<div style='padding-top:50px;' class='container'>
 <div class='panel panel-primary'>
   <div class='panel-heading'>System Alerts</div>
   <div class='panel-body table-responsive'>
    <table id='mytable1' class='table'>
      <thead>
        <tr>
          <th></th>
          <th>RECORD</th>
          <th>SYSTEMNAME</th>
          <th>MESSAGE</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($data as $key => $value ){
          echo"<tr><td><a class='btn btn-success' href='info.php?record=".$value['record']."'>Info</a></td>";
          echo"<td>".$value['record']."</td>";
          echo"<td>".$value['systemname']."</td>";
          echo"<td>".$value['message']."</td>";
          echo"</tr>";
        }
         ?>
      </tbody>
    </table>
   </div>
 </div>
</div>
<div style='padding-top:10px;' class='container'>
 <div class='panel panel-primary'>
   <div class='panel-heading'>My Dashboards</div>
   <div class='panel-body table-responsive'>
    <table id='mytable2' class='table'>
      <thead>
        <tr>
          <th>DASH</th><th>DESCRIPTION</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><a href='spg.php'>SPG</a></td><td>This is a single pane of glass overview.</td>
        </tr>
      </tbody>
    </table>
   </div>
 </div>
</div>
<!-- footer -->
<?php
 include('footer.php');
?>
