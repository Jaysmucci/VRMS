<?php
include './DB/db.php';
include '../controllers/signin-con.php';

class Signin {
    protected $email;
    protected $password;

    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
    }

    // Method to fetch the Admins
    public function fetchUSER(){
        $db = new Database();

        if ($db) {
            $admin = $db->select('qr_controllers');
            return $admin;
        }
    }
}