<?php

class Database
{
    private $username;
    private $password;
    private $host;
    private $database;
    private static $instance;

    private function __construct() {
        $this->username = 'dbuser';
        $this->password = 'dbpwd';
        $this->host = 'db';
        $this->database = 'dbname';
    }

    private function __clone() {}

    public static function getInstance() : Database {
        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function connect() {
        try {
            $conn = new PDO(
                "pgsql:host=$this->host;port=5432;dbname=$this->database",
                $this->username,
                $this->password,
                ["sslmode"  => "prefer"]
            );

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}