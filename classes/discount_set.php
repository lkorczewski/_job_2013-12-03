<?php

class Discount_Set extends Set {
	
	function add_discount(Discount $discount){
		$this->items[] = $discount;
		return $this;
	}
}

