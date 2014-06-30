<?php

class Product_Set extends Set {
	
	function add_product(Product $product, $number = 1){
		$product_id = $product->get_id();
		if(isset($this->items[$product_id])){
			$this->items[$product_id]['number'] += $number;
		} else {
			$this->items[$product_id]['product'] = $product;
			$this->items[$product_id]['number'] = $number;
		}
		return $this;
	}
	
}

