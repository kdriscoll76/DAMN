<?php
require_once("header.html");
require_once("functions.php");
if(isset($_POST['email'])){
 $email = $_POST['email'];
 new_acc($email,$conn);
 echo '<script>window.location.href = "index.php";</script>';
 exit();
}
?>
<div style='padding-top:2em;' class='container '>
  <div class='panel panel-primary col-xs-12 col-sm-6'>
    <div class='panel-heading'>
      <div class='panel-title'>Account Request</div>
    </div>
    <div class='panel-body'>
      <form method='post'>
            <label class='bold' >Email:</label>
            <input class='form-control' type='email' name='email' placeholder='user1@organization.com'/>
            <p>
              <i class='text-warning'>Please note your must use your company email address to gain access to that companies monitroing.</i>
            </p>
        <button class='btn btn-primary' type='submit' >Request</button>
      </form>
    </div>
  </div>
</div>
