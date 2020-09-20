<?php
class Database {
    private $host = 'localhost';
    private $db_name = 'rest';
    private $username = 'rest';
    private $password = 'password';
    private $conn;

    // Databas-anslutning
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname-' . 
            $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "databasen är här";


        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function close() {
        $this->conn = null;
    }
}