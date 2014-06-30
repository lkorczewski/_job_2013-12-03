<?php

class Cart_Value_Condition extends Basic_Condition {
	
	protected $label = 'cart value';
	
	protected function set_property(){
		$this->property = Application::get_instance()
			->get_cart()
			->get_base_value();
	}
}
