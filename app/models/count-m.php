<?php 

class Count{
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    // read Table users
    public function users($user_id){
        $table_user = 'users';

        // prepare SQL condition to fetch
        $condition = ['role' => $user_id];
        $result = $this->db->select($table_user, $condition, 'id');

        // check if any record where returned
        if ($result && count($result) > 0) {
            return $result;  // return all record as an associative array
        }else {
            echo "No records found!";
            return [];
        }
    }

    // read Table riders
    public function rider(){
        $table_driver = 'riders';

        $result = $this->db->select($table_driver, [] , 'id');

        // check if any record where returned
        if ($result && count($result) > 0) {
            return $result;  // return all record as an associative array
        }else {
            echo "No records found!";
            return [];
        }
    }

    // read Table owner
    public function owner(){
        $table_owner = 'owners';
        
        $result = $this->db->select($table_owner, [] , 'id');

        // check if any record where returned
        if ($result && count($result) > 0) {
            return $result;  // return all record as an associative array
        }else {
            echo "No records found!";
            return [];
        }
    }

    // read Table vehicle
    public function vehicle(){
    $table_vehicle = 'vehicles';

    $result = $this->db->select($table_vehicle, [], 'id');

    // check if any record where returned
    if ($result && count($result) > 0) {
        return $result; // return all record as an associative array
    }else {
        echo "No records found!";
        return [];
    }

    }
}