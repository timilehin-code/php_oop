<?php
// welcome.php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

// Include required files
require 'vendor/autoload.php';
require 'includes/autoloader.php';
require 'includes/conn.php';

try {
    loadEnv('.env');
} catch (Exception $e) {
    die("Error loading .env file: " . $e->getMessage());
}

if (isset($_GET['code'])) {
    try {
        $client = new Google\Client();
        $client->setClientId($_ENV['CLIENTID']);
        $client->setClientSecret($_ENV['CLIENTSECRET']);
        $client->setRedirectUri("http://localhost/php_oop/welcome.php");
        $client->addScope("email");
        $client->addScope("profile");

        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

        if (isset($token['error'])) {
            die("OAuth Error: " . $token['error_description'] ?? $token['error']);
        }

        if (!isset($token['access_token'])) {
            die("Failed to get access token: " . print_r($token, true));
        }

        $client->setAccessToken($token['access_token']);
        $oauth = new Google\Service\Oauth2($client);
        $userInfo = $oauth->userinfo->get();
        
        $_SESSION['login'] = true;
        $_SESSION['email'] = $userInfo->email;
        $_SESSION['userName'] = $userInfo->name;
        $password = "google authentication";
        $auth = new authentication($conn,  $password, $_SESSION['email'], $_SESSION['userName'],);
        $auth->getCheckEmail();
        if ($auth->getCheckEmail()) {
            $result = $auth->getInsertUser();
            header("Location: welcome.php");
        } else {
            header("Location: welcome.php");
        }
        exit;
    } catch (Exception $th) {
        echo $th->getMessage();
    }
}
