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
}