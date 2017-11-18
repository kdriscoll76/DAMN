<?php
 include_once("header.html");
 if(isset($_GET['error'])){
  echo"
   <div class='alert alert-danger alert-dismissable col-sm-4'>
   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
      <strong>Warning!</strong> Login failed
   </div>";
  unset($_GET['error']);
 }
?>
<head>
 <title>DAMN</title>
</head>
<body style='background-color:#000000;'>
<div class='container'>
<div style='margin-top:5%;' class='panel panel-primary col-sm-offset-3 col-xs-12 col-sm-6'>
<div class='panel-heading'><h1>KJDTOOLBOX</h1></div>
<div class='panel-body'>
<form action='login.php' method='post'>
 <div>
  <label>NAME</label>
  <input class='form-control' type='text' name='username' />
  <label>PASSWORD</label>
  <input class='form-control' type='password' name='password' />
  <br/>
  <div>
   <button type='submit' class='btn btn-primary'>Login</button>
  </div>
 </div>
</form>
</div>
</div>
</div>
</body>
