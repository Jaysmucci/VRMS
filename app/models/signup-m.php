<?php

class Signup{
    private $name;
    private $email;
    private $password;
    private $Rpassword;

    public function __construct($name, $email, $password, $Rpassword)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->Rpassword = $Rpassword;
    }

    public function validateSingup($name, $email, $password, $Rpassword){
        if (empty($name) || empty($email) || empty($password) || empty($Rpassword)) {
            $error = 'Please fill in all Fields';
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = 'Invalid email address';
        }elseif ($password !== $Rpassword) {
            $error = 'Password do not Match!';
        }
        return $error;
    }
}