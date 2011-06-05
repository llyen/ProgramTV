<?php

class Settings {
    
    private $path;
    private $params = array();
    
    public function __construct($path = 'settings.ini'){
        $this->path = $path;
        $this->parse();
    }
    
    public function __get($var){
        return $this->$var;
    }
    
    public function __set($var, $value){
        $this->$var = $value;
    }
    
    private function parse(){
        $this->params = parse_ini_file($this->path, true);
    }
    
}