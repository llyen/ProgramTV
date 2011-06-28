<?php

class Item implements Module {
    
    private $database;
    
    public function __construct(Database $database){
        $this->database = $database->dbh;
    }
    
    public function get($id = ''){
        $query = empty($id) ? $this->database->query("select item_id, category_name, item_name, item_description, item_delay from item natural join category") :  $this->database->query("select category_id, item_name, item_description, item_delay from item where item_id=$id");
        return $query;
    }
    
    public function save($post){
        $categoryId = $post['category_id'];
        $itemName = htmlspecialchars($post['item_name']);
        $itemDescription = htmlspecialchars($post['item_description']);
        $itemDelay = strtotime($post['item_delay']);
        $query = $this->database->prepare("insert into item (category_id, item_name, item_description, item_delay) values (?, ?, ?, ?)");
        if($itemName != '' && $query->execute(array($categoryId, $itemName, $itemDescription, $itemDelay))) return true;
        return false;
    }
    
    public function update($post){
        $itemId = $post['item_id'];
        $categoryId = $post['category_id'];
        $itemName = htmlspecialchars($post['item_name']);
        $itemDescription = htmlspecialchars($post['item_description']);
        $itemDelay = strtotime($post['item_delay']);
        $query = $this->database->prepare("update item set category_id=?, item_name=?, item_description=?, item_delay=? where item_id=?");
        if($itemName != '' && $query->execute(array($categoryId, $itemName, $itemDescription, $itemDelay, $itemId))) return true;
        return false;
    }
    
    public function remove($id){
        $query = $this->database->prepare("delete from item where item_id=$id");
        if($query->execute()){
            return true;
        }
        return false;
    }
    
}