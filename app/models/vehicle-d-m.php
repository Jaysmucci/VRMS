<?php 

 class vehicleDetails{
    public $id;
    private $db;

    public function __construct(Database $db)
    {
        $this->db = $db;
    }

    public function getID(){
        $this->id  = isset($_GET['id'] ) ? $_GET['id' ] : null;
    }
 }