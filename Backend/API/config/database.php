<?php

class Database {

    // credentials to db
    private $host = 'localhost';
    private $db_name = 'sobes';
    private $user_name = 'root';
    private $password = 'hesoyam2712'; // to .env?
    public $conn;

    // get db connection
    public function getConnection () {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->user_name, $this->password);
        } catch (PDOException $exception) {
            echo "Connection error " . $exception->getMessage();
        }

        return $this->conn;
    }
}

$db = new Database();
$conn = $db->getConnection();