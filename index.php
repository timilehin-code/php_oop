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
<!-- differences between PDO and MYSQLI -->

<body>
    <?php
    $selectUsers = new UsersView();
    $selectUsers->showUser("Emanuel");


    $insertUsers = new UserController();
    $insertUsers->setUsers("kola", 17, "male");
    ?>

</body>

</html>