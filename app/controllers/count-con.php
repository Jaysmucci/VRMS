<?php
require dirname(__DIR__) . './../helpers.php'; // Adjust path as per your file structure
loadDB('db'); // Assuming this function loads your database configuration
loadModel('count-m'); // Assuming this function loads your Count class

// Assuming your Database and Count classes are already defined and included/autoloaded
$database = new Database(); // Instantiate your Database class
$connect = $database->connect(); // Instantiate method connect
$counting = new Count($database); // Instantiate your Count class

// Fetch all data
$users = $counting->users('user');
$riders = $counting->rider();
$owners = $counting->owner();
$vehicles = $counting->vehicle();

// Combine data into a single array
$data = [
    'users' => $users,
    'riders' => $riders,
    'owners' => $owners,
    'vehicles' => $vehicles
];

jsonResponse($data);
?>