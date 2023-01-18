<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('', 'DefaultController');
//Routing::get('login', 'DefaultController');
Routing::get('offers', 'OfferController');
Routing::get('offersAdmin', 'OfferController');
//Routing::get('offerDetails', 'OfferController');
Routing::get('profile', 'DefaultController');
Routing::get('addOffer', 'DefaultController');
//Routing::get('register', 'DefaultController');

Routing::post('offerDetails', 'OfferController');
Routing::post('search', 'OfferController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'RegisterController');
Routing::post('addOffer', 'OfferController');

Routing::run($path);