<?php
// includes/googleAuth.php
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}

require_once 'vendor/autoload.php'; // Adjust path if needed
require_once 'autoloader.php';
require_once 'conn.php';

try {
    loadEnv('.env'); // Adjust path
} catch (Exception $e) {
    die("Error loading .env: " . $e->getMessage());
}

$client = new Google\Client();
$client->setClientId($_ENV['CLIENTID']);
$client->setClientSecret($_ENV['CLIENTSECRET']);
$client->setRedirectUri("http://localhost/php_oop/welcome.php");
$client->addScope("email");
$client->addScope("profile");

$url = $client->createAuthUrl(); // This is the only thing this file should do