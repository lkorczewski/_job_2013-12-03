<?php

class Autoloader {
	
	static function register(){
		set_include_path(get_include_path() . PATH_SEPARATOR . __DIR__);
		spl_autoload_register();
	}
	
}
