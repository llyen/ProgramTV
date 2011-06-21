<?php

class Router {
    
    private function __construct(){}
    
    public static function redirect($tplName='main', $params = array()){
        if(empty($params)) header("Location: $tplName");//header('Location: '.$_SERVER['SERVER_NAME'].str_replace('index.php', '', $_SERVER['SCRIPT_NAME']).$tplName.'.html');
        else header("Location: $tplName/".implode('/', $params)); //really needed?
    }
    
    public static function uri($tplName='main', $params = array()){
        if(empty($params)) return "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']."/$tplName";
        return "http://".$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME']."/$tplName/".implode('/', $params);
    }
    
}