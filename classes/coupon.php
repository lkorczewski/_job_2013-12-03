<?php

class Coupon {
	
	private $code;
	
	function __construct($code){
		$this->code = $code;
	}
	
	function create($code){
		return new self($code);
	}
	
	function get_code(){
		return $this->code;
	}
	
}
