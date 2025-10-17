<?php
spl_autoload_register("AutoLoader");
function AutoLoader($className)
{
    $path = "classes/";
    $extension = ".php";
    $fullPathName = $path . $className . $extension;
    try {
        if (!file_exists($fullPathName)) {
            throw new Exception("invalid class or file Name");
        }
        include_once $fullPathName;
        return $fullPathName;
    } catch (ErrorException  $th) {
        echo $th->getMessage();
    }
}
