<?php

namespace Config;

class Collection implements \Iterator {

    private $position = 0;
    private $array;

    public function __construct($array) {
    	$this->array = $array;
        $this->position = 0;
    }

    public function rewind() {       
        $this->position = 0;
    }

    public function current() {        
        return $this->array[$this->position];
    }

    public function key() {        
        return $this->position;
    }

    public function next() {        
        ++$this->position;
    }

    public function valid() {        
        return isset($this->array[$this->position]);
    }

    public function map($callback)
    {
    	$this->array = array_map($callback, $this->array);
    }

    public function toJson()
    {
    	return json_encode($this->array, JSON_PRETTY_PRINT);
    }

    public function __toString()
    {
    	return $this->toJson();
    }
}