<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

class Connection
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($servername, $username, $password, $dbname)
    {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
        mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    }

    private function setConnect()
    {
        try {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                throw new Exception("Connection failed: " . $this->conn->connect_error);
            }
            return $this->conn;
        } catch (Throwable $e) {
            throw new Exception("Could not connect to database due to: " . $e->getMessage());
        }
    }

    public function getConnect()
    {
        if (!$this->conn) {
            try {
                $this->setConnect();
            } catch (Exception $e) {
                error_log($e->getMessage());
                throw $e; // Re-throw the exception to allow the caller to handle it
            }
        }
        return $this->conn;
    }

    public function __destruct()
    {
        if ($this->conn) {
            $this->conn->close();
        }
    }
}


