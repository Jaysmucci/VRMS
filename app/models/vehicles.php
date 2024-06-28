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

    // function to create data
    public function create($data){
        return $this->db->insert($this->table_name, $data);
    }

    // function to upadate data
    public function update($data, $conditions){
        return $this->db->update($this->table_name, $data, $conditions);
    }

    // function to delete data
    public function delete($conditions){
        return $this->db->delete($this->table_name, $conditions);
    }
}