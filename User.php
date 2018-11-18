<?php

class User
{
    private $trueLogin;
    private $truePassword;

    public function __construct($login, $pass)
    {
        $this->trueLogin = $login;
        $this->truePassword = $pass;
    }

    public function check($login, $pass)
    {
        if ($this->trueLogin == $login && $this->truePassword == $pass) {
            return true;
        }
        return false;
    }

    public function logout()
    {
        $session = new Session();
        $session->destroy();
    }
}