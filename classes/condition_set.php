<?php

class Condition_Set extends Set {
	
	function add_condition(Condition $condition){
		$this->items[] = $condition;
		return $this;
	}
	
}
