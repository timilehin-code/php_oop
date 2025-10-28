<?php
class Dbh
{
    private $host;
    private $user;
    private $password;
    private $dbName;
    private $pdo = null;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->user = 'root';
        $this->password = '';
        $this->dbName = 'pdo';
    }

    protected function connect()
    {
        if ($this->pdo !== null) {
            return $this->pdo;
        }

        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName . ';charset=utf8mb4';
            error_log("Attempting to connect with DSN: $dsn, User: $this->user");
            $this->pdo = new PDO($dsn, $this->user, $this->password, [
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_PERSISTENT => false,
            ]);
            error_log("Database connection successful");
            return $this->pdo;
        } catch (PDOException $e) {
            $errorMessage = "Database connection failed: " . $e->getMessage() . " (Code: " . $e->getCode() . ")";
            error_log($errorMessage);
            throw new PDOException("Unable to connect to the database.");
        }
    }

    public function getConn()
    {
        return $this->connect();
    }
}