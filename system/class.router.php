<?php

class Router {
    
    private function __construct(){}
    
    public function redirect($tplName='main', $params = array()){
        if(empty($params)) header("Location: $tplName.html");//header('Location: '.$_SERVER['SERVER_NAME'].str_replace('index.php', '', $_SERVER['SCRIPT_NAME']).$tplName.'.html');
        header("Location: $tplName.html");
    }
    
}