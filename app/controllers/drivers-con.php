<?php
require dirname(__DIR__) . './../helpers.php';
loadDB('db');
loadModel('drivers-m');

// instantiate database class
$database = Database::getInstance();

// Create a new Driver instance using the Database instance
$drive = new Driver($database);
$new = $drive->read();


if ($new === false) {
    // Handle error fetching data
    echo "Error fetching data from the database.";
    // You can log the error, display a message to the user, or take other appropriate action.
} else {
    // Data fetched successfully
}

?>