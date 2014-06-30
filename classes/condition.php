<?php

interface Condition {
	
	function get_label();
	function get_operator();
	function get_value();
	
	function test();
	
}
