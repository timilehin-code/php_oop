<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include 'includes/visiblity.php';
    include 'includes/conn.php';
    include 'includes/newclass.php';
    $person = new Person("Daniel", "Red", 20);
    $person->getName();
    // var_dump($person);
    echo $person->name;

    try {
        $db = new Connection("localhost", "root", "", "delivery");
        $conn = $db->setConnect();
        if ($conn) {
            echo "Connection to db was successful";
        } else {
            echo "Connection is null";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
    $object = new NewClass();
    unset($object);
    // echo $object->getNewProperty();
    ?>

</body>

</html>