<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Routing::get('index', 'DefaultController');
Routing::get('', 'DefaultController');
Routing::get('offers', 'OfferController');
Routing::get('offersAdmin', 'OfferController');
Routing::get('profile', 'DefaultController');
Routing::get('addOffer', 'DefaultController');
Routing::post('offerDetails', 'OfferController');
Routing::post('search', 'OfferController');
Routing::post('login', 'SecurityController');
Routing::post('register', 'RegisterController');
Routing::post('addOffer', 'OfferController');

Routing::run($path);