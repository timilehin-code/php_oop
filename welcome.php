<?php
// include '';
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Welcome, <?php echo $_SESSION['userName'] .  "  you are the best" ?></h1>
</body>

</html>