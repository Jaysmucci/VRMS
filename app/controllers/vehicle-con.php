<?php
require dirname(__DIR__) . './../helpers.php';
loadDB('db');
loadModel('vehicle-m');

// instantiate database
$database  = new Database();
$db = $database->connect();

// instantiate class vehicleProfile
// $pubUser = new VehicleProfile($database);
// $new  = $pubUser->read('id');


// $conditon = [ 'id' => 13];
$data = $database->select('riders');



if ($data === false) {
    echo 'failed to fetch data';
}else{
    // var_dump($data);
}
