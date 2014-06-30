<?php

class User {
	
	private $id = null;
	
	function __construct($id){
		$this->id = $id;
	}
	
	function get_id(){
		return $this->id;
	}
	
}
