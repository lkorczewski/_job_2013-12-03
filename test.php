<?php

//---------------------------------------------------
// autoloader
//---------------------------------------------------

require_once __DIR__ . '/classes/autoloader.php';
Autoloader::register();

//---------------------------------------------------
// Środowisko
//---------------------------------------------------

$application = Application::get_instance();
$data_access = new Data_Access_Mockup();

//---------------------------------------------------
// Użytkownik
//---------------------------------------------------
// RLA: użytkownik powinien się pobierać i walidować
// na podstawie danych (baza) przy logowaniu,
// z sesji w pozostałych wywołaniach
//---------------------------------------------------

$user = new User(435);
$application->set_user($user);

//---------------------------------------------------
// Zniżki ze źródła danych
//---------------------------------------------------
$discount_set = $data_access->get_discount_set();

//---------------------------------------------------
// Koszyk
//---------------------------------------------------
// RLA: koszyk powinien się wypełniać
// na podstawie sesji
//---------------------------------------------------

$cart = new Cart();
$application->set_cart($cart);

$cart->set_discount_set($discount_set);
$cart->get_position_set()
	->add_position($data_access->get_product(12))
	->add_position($data_access->get_product(43))
	->add_position($data_access->get_product(43))
	->add_position($data_access->get_product(102), 3)
;
$cart->set_coupon(Coupon::create('ZXC56986'));

//---------------------------------------------------
// wyświetlanie danych
//---------------------------------------------------

Commandline_Output::create()->print_cart($cart);

