<?php

namespace Config;

class Collection implements \Iterator {

    private $position = 0;
    private $array;
    private $bkpArray;

    public function __construct($array) {
    	$this->array = $array;
        $this->bkpArray = $array;
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
        return $this;
    }

    public function keys()
    {
        $this->array = array_keys($this->array);      
        return $this;  
    }

    public function values()
    {
       $this->array = array_values($this->array);     
       return $this;  
    }

    public function implode($by = ',')
    {
        $result = implode($by, $this->array);
        $this->array = $this->bkpArray;
        return $result;
    }

    public function toJson()
    {
    	$result = json_encode($this->array, JSON_PRETTY_PRINT);
        $this->array = $this->bkpArray;
        return $result;
    }

    public function __toString()
    {
    	$result = $this->toJson();
        $this->array = $this->bkpArray;
        return $result;
    }

    public function get()
    {
        $result = $this->array;
        $this->array = $this->bkpArray;
        return $result;
    }
}