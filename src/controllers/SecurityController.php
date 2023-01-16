<?php

use exceptions\UnknownUsersException;

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends  AppController
{
    private function checkPassword($input, $hash) : bool {
        return password_verify($input, $hash);
    }

    public function login() {
        $userRepository = new UserRepository();

        if (!$this->isPost()) {
            return $this->render('login');
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

        try {
            $user = $userRepository->getUser($email);
        } catch (UnknownUsersException $e) {
            return $this->render('login', ['messages' => [$e->getMessage()]]);
        }

        if (empty($email)) {
            return $this->render('login', ['messages' => ['Nie wpisano loginu']]);
        } else {
            $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
            if (!preg_match ($pattern, $email) ) {
                return $this->render('login', ['messages' => ['Niepoprawny format emaila']]);
            }
        }

        if (empty($password)) {
            return $this->render('login', ['messages' => ['Nie wpisano hasla']]);
        }


        if ($user->getEmail() !== $email) {
            return $this->render('login', ['messages' => ['User with this email not exist!']]);
        }

        if (!$this->checkPassword($password, $user->getPassword())) {
            return $this->render('login', ['messages' => ['Wrong password!']]);
        }


        // set cookie
        setcookie("user_name", $user->getEmail(), time()+ 360,'/');
        setcookie("is_admin", $user->getIsAdmin(), time()+ 360,'/');

        return $this->render('main-page');

    }
}