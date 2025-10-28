<?php

declare(strict_types=1);
class Authentication
{
    private $userName;
    private $userPassword;
    public $userEmail;

    
    private $conn;

    public function __construct($conn,  string $password,  string $userEmail, $userName = null)
    {
        if (empty($userName) || strlen($userName) > 50) {
            throw new InvalidArgumentException("Invalid username");
        }
        if (empty($password) || strlen($password) < 8) {
            throw new InvalidArgumentException("Password must be at least 8 characters");
        }
        if (empty($userEmail) || !filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException("Invalid email format");
        }
        $this->conn = $conn;
        $this->userName = $userName;
        $this->userPassword = $password;
        $this->userEmail = $userEmail;
    }


    protected function checkEmail()
    {
        if (empty($this->userName) || empty($this->userEmail) || empty($this->userPassword)) {
            $_SESSION["error"] = "Please fill in all fields";
            error_log("checkEmail failed: Empty fields");
            return false;
        }

        try {
            $pdo = $this->conn;
            $stmt = "SELECT * FROM users WHERE userEmail = ?";
            error_log("checkEmail: Preparing query: $stmt with email: $this->userEmail");
            $prepare = $pdo->prepare($stmt);
            if (!$prepare) {
                throw new PDOException("Failed to prepare statement");
            }
            $prepare->execute([$this->userEmail]);
            if ($prepare->rowCount() == 0) {

                return true;
            } else {
                $_SESSION["error"] = "Email already taken";
                return false;
            }
        } catch (PDOException $e) {
            $error = "Error in checkEmail: " . $e->getMessage() . " (Code: " . $e->getCode() . ")";
            error_log($error);
            $_SESSION["error"] = "Failed to check email: " . $e->getMessage();
            return false;
        }
    }
    public function getCheckEmail()
    {
        $result = $this->checkEmail();
        if (!$result) {
            return false;
        }
        return $result;
    }
    private function setInsertUser()
    {
        try {
            $this->conn->beginTransaction();
            $stmt = "INSERT INTO users (userName, userEmail, userPassword) VALUES (?, ?, ?)";
            $prepare = $this->conn->prepare($stmt);
            if (!$prepare) {
                throw new PDOException("Failed to prepare statement");
            }
            $hashedPwd = password_hash($this->userPassword, PASSWORD_DEFAULT);
            $execute = $prepare->execute([$this->userName, $this->userEmail, $hashedPwd]);
            if ($execute) {
                $insertId = $this->conn->lastInsertId();
                $this->conn->commit();
                error_log("InsertUser: User inserted with ID $insertId");
                return $insertId;
            } else {
                $this->conn->rollBack();
                throw new PDOException("Failed to execute statement");
            }
        } catch (PDOException $pe) {
            echo $pe->getMessage();
        }
    }

    public function getInsertUser()
    {
        return $this->setInsertUser();
    }

    private function setGetUser()
    {
        try {
            $pdo = $this->conn;
            if (empty($this->userEmail) || empty($this->userPassword)) {
                $_SESSION["error"] = "Please fill in all fields";
                header("location:../welcome.php");
            } else {
                $selectUser = "SELECT * FROM users WHERE userEmail = ?";
                $prepare = $pdo->prepare($selectUser);
                if (!$prepare) {
                    throw new PDOException("Failed to prepare statement");
                }
                $prepare->execute([$this->userEmail]);
                if ($prepare->rowCount() == 1) {
                    $row = $prepare->fetch(PDO::FETCH_ASSOC);
                    $dbPassword = $row['userPassword'];
                    if (password_verify($this->userPassword, $dbPassword)) {
                        $_SESSION['login'] = True;
                        $_SESSION["userID"] =  $row['userId'];
                        $_SESSION['userName'] = $row['userName'];
                        $_SESSION['email'] = $row['userPassword'];
                        return True;
                    } else {
                        $_SESSION['error'] = "incorrect login details";
                        header("location:../login.php");
                    }
                } else {
                    $_SESSION['error'] =  "incorrect login details";
                    header("location:../login.php");
                }
            }
        } catch (PDOException $th) {
            echo $th->getMessage();
        }
    }
    public function getUser()
    {
        return $this->setGetUser();
    }
}
