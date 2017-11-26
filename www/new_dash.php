<?php
 session_start();
 if(empty($_SESSION['email'])){
   echo '<script>window.location.href = "index.php";</script>';
   exit();
 }
 require_once("header.html");
 require_once("functions.php");
 $email = $_SESSION['email'];
 $page = 'New Dashboard';
 require_once("top_bar.php");
?>
<div class='container'>
  <div class='panel panel-primary'>
    <div class='panel-heading'>
      <div class='panel-title'>New Dashboard</div>
    </div>
    <div class='panel-body'>
      <form action='update_dash.php' method='post'>
        <input type='hidden' name='type' value='new' />
        <label>Dashboard Name:</label>
        <input class='form-control' type='text' name='dashname' placeholder='Dashboard Name'/>
        <label>Description:</label>
        <textarea class='form-control' name='description'></textarea>
        <hr/>
        <b>Boxes</b>
        <hr/>
        <?php
          for($b=1;$b < 10;$b++){
            $box = "box$b";
            echo"<div style='border:solid 1px;padding:0.5em;'>
            <label>BOX$b:</label>
            <input class='form-control' type='text' name='$box.[]' />
            <label>Filter:</label>
            <input class='form-control' type='text' name='$box.[]' placeholder='Keywords separated by commas.' />
            </div>";
          };
         ?>
         <br/>
        <button class='btn btn-success' type='submit'>Save</button>
        <a class='btn btn-info' href='main.php'>Cancel</a>
      </form>
    </div>
  </div>
</div>
