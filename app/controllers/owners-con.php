<?php
require dirname(__DIR__) . './../helpers.php';
loadDB('db');
loadModel('owners-m');

// instantiate database
$database = new Database();
$db = $database->connect();

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

// inserting owners data to the database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $occupation = $_POST['occupation'];
    $pNumber = $_POST['phone_number'];
    $nin = $_POST['nin'];
    $vehicleType = $_POST['vehicle_type'];
    $vehicleRegNo = $_POST['vehicle_registration_no'];
    $driverID = $_POST['driver_id'];
    $image = $_POST['image'];


    // Creating a new driver
$newOwnerData = [
    'name' => $name,
    'address' => $address,
    'occupation' => $occupation,
    'phone_number' => $pNumber,
    'nin' => $nin,
    'vehicle_type' => $vehicleType,
    'vehicle_registration_no' => $vehicleRegNo,
    'drivers_id' => $driverID,
    'image' => $image
];

if ($newOwnerData) {
    $own->create($newOwnerData);
}else{
    echo 'fail to register owner';
}

echo 'success';
}

?>