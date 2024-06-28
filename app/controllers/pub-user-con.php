<?php
require dirname(__DIR__) . './../helpers.php';
loadDB('db');
loadModel('pub-user-m');


// instantiate class Database
$database = Database::getInstance();

// instantiate class puUsers
$pubUser = new pubUsers($database);
$new  = $pubUser->read('user');