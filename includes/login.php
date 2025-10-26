<?php
session_start();
include 'autoloader.php';
include 'conn.php';
if (isset($_POST['login'])) {
    $userEmail = trim($_POST['mail'] ?? '');
    $password = $_POST['pwd'] ?? '';
    $userName = "null";

    try {
        $auth = new authentication($conn, $userName, $password, $userEmail);
        $result = $auth->getUser();
        if ($result) {
            header("location:../welcome.php");
        } else {
            header("location:../login.php");
        }
    } catch (PDOException $th) {
        echo $th->getMessage();
    }
}
