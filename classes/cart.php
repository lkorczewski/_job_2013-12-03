<?php

class Cart {
	
	protected $position_set          = null;
	protected $coupon                = null;
	protected $discount_set          = null;
	protected $applied_discount_set  = null;
	
	// constructing
	
	function __construct(){
		$this->position_set = new Cart_Position_Set();
	}
	
	static function create(){
		return new self();
	}
	
	// position set
	
	function get_position_set(){
		return $this->position_set;
	}
	
	// coupon
	
	function set_coupon(Coupon $coupon){
		$this->coupon = $coupon;
	}
	
	function get_coupon(){
		return $this->coupon;
	}
	
	// discount set
	
	function set_discount_set($discount_set){
		$this->discount_set = $discount_set;
	}
	
	// discount set applied in last operation
	
	function get_applied_discount_set(){
		return $this->applied_discount_set;
	}
	
	// operations
	
	function get_base_value(){
		$base_value = 0;
		foreach($this->get_position_set() as $position){
			$number  = $position->get_number();
			$price   = $position->get_product()->get_price();
			$base_value += $number * $price;
		}
		return $base_value;
	}
	
	function get_discounted_value(){
		// To mogloby byc leniwe:
		// - problem, ze zalezy od warunkow zewnetrznych
		// - rzecz zalezy tez od czasu zycia obiektu
		
		$discounted_total = 0;
		foreach($this->position_set as $position){
			$number  = $position->get_number();
			$value   = $position->get_value();
			
			$discounted_total += $number * $value;
		}
		
		// Zniżki na koszyki
		$this->applied_discount_set = new Discount_Set();
		if($this->discount_set){
			foreach($this->discount_set as $discount){
				if($discount->apply_to($discounted_total)){
					$this->applied_discount_set->add_discount($discount);
				}
			}
		}
		
		$discounted_total = round($discounted_total, 2);
		
		return $discounted_total;
	}
}

