<?php

// Access point for global application-wide parameters
// Hopefully the only singleton

class Application {
	
	static $instance = null;
	
	protected $user = null;
	
	// constructing
	
	private function __construct(){}
	
	static function get_instance(){
		if(!self::$instance){
			self::$instance = new self();
		}
		return self::$instance;
	}
	
	// user
	
	function set_user(User $user){
		$this->user = $user;
	}
	
	function get_user(){
		return $this->user;
	}
	
	// cart
	
	function set_cart(Cart $cart){
		$this->cart = $cart;
	}
	
	function get_cart(){
		return $this->cart;
	}
	
}
