<?php
class signupCtrl extends Signup
{
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;

    public function __construct($uid, $pwd, $pwdRepeat, $email)
    {
        $this->uid = $uid;
        $this->pwd = $pwd;
        $this->pwdRepeat = $pwdRepeat;
        $this->email = $email;
    }

    public  function signupUser()
    {
        if (!$this->emptyInput()) {
            header('location: ../index.php?error=emptyinput ');
            exit;
        }
        if (!$this->invalidUid()) {
            header('location: ../index.php?error=invaliduid ');
            exit;
        }
        if (!$this->invalidEmail()) {
            header('location: ../index.php?error=invalidemail ');
            exit;
        }
        if (!$this->pwdMatch()) {
            header('location: ../index.php?error=passwordmatch ');
            exit;
        }
        if (!$this->uidTakenCheck()) {
            header('location: ../index.php?error=uidoremailtaken ');
            exit;
        }
        $this->setUser($this->uid, $this->pwd, $this->email);
    }


    private function emptyInput()
    {
        $result = false;
        if (empty($this->uid) || empty($this->pwd) || empty($this->email) || empty($this->pwdRepeat)) {
            $result = false;
        } else {
            $result = true;
        }
        return $result;
    }
    private function invalidUid()
    {
        $result = false;
        if (preg_match("/^[a-zA-Z0-9]*$/", $this->uid)) {
            $result = true;
        }
        return $result;
    }
    private function invalidEmail()
    {
        $result = false;
        if (filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        return $result;
    }
    private function pwdMatch()
    {
        $result = true;
        if ($this->pwd != $this->pwdRepeat) {
            $result = false;
        }
        return $result;
    }
    private function uidTakenCheck()
    {
        $result = $this->checkuser($this->uid, $this->email);
        return $result;
    }
}
