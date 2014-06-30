<?php

class Day_Of_Week_Condition extends Basic_Condition {
	
	protected $label = 'day of week';
	
	function set_property(){
		$date_time = new DateTime();
		$this->property = $date_time->format('N');
	}
	
}
