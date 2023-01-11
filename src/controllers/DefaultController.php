<?php

require_once 'AppController.php';

class DefaultController extends AppController {
    public function index()
    {
        $this->render('main-page');
    }

    public function login()
    {
        $this->render('login');  
    }

    public function offerDetails()
    {
        $this->render('offer-details');
    }

    public function profile()
    {
        $this->render('profile');
    }

    public function addOffer()
    {
        $this->render('add-offer');
    }

    public function register()
    {
        $this->render('register');
    }
}