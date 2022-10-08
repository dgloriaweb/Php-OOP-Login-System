<?php
if(isset($_POST['submit']) ) {
    $uid = $_POST['uid'];
    $pwd = $_POST['pwd'] ;
    $pwdRepeat = $_POST['pwdRepeat'];
    $email = $_POST['email'];

    
    include "../classes/dbh.class.php";
    include "../classes/signup.class.php";
    include "../classes/signup-ctrl.class.php";
    $signup = new signupCtrl($uid, $pwd, $pwdRepeat, $email);

    $signup->signupUser();
    header("Location: ../index.php");
    exit();
}
