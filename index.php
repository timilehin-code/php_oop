<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    include 'includes/autoloader.php';
    $obj = new StaticPropertiesMethod();
    try {
      $obj->setName("1");
      echo $obj->getName();
    } catch (Throwable $th) {
        echo $th->getMessage();
    }
    ?>

</body>

</html>