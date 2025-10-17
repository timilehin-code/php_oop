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
    $files = glob("classes");
    foreach($files as $file ){
        $content = file_get_contents($file);
        echo $content;
    }
    echo StaticPropertiesMethod::SetDrinkingAge(20);
    echo StaticPropertiesMethod::$drinkingAge;

    ?>

</body>

</html>