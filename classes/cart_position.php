<?php

class Cart_Position {
	
	protected $product;
	protected $number;
	protected $value;
	
	// constructing
	
	function __construct(Product $product, $number = 1){
		$this->product  = $product;
		$this->number   = $number;
		$this->value    = floatval($this->product->get_price());
	}
	
	static function create(Product $product, $number = 1){
		return new self($product, $number);
	}
	
	// product
	
	function get_product(){
		return $this->product;
	}
	
	// number
	
	function set_number($number){
		$this->number = $number;
	}
	
	function increment_number($increment = 1){
		$this->number += $increment;
	}
	
	function decrement_number($decrement = 1){
		$this->number -= $decrement;
	}
	
	function get_number(){
		return $this->number;
	}
	
	// value
	
	function get_value(){
		return $this->value;
	}
	
	// TODO: zrobić dobrze
	function apply_discount(Discount $discount){
		$this->value = $this->value * $discount->apply($product) / 100;
	}
	
}
