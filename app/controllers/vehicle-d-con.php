<?php
require dirname(__DIR__) . './../helpers.php';
loadDB('db');
loadModel('vehicle-d-m');

// Instantiate database
$database  = Database::getInstance();
$vehicle  = new vehicleDetails($database);

// Get the vehicle ID from the query string
$vehicle_id = isset($_GET['vehicle_id']) ? intval($_GET['vehicle_id']) : 0;

// Get combined details
$combined_details = $vehicle->getCombined($vehicle_id);

if ($combined_details) {

    // Generate and display QR code
    $qr_code = $vehicle->getqrCode($vehicle_id);
    $vid = isset($vehicle_id) ? $vehicle_id : null;

} else {
    echo 'No details found for the specified vehicle ID';
}
?>
