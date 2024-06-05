<?php
// include './DB/db.php';
// include '../controllers/signin-con.php';

class Signin {
    protected $email;
    protected $password;
    protected $db;

    public function __construct($email, $password, $db)
    {
        $this->email = $this->sanitizeEmail($email);
        $this->password = $password;
        $this->db = $db;
    }

    // Method to fetch the Admins
    public function fetchUSER(){
        $db = new Database();

        if ($this->db) {
            $stmt = $this->db->prepare("SELECT user_name, email, password, role FROM qr_controllers WHERE email = ?");
            $stmt->execute([$this->email]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            // verify if the password is found!
            if ($user && password_verify($this->password, $user['password'])) {
                return $user;
            }
        }
        return false;
    }


    // Method to sanitize email
    private function sanitizeEmail($email){
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}