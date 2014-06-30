<?php

class Coupon_Condition extends Basic_Condition {
	
	protected $property = 'coupon';
	
	protected function set_property(){
		$coupon = Application::get_instance()->get_cart()->get_coupon();
		if(!$coupon){
			$this->property = '';
		} else {
			$this->property = $coupon->get_code();
		}
	}
}
