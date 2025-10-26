<?php
// include '';
if (session_status() != PHP_SESSION_ACTIVE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <form action="includes/login.php" class="form" method="post">
        <div class="wrapper">
            <p class="msg"></p>
            <?php
            if (isset($_SESSION['error'])) {
            ?>
                <p class="session"> <?php echo $_SESSION['error']; ?> </p>
            <?php
            }
            unset($_SESSION['error']);
            ?>
            <input type="email" class="input mail" name="mail" placeholder="Email">
            <input type="password" class="input pwd" name="pwd" placeholder="Password">
            <button type="submit" class="login" name="login">Login</button>
        </div>
    </form>
    <script src="assets/js/app.js" async defer></script>
</body>

</html>