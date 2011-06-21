<?php

class Channel {
    
    private $database;
    
    public function __construct(Database $database){
        $this->database = $database;
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
    
    public function save($post){}
    
    public function update($channelId, $post){}
    
    public function remove($channelId){}
    
    public function get($channelId){
        $query = $this->database->query("select channel_name, channel_description from channel where channel_id=$channelId");
        $channel = $query->fetch();
        return $channel;
    }
}