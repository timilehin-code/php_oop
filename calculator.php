<?php
include 'includes/autoloader.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="includes/calculator.php" method="post">
        <h1>My Simple Calculator</h1>
        <input type="number" name="num1" id="" placeholder="First number">
        <select name="operation" id="">
            <option value="add">Addition</option>
            <option value="div">Division</option>
            <option value="multi">Multiplication</option>
            <option value="sub">Subtraction</option>
        </select>
        <input type="number" name="num2" id="" placeholder="second number">
        <button type="submit" name="submit">Calculate</button>
    </form>
</body>

</html>