<?php
require dirname(__DIR__) . './../helpers.php';
loadModel('signin-m');

$is_invalid = false;

// check and validate the user details
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // load database
    loadDB('db');

    $email = $_POST['email'] ?? "";
    $password = $_POST['password'] ?? "";

    // instantiate DATABASE
    $db = new Database();
    $database = $db->connect();

    

    // fetch user data with the email and password provided
    $condition = ['email' => $email, 'password' => $password];
    $result =  $db->select('qr_controllers', $condition, 'user_name, email, password, role');
    var_dump($result);



    if ($result && password_verify($password, $result[0]['password'])) {
        session_start();
        // Assuming result is a single row, get the first item
        $user = $result[0];
        
        $_SESSION['user_id'] = $user['user_name'];
        $_SESSION['user_role'] = $user['role'];
        header("Location: home");
        exit;
        
    }


    $is_invalid = true;
}