<?php
include_once '../models/signin-m.php';

// check and validate the user details
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new Signin($email, $password);
    $fetch = $user->fetchUSER();

    // if (empty($name) && empty($password)) {
    //     echo 'feilds are empty';
    // }
    
    // if(!empty($name) && !empty($password)){
    //     echo 'success!';
    // }
}