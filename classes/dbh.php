<?php

class Dbh{
    private $host;
    private $user;
    private $password;
    private $dbName;

    public function __construct(){
        $this->host = "localhost";
        $this->user = "root";
        $this->password = "";
        $this->dbName = "login";
    }

    protected function connect(){
        $dsn = 'mysql:host'. $this->host . '; dbName' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
    
}
