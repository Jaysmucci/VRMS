<?php


class vehicles{
    private $db;
    private $table_name = 'vehicles';

    public function __construct(Database $db)
    {
      $this->db = $db;  
    }


    // read the vehicle Table
    public function car(){
        // declare condition
        $result = $this->db->select($this->table_name);

        // check if any record where returned
        if ($result && count($result) > 0) {
            return $result;
        }else{
            echo 'No record found!';
            return [];
        }
    }
}