<?php

class Category implements Module {
    
    private $database;
    
    public function __construct(Database $database){
        $this->database = $database->dbh;
    }
    
    public function get($id = ''){
        $query = empty($id) ? $this->database->query("select category_id, category_name from category") :  $this->database->query("select category_name from category where category_id=$id");
        return $query;
    }
    
    public function save($post){
        $categoryName = htmlspecialchars($post['category_name']);
        $query = $this->database->prepare("insert into category (category_name) values (?)");
        if($categoryName != '' && $query->execute(array($categoryName))) return true;
        return false;
    }
    
    public function update($post){
        $categoryId = $_POST['category_id'];
        $categoryName = htmlspecialchars($post['category_name']);
        $query = $this->database->prepare("update category set category_name=? where category_id=?");
        if($categoryName != '' && $query->execute(array($categoryName, $categoryId))) return true;
        return false;
    }
    
    public function remove($id){
        $query = $this->database->prepare("delete from category where category_id=$id");
        if($query->execute()){
            return true;
        }
        return false;
    }
    
}