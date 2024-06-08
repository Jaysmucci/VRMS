<?php
require dirname(__DIR__) . './../helpers.php';
loadDB('db');
loadModel('vehicle-d-m');

// instantiate database
$database  = new Database();
$db = $database->connect();

$vehicle  = new vehicleDetails($database);



// Get the vehicle ID from the query string
$vehicle_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Get the rider details
$details = $vehicle->getDriver($vehicle_id);

// Get the vehicle details
// $vehicle_details = $vehicle->getVehicle($vehicle_id);

// Get the riders and owner information
$combined = $vehicle->getCombined($vehicle_id);

//Get the Qr code 
$qr = $vehicle->getqrCode($vehicle_id);
$unit_no = isset($combined['vehicle_reg_no']) ? $combined['vehicle_reg_no'] : null;