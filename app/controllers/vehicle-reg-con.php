<?php
require dirname(__DIR__) . './../helpers.php';
loadDB('db');
loadModel('fileUpload-m');
loadModel('drivers-m');
loadModel('owners-m');
loadModel('vehicles');

// Instantiate class database
$database = Database::getInstance();

// Instantiate class Owners
$own = new Owners($database);

// Instantiate class Drivers
$drive = new Driver($database);

// Instantiate class Vehicles
$ride = new Vehicles($database);

$submitted = false;

// Inserting data into the database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {

    $ownerImagePath = null;
    $driveImagePath = null;
    $vehicleImagePath = null;

    // Handle owner Image upload
    if (isset($_FILES['owner_image'])) {
        $uploader = new fileUpload();
        $uploader->setFile($_FILES['owner_image']);
        $uploadResult = $uploader->handleUpload('uploads/owner/');
        if ($uploadResult['success']) {
            $ownerImagePath = $uploadResult['path'];
        } else {
            echo "Failed to upload owner image: " . $uploadResult['message'];
            exit;
        }
    }

    // Handle driver Image upload
    if (isset($_FILES['driver_image'])) {
        $uploader = new fileUpload();
        $uploader->setFile($_FILES['driver_image']);
        $uploadResult = $uploader->handleUpload('uploads/driver/');
        if ($uploadResult['success']) {
            $driveImagePath = $uploadResult['path'];
        } else {
            echo "Failed to upload driver image: " . $uploadResult['message'];
            exit;
        }
    }

    // Handle vehicle Image upload
    if (isset($_FILES['vehicle_image'])) {
        $uploader = new fileUpload();
        $uploader->setFile($_FILES['vehicle_image']);
        $uploadResult = $uploader->handleUpload('uploads/vehicle/');
        if ($uploadResult['success']) {
            $vehicleImagePath = $uploadResult['path'];
        } else {
            echo "Failed to upload vehicle image: " . $uploadResult['message'];
            exit;
        }
    }

    // Insert Owner data to database
    $ownerData = [
        'name' => $_POST['owner_name'],
        'address' => $_POST['owner_address'],
        'occupation' => $_POST['owner_occupation'],
        'phone_number' => $_POST['owner_phone_number'],
        'nin' => $_POST['owner_nin'],
        'image' => $ownerImagePath
    ];

    // Insert owner and capture last inserted ID
    $owner_id = $own->create($ownerData);
    if ($owner_id) {
        echo "Owner registered successfully!";
    } else {
        echo "Failed to register owner";
        exit;
    }

    // Debugging output
    // echo '<pre>';
    // print_r($ownerData);
    // echo '</pre>';

    // Insert Driver data to database
    $driverData = [
        'name' => $_POST['driver_name'],
        'address' => $_POST['driver_address'],
        'identity_card_no' => $_POST['driver_identity_card_no'],
        'phone_number' => $_POST['driver_phone_number'],
        'nin' => $_POST['driver_nin'],
        'image' => $driveImagePath,
        'owner_id' => $owner_id
    ];

    // Insert driver and capture last inserted ID
    $driver_id = $drive->create($driverData);
    if ($driver_id) {
        echo "Driver registered successfully!";
    } else {
        echo "Failed to register driver";
        exit;
    }

    // Debugging output
    // echo '<pre>';
    // print_r($driverData);
    // echo '</pre>';

    // Insert Vehicle data to database
    $vehicleData = [
        'owner_nin' => $_POST['owner_nin'],
        'driver_nin' => $_POST['driver_nin'],
        'vehicle_type' => $_POST['vehicle_type'],
        'vehicle_registration_no' => $_POST['vehicle_reg_no'],
        'lga' => $_POST['driver_lga'],
        'lga_code' => $_POST['lga_code'],
        'unit_no' => $_POST['driver_unit_no'],
        'vehicle_image' => $vehicleImagePath,
        'owner_id' => $owner_id,
        'driver_id' => $driver_id
    ];

    // Insert vehicle
    if ($ride->create($vehicleData)) {
        echo "Vehicle registered successfully!";
    } else {
        echo 'Failed to register vehicle';
        exit;
    }

    // Debugging output
    // echo '<pre>';
    // print_r($vehicleData);
    // echo '</pre>';

    $submitted = true;

    header('Location: ../views/register');
}


?>
