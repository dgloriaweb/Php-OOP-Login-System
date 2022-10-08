<?php
if(isset($_POST['submit']) ) {
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'] ;

    
    include "../classes/dbh.class.php";
    include "../classes/login.class.php";
    include "../classes/login-ctrl.class.php";
    $login = new LoginCtrl($uid, $pwd);

    $login->loginUser();
    header("Location: ../index.php");
    exit();
}
