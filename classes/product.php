<?php

class Product {
	
	protected $id;
	protected $price = 0;
	protected $properties = [];
	
	// construncting
	
	function __construct($id){
		$this->id = $id;
	}
	
	function create($id){
		return new self($id);
	}
	
	// id
	
	function get_id(){
		return $this->id;
	}
	
	// price
	
	function set_price($price){
		$this->price = $price;
		return $this;
	}
	
	function get_price(){
		return $this->price;
	}
	
	// properties
	// ostatecznie nie użyte praktycznie
	
	function set_property($name, $value){
		$this->properties[$name] = $value;
		
		return $this;
	}
	
	function get_property($name){
		if(!isset($this->properties[$name])){
			return null;
		}
		return $this->properties[$name];
	}
	
	function has_property($name){
		return isset($properties[$name]);
	}
	
	function has_property_value($name, $value){
		return isset($properties[$name]) && $properties[$name] == $value;
	}
	
}

