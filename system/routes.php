<?php

$route = $_GET['r'];

$route = ($route == '') ? 'main' : $route;
$route = file_exists('view/'.$route.'.php') ? $route : 'main';