<?php

class Signup extends Dbh
{
    protected function checkUser($uid, $email)
    {
        $stmt = $this->connect()->prepare("SELECT uid FROM users WHERE uid = ? OR email = ?;");
        if (!$stmt->execute(array($uid, $email))) {
            $stmt = null;
            header('location: ../index.php?error=usercheckstmtfailed');
            exit();
        }
        $resultcheck = false;
        if ($stmt->rowCount() == 0) {
            $resultcheck = true;
        }
        return $resultcheck;
    }
    protected function setUser($uid, $pwd, $email)
    {
        $stmt = $this->connect()->prepare("INSERT INTO users (uid , pwd, email) VALUES(?, ?, ?)");
        $hashedPwd =password_hash($pwd, PASSWORD_DEFAULT);
        if (!$stmt->execute(array($uid, $hashedPwd, $email))) {
            $stmt=null;
            header('location: ../index.php?error=setuserstmtfailed');
            exit();
        }
        $stmt=null;

    }
}
