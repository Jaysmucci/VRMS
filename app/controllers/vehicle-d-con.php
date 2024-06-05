<?php
require dirname(__DIR__) . './../helpers.php';
loadDB('db');
loadModel('vehicle-d-m');

// instantiate database
$database  = new Database();
$db = $database->connect();

$vehicle  = new vehicleDetails($database);
$details = $vehicle->getID();

var_dump($details);