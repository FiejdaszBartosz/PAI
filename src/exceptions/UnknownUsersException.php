<?php

namespace exceptions;
use Exception;

class UnknownUsersException extends Exception {
    public function __construct() {
         parent::__construct('User does not exist in database or password does not match');
    }
}