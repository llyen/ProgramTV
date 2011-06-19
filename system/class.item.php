<?php

class Item extends Element {
    
    public function addToProgram(Program $program){}
    
    public function removeFromProgram(Program $program){}
    
    public function viewForm(){
        Router::redirect('test', array('param'));
    }
    
}