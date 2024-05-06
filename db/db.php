<?php

class Database {
    private static $instance = null;
    private $conn;

    public function __construct() {
        $servername = "localhost";
        $username = "test";
        $password = "12345";
        $database = "test";

        $this->conn = new mysqli($servername, $username, $password, $database);

        if ($this->conn->connect_error) {
            die("Conexión fallida: " . $this->conn->connect_error);
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection() {
        return $this->conn;
    }
}

?>