<?php

class Login extends Dbh
{
    protected function getUser($uid, $pwd)
    {
        $stmt = $this->connect()->prepare("SELECT pwd FROM users where uid= ? OR email= ?;");
        if (!$stmt->execute(array($uid, $pwd))) {
            $stmt = null;
            header('location: ../index.php?error=selectuserstmtfailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            header('location: ../index.php?error=usernotfound');
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $checkPwd = password_verify($pwd, $pwdHashed[0]['pwd']);
        if (!$checkPwd) {
            $stmt = null;
            header('location:../index.php?error=checkpwdfailed');
            exit();
        } else {
            $stmt2 = $this->connect()->prepare("SELECT * FROM users where uid= ? OR email= ?;");
            $stmt2->execute(array($uid, $uid));
            $user = $stmt2->fetchAll(PDO::FETCH_ASSOC);
            session_start();
            $_SESSION['uid'] = $user[0]['uid'];
        }


        $stmt = null;
    }
}
