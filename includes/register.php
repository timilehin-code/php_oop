<?php
session_start();
include 'autoloader.php';
include 'conn.php';

if (isset($_POST['reg'])) {
    $userName = trim($_POST['uname'] ?? '');
    $password = $_POST['pwd'] ?? '';
    $userEmail = trim($_POST['mail'] ?? '');


    try {
        $auth = new authentication($conn, $userName, $password, $userEmail);
        $result = $auth->getInsertUser();

        if ($result) {
            $_SESSION['login'] = True;
            $_SESSION["userID"] =  $result;
            $_SESSION['userName'] = $userName;
            $_SESSION['email'] = $userEmail;
            header("location:../welcome.php");
        } else {
            // Check for session error
            $error = $_SESSION["error"];
            header("location:../registration.php");
        }
    } catch (InvalidArgumentException $e) {
        $_SESSION["error"] = $e->getMessage();
        echo "Validation error: " . $e->getMessage();
    } catch (PDOException $e) {
        $_SESSION["error"] = "Database error: " . $e->getMessage();
        echo "Database error: " . $e->getMessage();
    }
}
