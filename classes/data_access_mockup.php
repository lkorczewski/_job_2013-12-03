<?php

class Data_Access_Mockup {
	
	function get_discount_set(){
		
		$discount_set = new Discount_Set();
		
		$discount = Discount::create(10)
			->set_name('True user condition');
		$discount->get_condition_set()
			->add_condition(User_Condition::create('=', 435))
		;
		
		$discount_set->add_discount($discount);
		
		$discount = Discount::create(10)
			->set_name('True coupon condition');
		$discount->get_condition_set()
			->add_condition(Coupon_Condition::create('=', 'ZXC56986'))
		;
		$discount_set->add_discount($discount);
		
		$discount = Discount::create(10)
			->set_name('False coupon condition');
		$discount->get_condition_set()
			->add_condition(Coupon_Condition::create('=', 'ABC12345'))
		;
		$discount_set->add_discount($discount);
		
		$discount = Discount::create(5)
			->set_name('Cart value > 20');
		$discount->get_condition_set()
			->add_condition(Cart_Value_Condition::create('>', 20))
		;
		$discount_set->add_discount($discount);
		
		$discount = Discount::create(5)
			->set_name('Friday cart value > 20');
		$discount->get_condition_set()
			->add_condition(Cart_Value_Condition::create('>', 20))
			->add_condition(Day_Of_Week_Condition::create('=', 5)) // 5 = piatek
		;
		$discount_set->add_discount($discount);
		
		return $discount_set;
	}
	
	function get_product($id){
		
		switch($id){
			case 12:
				$product = Product::create($id)
					->set_price(10.99)
					->set_property('size', 'L')
				;
				break;
			case 43:
				$product = Product::create($id)
					->set_price(2.50)
					->set_property('producer', 'MyCompany') // RLA: raczej id
				;
				break;
			case 102:
				$product = Product::create($id)
					->set_price(2.99)
					->set_property('producer', 'Ciasta Sp.J.') // RLA: raczej id
				;
				break;
		}
		
		return $product;
	}
	
}
