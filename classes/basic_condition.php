<?php

abstract class Basic_Condition implements Condition {
	
	protected $label = 'unlabelled!';
	
	protected static $operator_map = [
		'='   => 'is_equal',
		'<'   => 'is_less',
		'>'   => 'is_greater',
		'<='  => 'is_less_or_equal',
		'>='  => 'is_greater_or_equal',
	];
	
	protected $property  = null;
	protected $value     = null;
	
	// constructing
	
	private function __construct($operator, $value){
		$this->operator  = $operator;
		$this->set_value($value);
	}
	
	static function create($operator, $value){
		if(!array_key_exists($operator, static::$operator_map)){
			return null;
		}
		return new static($operator, $value);
	}
	
	// label
	
	function get_label(){
		return $this->label;
	}
	
	// operator
	
	function get_operator(){
		return $this->operator;
	}
	
	// value
	
	function get_value(){
		return $this->value;
	}
	
	// testing
	
	function test(){
		$result = false;
		
		$this->set_property();
		
		$result = $this->{self::$operator_map[$this->operator]}();
		
		return $result;
	}
	
	// preprocessing preparing to comparison
	// to be rewritten in implementation
	
	protected function set_value($value){
		$this->value = $value;
	}
	
	protected function set_property(){
		/* ... */
	}
	
	// comparison
	
	protected function is_equal(){
		return $this->property == $this->value;
	}
	
	protected function is_less(){
		return $this->value < $this->property;
	}
	
	protected function is_greater(){
		return $this->value < $this->property;
	}
	
	protected function is_less_or_equal(){
		return $this->value <= $this->property;
	}
	
}
