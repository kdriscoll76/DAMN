<?php
$crumbs = explode("/",$_SERVER["REQUEST_URI"]);
foreach($crumbs as $crumb){
    $page = ucfirst(str_replace(array(".php","_"),array(""," "),$crumb) . ' ');
}
require("header.html");
?>
