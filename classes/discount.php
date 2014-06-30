<?php

class Discount {
	
	protected $name = 'Unnamed discount';
	protected $rate = null;
	protected $condition_set = null;
	
	// constructing
	
	function __construct($rate){
		$this->rate = $rate;
		$this->condition_set = new Condition_Set();
	}
	
	static function create($rate){
		return new self($rate);
	}
	
	// name
	
	function set_name($name){
		$this->name = $name;
		return $this;
	}
	
	function get_name(){
		return $this->name;
	}
	
	// rate
	
	function get_rate(){
		return $this->rate;
	}
	
	// condition_set
	
	function get_condition_set(){
		return $this->condition_set;
	}
	
	// applying
	
	function apply_to(&$value){
		$test_passed = true;
		
		foreach($this->condition_set as $condition){
			if(!$condition->test()){
				return false;
			}
		}
		
		$multiplier = (100 - $this->rate) / 100;
		$value = $value * $multiplier;
		return true;
	}
	
}

