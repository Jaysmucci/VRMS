<?php
require dirname(__DIR__) . './../helpers.php';
loadDB('db');
loadModel('vehicles');


// instantiate class Database
$database = new Database();
$db = $database->connect();

// instantiate class vehicles
$vehicle = new vehicles($database);
$vType = $vehicle->car();
