<?php

class Channel {
    
    private $database;
    
    public function __construct(Database $database){
        $this->database = $database->dbh;
    }
    
    //public function add(){
    //    
    //}
    //
    //public function edit($channelId){
    //    Router::redirect('admin_channel_edit', $this->get($channelId));
    //}
    //
    //public function delete($channelId){
    //    
    //}
    
    public function save($post){
        $channelName = htmlspecialchars($post['channel_name']);
        $channelDescription = htmlspecialchars($post['channel_description']);
        $query = $this->database->prepare("insert into channel (channel_name, channel_description) values (?, ?)");
        if($channelName != '' && $channelDescription != '' && $query->execute(array($channelName, $channelDescription))) return true;
        return false;
    }
    
    public function update($channelId, $post){}
    
    public function remove($channelId){}
    
    public function get($channelId = ''){
        $query = empty($channelId) ? $this->database->query("select channel_id, channel_name, channel_description from channel") :  $this->database->query("select channel_name, channel_description from channel where channel_id=$channelId");
        //$channel = $query->fetch();
        return $query;
    }
    
}