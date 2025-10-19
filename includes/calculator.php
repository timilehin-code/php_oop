<?php

declare(strict_types=1);
include 'autoloader.php';
// if ($_SERVER['REQUEST_METHOD'] == "post") {
    $num1 = $_POST['num1'];
    $operation = $_POST['operation'];
    $num2 = $_POST['num2'];

    $calc = new calculate((float) $num1, (string) $operation, (float)$num2);
    try {
        echo $calc->calculator();
    } catch (TypeError $th) {
        echo "error" . $th->getMessage();
    }
// }
