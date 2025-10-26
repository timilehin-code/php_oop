<?php
spl_autoload_register("AutoLoader");

function AutoLoader($className)
{
    // Use absolute path based on the location of autoloader.php
    $baseDir = __DIR__ . '/../classes/';
    $extension = '.php';
    $fullPathName = $baseDir . $className . $extension;

    try {
        if (!file_exists($fullPathName)) {
            $error = "Class file not found: $fullPathName";
            error_log($error);
            throw new Exception($error);
        }
        include_once $fullPathName;
        error_log("Successfully loaded class file: $fullPathName");
    } catch (Exception $e) {
        error_log("Autoloader error: " . $e->getMessage());
        // Optionally display the error for debugging (remove in production)
        echo "Autoloader error: " . $e->getMessage();
        exit;
    }
}







// spl_autoload_register("AutoLoader");
// function AutoLoader($className)
// {
//     $path = "classes/";
//     $extension = ".php";
//     $fullPathName = $path . $className . $extension;
//     try {
//         if (!file_exists($fullPathName)) {
//             throw new Exception("invalid class or file Name");
//         }
//         include_once $fullPathName;
//         return $fullPathName;
//     } catch (ErrorException  $th) {
//         echo $th->getMessage();
//     }
// }
