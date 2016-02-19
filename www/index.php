<?php
$page = 'Home';
require_once('header.html');
?>
<div class='container'>
  <div class='row pre-scrollable'>
<?php
for($i = 1;$i < 10;$i++){
  print"<button style='margin:2px;' class='btn well btn-default col-xs-12 col-sm-4 col-lg-3'>$i DASHBOARD</button>";
}
?>
  </div>
</div>
