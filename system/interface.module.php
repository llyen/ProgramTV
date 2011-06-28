<?php

interface Module {
    
    public function get($id = '');
    
    public function save($post);
    
    public function update($post);
    
    public function remove($id);
    
}