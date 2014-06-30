<?php

abstract class Set implements Iterator {
	
	protected $items = [];
	private $pointer = 0;
	
	// Iterator implementation
	
	function current(){
		$keys = array_keys($this->items);
		return $this->items[$keys[$this->pointer]];
	}
	
	function key(){
		$keys = array_keys($this->items);
		return $keys[$this->pointer];
	}
	
	function next(){
		$this->pointer++;
	}
	
	function rewind(){
		$this->pointer = 0;
	}
	
	function valid(){
		$keys = array_keys($this->items);
		return isset($keys[$this->pointer]);
	}
	
}
