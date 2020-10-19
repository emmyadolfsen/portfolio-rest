<?php

class Dbh {
    
    private $host = 'localhost';
    private $user = 'rest';
    private $pwd = 'password';
    private $dbName = 'rest';
   
/*
    private $host = 'localhost';
    private $user = 'aspelles_portfolio';
    private $pwd = '1416Bonis';
    private $dbName = 'aspelles_portfolio';
*/
    // Databasanslutning
    protected function connect() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}