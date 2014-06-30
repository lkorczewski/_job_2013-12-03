<?php

class Commandline_Output {
	
	function create(){
		return new self();
	}
	
	function print_cart(Cart $cart){
		
		$this->print_line();
		
		echo 'Products:' . "\n";
		
		$this->print_line();
		
		$position_set = $cart->get_position_set();
		foreach($position_set as $position){
			$id         = $position->get_product()->get_id();
			$number     = $position->get_number();
			$price      = $position->get_product()->get_price();
			$sum_price  = $number * $price;
			
			$formatted_price      = number_format($price, 2, '.', ' ');
			$formatted_sum_price  = number_format($sum_price, 2, '.', ' ');
			
			echo str_pad($position->get_product()->get_id(), 8, ' ', STR_PAD_LEFT);
			echo ' | ';
			echo str_pad($number . ' x ', 8, ' ', STR_PAD_LEFT);
			echo str_pad($formatted_price . '$', 8, ' ', STR_PAD_LEFT);
			echo ' | ';
			echo str_pad(($formatted_sum_price) . '$', 10, ' ',STR_PAD_LEFT);
			echo "\n";
		}

		$this->print_line();
		
		$base_value = $cart->get_base_value();
		
		echo str_pad('Base total:', 20, ' ', STR_PAD_RIGHT);
		echo str_pad($base_value . '$', 20, ' ', STR_PAD_LEFT);
		echo "\n";
		
		$this->print_line();
		
		$discounted_value = $cart->get_discounted_value();
		
		$applied_discount_set = $cart->get_applied_discount_set();
		foreach($applied_discount_set as $discount){
			echo $discount->get_name();
			echo ' (' . $discount->get_rate() . '%)';
			echo "\n";
		}
		
		$this->print_line();
		
		echo str_pad('Discounted total:', 20, ' ', STR_PAD_RIGHT);
		echo str_pad($discounted_value . '$', 20, ' ', STR_PAD_LEFT);
		echo "\n";
		
		$this->print_line();
		
	}
	
	private function print_line(){
		echo str_repeat('-', 40) . "\n";
	}
	
}

