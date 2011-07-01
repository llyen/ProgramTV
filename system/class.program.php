<?php

class Program implements Module {
    
    private $database;
    
    public function __construct(Database $database){
        $this->database = $database->dbh;
    }
    
    public function getByChannelId($id = ''){
        $query = $this->database->query("select program_id, program_date, program_items from program where channel_id=$id");
        return $query;
    }
    
    public function get($id = ''){
        $query = empty($id) ? $this->database->query("select program_id, channel_name, program_date, program_items from program natural join channel") :  $this->database->query("select program_id, channel_name, program_date, program_items from program natural join channel where program_id=$id");
        return $query;
    }
    
    public function save($post){
        $channelId = $post['channel_id'];
        $program_date = $post['date'];
        $hours = $post['hours'];
        $items = $post['item'];
        $program_items = array();
        for($i=0; $i<12; $i++){
            $program_items[$hours[$i]] = $items[$i];
        }
        $program_items = serialize($program_items);
        $query = $this->database->prepare("insert into program (channel_id, program_date, program_items) values (?, ?, ?)");
        if($query->execute(array($channelId, $program_date, $program_items))) return true;
        return false;
    }
    
    public function update($post){}
    
    public function remove($id){
        $query = $this->database->prepare("delete from program where program_id=$id");
        if($query->execute()){
            return true;
        }
        return false;
    }
    
    
}