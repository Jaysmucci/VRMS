<?php
require dirname(__DIR__) . './../helpers.php';
loadDB('db');
loadModel('drivers-m');
loadModel('fileUpload-m');


// instantiate database class
$database = new Database();
$db = $database->connect();

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

$submitted = false;

// inserting drivers data to the database
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    
    // instantiate class upload
    $uploader = new fileUpload();
    $uploader->setFile($_FILES['image']);
    $imagePath = $uploader->handleUpload();
    
    
    if ($imagePath) {
        $name = $_POST['name'];
        $address = $_POST['address'];
        $idenCardno = $_POST['identity_card_no'];
        $unitNO = $_POST['unit_no'];
        $lga = $_POST['lga'];
        $pNumber = $_POST['phone_number'];
        $nin = $_POST['nin'];
        $vehicleType = $_POST['vehicle_type'];
        $vehicleRegNo = $_POST['vehicle_reg_no'];
        $lga_code = $_POST['lga_code'];
        $owner_id = $_POST['owner_id'];


        
        // Creating a new driver
        $newDriverData = [
            'name' => $name,
            'address' => $address,
            'identity_card_no' => $idenCardno,
            'unit_no' => $unitNO,
            'lga' => $lga,
            'phone_number' => $pNumber,
            'nin' => $nin,
            'vehicle_type' => $vehicleType,
            'vehicle_registration_no' => $vehicleRegNo,
            'lga_code' => $lga_code,
            'owner_id' => $owner_id,
            'image' => $imagePath
        ];

        if ($drive->create($newDriverData)) {
            echo 'registered successfully';
        }else{
            echo 'fail to register driver';
        }
    }else {
        echo "failed to upload image";
    }
    $submitted = true;
}
?>