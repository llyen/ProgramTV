<?php

class User {
    
    private function __construct(){}
    
    public static function authUser(Settings $settings, Database $database, $post){
        $query = $database->dbh->query('select login, password from user');
        $user = $query->fetch();
        if($post['login'] == $user['login'] && sha1(md5($post['password'].$settings->param['auth']['salt'])) == $user['password']){
            return true;
        }
        return false;
    }
    
    public static function logout(){
        $_SESSION['admin'] = 'false';
    }
    
}