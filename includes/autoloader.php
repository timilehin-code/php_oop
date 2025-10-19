<?php
spl_autoload_register("AutoLoader");
function AutoLoader($className)
{
    $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    if (strpos($url, 'includes') !== false) {
        $path = '../classes/';
    } else {
        $path = "classes/";
    }

    $extension = ".php";
    $fullPathName = $path . $className . $extension;
    try {
        if (!file_exists($fullPathName)) {
            throw new Exception("invalid class or file Name");
        }
        include_once $fullPathName;
    } catch (ErrorException  $th) {
        echo $th->getMessage();
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
