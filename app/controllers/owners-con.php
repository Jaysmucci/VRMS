<?php
require dirname(__DIR__) . './../helpers.php';
loadDB('db');
loadModel('owners-m');

// instantiate database
$database = Database::getInstance();

// create a new Owner instance using Database instance
$own = new Owners($database);
$new = $own->read();

if ($new === false) {
    // Handle error fetching data
    echo "Error fetching data from the database.";
    // You can log the error, display a message to the user, or take other appropriate action.
} else {
    // Data fetched successfully
}


?>