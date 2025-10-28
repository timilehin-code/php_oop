<?php
include 'includes/authCallback.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Welcome – n</title>

</head>

<body>

    <div class="card">
        <?php if (isset($_SESSION['login']) && $_SESSION['login'] === true): ?>
            <!-- ----- LOGGED IN ----- -->
            <div class="avatar">
                <?= htmlspecialchars(substr($_SESSION['userName'], 0, 1)) ?>
            </div>

            <h1>Welcome, <?= htmlspecialchars($_SESSION['userName']) ?>!</h1>
            <p class="info">You are the best!</p>
            <p class="info"><strong>Email:</strong> <?= htmlspecialchars($_SESSION['email']) ?></p>

            <a href="logout.php" class="btn">Logout</a>

        <?php else: ?>
            <!-- ----- NOT LOGGED IN ----- -->
            <h1>Access Denied</h1>
            <p class="info">You need to sign in first.</p>
            <a href="registration.php" class="btn">Back to Login</a>
        <?php endif; ?>
        <!-- <pre class="debug"><?php print_r($_SESSION); ?></pre> -->
       
    </div>

</body>

</html>