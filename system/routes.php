<?php
$route = $_GET['r'];
//$module = $_GET['m'];

//$route = ($route == 'admin') ? 'admin/'.$module : 'main';
$route = ($route == '') ? 'main' : $route;
$route = file_exists('view/'.$route.'.php') ? $route : 'main';