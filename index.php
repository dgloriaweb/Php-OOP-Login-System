<!DOCTYPE html>
<html lang="en">
<?php session_start() ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Php OOP User Management</title>
    <?php
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    ?>
</head>

<body>
    <div id="header">
        <?php $loggedin = (isset($_SESSION['uid'])) ? true : false ?>
        <ul>
            <li <?php if (!$loggedin) echo 'style="display:none"' ?>>Hi <?= $_SESSION['uid'] ?></li>
            <li <?php if (!$loggedin) echo 'style="display:none"' ?>><a href="includes/logout.inc.php">LOGOUT</a></li>
            <li <?php if ($loggedin) echo 'style="display:none"' ?>><a href="includes/signup.inc.php">SIGN UP</a></li>
            <li <?php if ($loggedin) echo 'style="display:none"' ?>><a href="includes/login.inc.php">LOGIN</a></li>
        </ul>
    </div>
    <div class="">

        <form action="includes/signup.inc.php" method="post">
            <input type="text" name="uid" placeholder="username" value="bea" />
            <input type="text" name="pwd" placeholder="password" value="abc123" />
            <input type="text" name="pwdRepeat" placeholder="repeat password" value="abc123" />
            <input type="text" name="email" placeholder="email" value="bea@itt.most" />
            <br>
            <button type="submit" name="submit">Sign up</button>

        </form>
    </div>
    <div class="">
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="username" value="bea" />
            <input type="text" name="pwd" placeholder="password" value="abc123" />
            <input type="text" name="email" placeholder="email" value="bea@itt.most" />
            <br>
            <button type="submit" name="submit">Login</button>
        </form>
    </div>
</body>

</html>