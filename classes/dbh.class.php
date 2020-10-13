<?php

class Dbh {
    
    // Lokal databas
    private $host = 'localhost';
    private $user = 'rest';
    private $pwd = 'password';
    private $dbName = 'rest';
   
/*
    // Inleed databas
    private $host = 'localhost';
    private $user = 'aspelles_kurser';
    private $pwd = 'password';
    private $dbName = 'aspelles_kurser';
*/

    // Databasanslutning med PDO
    protected function connect() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;'charset=utf8';
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
?>