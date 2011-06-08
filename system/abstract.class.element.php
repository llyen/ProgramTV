<?php

abstract class Element {
    protected $hourTimestamp;
    protected $delay;
    protected $category;
    
    abstract public function addToProgram(Program $program);
    abstract public function removeFromProgram(Program $program);
}