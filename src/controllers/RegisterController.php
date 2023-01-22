<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class RegisterController extends AppController
{
    private function testInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    private function hashPassword($data) : string {
        return password_hash($data, PASSWORD_BCRYPT);
    }

    public function register() {
        if (!$this->isPost()) {
            return $this->render('register');
        }

        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (empty($name)) {
            return $this->render('register', ['messages' => ['Nie wpisano imiona']]);
        } else {
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                return $this->render('register', ['messages' => ['Niepoprawny format imienia']]);
            }
        }

        if (empty($surname)) {
            return $this->render('register', ['messages' => ['Nie wpisano nazwiska']]);
        } else {
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
                return $this->render('register', ['messages' => ['Niepoprawny format nazwiska']]);
            }
        }

        if (empty($email)) {
            return $this->render('register', ['messages' => ['Nie wpisano loginu']]);
        } else {
            $pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^";
            if (!preg_match ($pattern, $email) ) {
                return $this->render('register', ['messages' => ['NIepoprawny format emaila']]);
            }
        }


        if (empty($password)) {
            return $this->render('register', ['messages' => ['Nie wpisano hasla']]);
        }

        $userRepository = new UserRepository();


        $userRepository->addUser($name, $surname, $email, $this->hashPassword($password));

        return $this->render('main-page');
    }


}