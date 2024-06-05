<?php 
require dirname(__DIR__) . './../helpers.php';

$is_invalid = false;
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' &&  isset($_POST['submit'])) {
    // load database
    loadDB('db');

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $Rpassword = $_POST['Rpassword'];

    // Check if the passwords match
    if (!$password) {
        $error = "Error: Passwords does'nt exist";
    } elseif (empty($name) || empty($email) || empty($password) ) {
        $error = 'Please fill in all fields';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Invalid email address';
    } else {
        // intantiate Database Connection
        $db = new Database();
        $database = $db->connect();

        // hash password to avoid exploit
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // prepare the data
        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword
        ];

        // insert the data to the database
        if ($db->insert('qr_pub_users', $data)) {
            echo "User registered successfully.";
        } else {
            $error = "Error: Could not register user.";
        }
    }
    $is_invalid = true;
}

// Display error if any
// if (!empty($error)) {
//     echo $error;
// }
?>
