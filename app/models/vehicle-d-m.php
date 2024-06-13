<?php 
    include_once '../phpqrcode/qrlib.php';

 class vehicleDetails{
    public $id;
    // private $table_name = 'riders';
    private $db;
    private $text;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getDriver($vehicle_id){
        // Get the vehicle ID from the query string
        // $vehicle_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        if ($vehicle_id > 0) {
            $condition = ['id' => $vehicle_id];
            $result = $this->db->select('riders', $condition, 'image, name, phone_number, owner_id,vehicle_registration_no, lga, lga_code, vehicle_type, unit_no');


            if ($result  &&  count($result) > 0) {
                return $result[0]; // Return the first (and only) result
            }
        }
        return null; // Return null if no vehicle is found or if ID is invalid
    }

    public function getOwner($vehicle_id){

        if ($vehicle_id > 0) {
            $condition = ['id' => $vehicle_id];
            $result = $this->db->select('owners', $condition, ' image, name, phone_number');


            
        if ($result && count($result) > 0) {
            return $result[0]; // Return the first (and only ) result
        }
        }
        return null; // Return null if no owner is found or the  ID is invalid
    }

    public function getVehicle($vehicle_id){

        if ($vehicle_id) {
            $condition = ['id' => $vehicle_id];
            $result = $this->db->select('vehicles', $condition, 'vehicle_registration_no, lga, lga_code, vehicle_type, unit_no');

            if ($result && count($result) > 0) {
                return $result[0];
            }
        }
        return null;
    }

    public function getCombined($vehicle_id) {
        // get the rider details
        $driver = $this->getDriver($vehicle_id);

        if ($driver) {
            // get the owner details using the owner_id from the driver details
            $owner = $this->getOwner($driver['owner_id']);

            if ($owner) {
                // combine the driver and owner details
                return [
                    'driver_name' => $driver['name'],
                    'owner_name' => $owner['name'],
                    'driver_image' => $driver['image'],
                    'owner_image' => $owner['image'],
                    'driver_phone' => $driver['phone_number'],
                    'owner_phone' => $owner['phone_number'],
                    'vehicle_reg_no' => $driver['vehicle_registration_no'],
                    'lga' => $driver['lga'],
                    'lga_code' => $driver['lga_code'],
                    'vehicle_type' => $driver['vehicle_type'],
                    'unit_no' => $driver['unit_no']
                ];
            }
        }
        
    }

    public function getqrCode($vehicle_id){
        $vehicle = $this->getCombined($vehicle_id);
        // $this->text = $text;

        // $qr = QRcode::png($text);

        if ($vehicle && isset($vehicle['vehicle_reg_no'])) {
            // generate the Qr code for the unit no
            $unit_no = $vehicle['vehicle_reg_no'];

            // get url for dislay
            $url  = 'http://localhost/VMS/public/?vehicle_registration_no=';

            ob_start();
            QRcode::png($url . $unit_no, null, QR_ECLEVEL_L, 3); // Ensuring proper size and error correction level
            $imageString = ob_get_contents();
            ob_end_clean();


            return  'data:image/png;base64,' .  base64_encode($imageString);
            
        }else{
            echo 'No unit number';
        }
    return $vehicle;

    }
 }