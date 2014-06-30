<?php

class User_Condition extends Basic_Condition {
	
	protected $label = 'user';
	
	protected function set_property(){
		$user = Application::get_instance()->get_user();
		$user_id = $user ? $user->get_id() : 0;
		$this->property = $user_id;
	}
}
