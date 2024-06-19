<?php
require dirname(__DIR__) . './../helpers.php';
loadDB('db');
loadModel('count-m');


// instantiate class Database
$database = new Database();
$db = $database->connect();

// instatiate class Count
$counting = new Count($database);
$users = $counting->users('user');



// instantiate method rider
$riding = $counting->rider();

// instantiate method owner
$owner = $counting->owner();

// instantiate method vehicle
$vehicle = $counting->vehicle();