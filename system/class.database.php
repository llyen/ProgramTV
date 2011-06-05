<?php

class Database {
    
    private $dbh;
    
    public function __construct(Settings $settings){
        $this->dbh = new PDO('mysql:host='.$settings->params['db']['host'].';dbname='.$settings->params['db']['name'], $settings->params['db']['user'], $settings->params['db']['pass']);
    }
    
    public function execQuery($query){
        return $this->dbh->exec($query);
    }
    
}