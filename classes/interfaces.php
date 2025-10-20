<?php

// Define an interface
interface Logger
{
    public function logMessage(string $message);
    public function logError(string $errorMessage);
}

// Implement the interface in a class
class FileLogger implements Logger
{
    public function logMessage(string $message)
    {
        // Logic to write message to a file
        echo "Logging message to file: " . $message . PHP_EOL;
    }

    public function logError(string $errorMessage)
    {
        // Logic to write error to a file
        echo "Logging error to file: " . $errorMessage . PHP_EOL;
    }
}

// Another class implementing the same interface
class DatabaseLogger implements Logger
{
    public function logMessage(string $message)
    {
        // Logic to store message in a database
        echo "Storing message in database: " . $message . PHP_EOL;
    }

    public function logError(string $errorMessage)
    {
        // Logic to store error in a database
        echo "Storing error in database: " . $errorMessage . PHP_EOL;
    }
}

// Usage
$fileLogger = new FileLogger();
$fileLogger->logMessage("This is a test message.");
$fileLogger->logError("An error occurred!");

$databaseLogger = new DatabaseLogger();
$databaseLogger->logMessage("Another message for the database.");
$databaseLogger->logError("Database error!");
