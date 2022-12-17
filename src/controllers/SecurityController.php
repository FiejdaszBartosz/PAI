<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends  AppController
{
    public function login() {
        $user = new User('test@test.pl', 'admin', 'John', 'Snow');

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($email)) {
            return $this->render('login', ['messages' => ['Nie wpisano loginu']]);
        } else {
            $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
            if (!preg_match ($pattern, $email) ) {
                return $this->render('login', ['messages' => ['NIepoprawny format emaila']]);
            }
        }

        if (empty($password)) {
            return $this->render('login', ['messages' => ['Nie wpisano hasla']]);
        }


        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if ($user->getPassword() !== $password) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }


        // set cookie
        setcookie("user_name", $user->getName(), time()+ 120,'/');
        //setcookie("user_role", $user->getName(), time()+ 120,'/');

        return $this->render('main-page');

    }
}