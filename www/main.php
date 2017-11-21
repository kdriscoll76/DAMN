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
          <th>Admin</th>
          <?php
            foreach( array_keys( $data[0]) as $colum){
             if($colum != 'created_by'){
              echo"<th>".strtoupper($colum)."</th>";
             }
            }
          ?>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($data as $key => $value ){
          echo"<tr><td><a href='delete.php?record=".$value['record']."'>Delete</a></td>";
           unset($value['created_by']);
           foreach( $value as $field){
            echo"<td>$field</td>";
          }
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
