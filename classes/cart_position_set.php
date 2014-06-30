<?php

class Cart_Position_Set extends Set {
	
	function add_position(Product $product, $number = 1){
		$product_id = $product->get_id();
		if(isset($this->items[$product_id])){
			$this->items[$product_id]->increment_number($number);
		} else {
			$this->items[$product_id] = Cart_Position::create($product, $number);
		}
		return $this;
	}
	
}

