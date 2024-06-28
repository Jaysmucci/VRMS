<?php
include_once '../phpqrcode/qrlib.php';

class vehicleDetails {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getDriver($driver_id) {
        if ($driver_id) {
            $condition = ['driver_id' => $driver_id];
            $result = $this->db->select('riders', $condition, 'image, name, phone_number, nin');
            if ($result && count($result) > 0) {
                return $result[0];
            }
        }
        return null;
    }

    public function getOwner($owner_id) {
        if ($owner_id) {
            $condition = ['owner_id' => $owner_id];
            $result = $this->db->select('owners', $condition, 'image, name, phone_number, nin');
            if ($result && count($result) > 0) {
                return $result[0];
            }
        }
        return null;
    }

    public function getVehicle($vehicle_id) {
        if ($vehicle_id) {
            $condition = ['vehicle_id' => $vehicle_id];
            $result = $this->db->select('vehicles', $condition, 'owner_id, driver_id, vehicle_registration_no, lga, lga_code, vehicle_type, unit_no');
            if ($result && count($result) > 0) {
                return $result[0];
            }
        }
        return null;
    }

    // method to get the owner, driver and vehicle (combined)

    public function getCombined($vehicle_id) {
        $vehicle = $this->getVehicle($vehicle_id);

        if ($vehicle) {
            $owner = $this->getOwner($vehicle['owner_id']);
            $driver = $this->getDriver($vehicle['driver_id']);

            if ($owner && $driver) {
                return [
                    'driver_name' => $driver['name'],
                    'owner_name' => $owner['name'],
                    'driver_image' => $driver['image'],
                    'owner_image' => $owner['image'],
                    'driver_phone' => $driver['phone_number'],
                    'owner_phone' => $owner['phone_number'],
                    'vehicle_reg_no' => $vehicle['vehicle_registration_no'],
                    'lga' => $vehicle['lga'],
                    'lga_code' => $vehicle['lga_code'],
                    'vehicle_type' => $vehicle['vehicle_type'],
                    'unit_no' => $vehicle['unit_no']
                ];
            }
        }
        return null;
    }

    public function getqrCode($vehicle_id) {
        $vehicle = $this->getCombined($vehicle_id);

        if ($vehicle && isset($vehicle_id)) {
            $unit_no = $vehicle_id;
            $url = 'http://localhost/VMS/public/?vehicle_id=';

            ob_start();
            QRcode::png($url . $unit_no, null, QR_ECLEVEL_L, 3);
            $imageString = ob_get_contents();
            ob_end_clean();

            return 'data:image/png;base64,' . base64_encode($imageString);
        } else {
            echo 'No unit number';
        }
        return null;
    }
}
?>
