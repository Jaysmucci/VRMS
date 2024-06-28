<?php 
    include_once '../phpqrcode/qrlib.php';
    require dirname(__DIR__) . './../helpers.php';

    loadDB('db');
    loadModel('vehicle-d-m');


    // instantiate database
    $database = Database::getInstance();
    $qc = new vehicleDetails($database);

    
    $vid = isset($_GET['vehicle_id']) ? $_GET['vehicle_id'] : 0;

    $url = 'http://localhost/VMS/public/?vehicle_id=';

    ob_start();
    QRcode::png($url . $vid, null, QR_ECLEVEL_L, 3);
    $imageStg  = ob_get_contents();
    ob_get_clean();;


    // define headers
    header('Cache-Control: public');
    header('Content-Description: File Transfer');
    header("Content-Disposition: attachment; filename= qr_code.png");
    header('Content-Type: application/png');
    header('Content-Tranfer-Encoding: binary');

    echo $imageStg;
    exit;