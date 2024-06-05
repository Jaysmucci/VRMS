<?php

class Database{
    private $hostname;
    private $port;
    private $database;
    private $username;
    private $password;
    private $conn;

    public function __construct()
    {
        // Load configuration from config.ini
        $config =  parse_ini_file(__DIR__ . "/config.ini", true);

        $this->hostname = $config['database']['hostname'];
        $this->port = $config['database']['port'];
        $this->database = $config['database']['database'];
        $this->username = $config['database']['username'];
        $this->password = $config['database']['password'];
        
    }

    // Method to Establish a Connection
    public function connect(){
        $this->conn = null;

        try {
            $dsn = "mysql:host={$this->hostname};port={$this->port};dbname={$this->database}";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (\Throwable $e) {
            //throw $th;
            $this->warn($e);
        }

        return $this->conn;
    }

    // Method to Warn 
    public function warn(PDOException $e){
        echo 'Failed to Connect:' . $e->getMessage();
    }

    // Method to Execute a Query
    public function query(string $query){
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Method to Insert a Query
    public function insert($table, $data){
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), "?"));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(array_values($data));
    }

    // Method to Select a Query
    public function select($table, $conditions = [], $columns = "*"){
        $sql = "SELECT $columns FROM $table";
        if (!empty($conditions)) {
            $conditionClauses = [];
            foreach($conditions as $column => $value){
                $conditionClauses[] = "$column = ?";
            }

            $sql .= " WHERE " . implode(" AND ", $conditionClauses);
        }
        try {
            
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array_values($conditions));

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (\Throwable $e) {
            echo 'SQL error:' . $e->getMessage() . '<br>';
            echo 'Executed SQL:' . $sql . '<br>';
            print_r($conditions);
        }
    }

    // Method to Update a Query
    public function update($table, $data, $conditions){
        $setClauses = [];
        foreach ($data as $column => $value) {
            $setClauses[] = "$column = ?";
        }

        $conditionClauses = [];
        foreach ($conditions as $column => $value) {
            $conditionClauses[] = "$column = ?";
        }
        $sql = "UPDATE $table SET " . implode(",", $setClauses) . " WHERE " . implode("AND", $conditionClauses);

        $stmt = $this->conn->perpare($sql);
        return $stmt->execute(array_merge(array_values($data)));
    }

    // Method to Delete a Query
    public function delete($table, $conditions){
        $conditionClauses = [];
        foreach ($conditions as $column => $value) {
            $conditionClauses[] = "$column = ?";
        }

        $sql = "DELETE FROM $table WHERE " . implode(" AND ", $conditionClauses);
        $stmt = $this->conn->prepare($sql);

        return $stmt->execute(array_values($conditions));
    }
}

// usage
// $db = new Database();
// $database = $db->connect();

// $condition = ['name' => 'Jane Smith'];
// $result =  $db->select('owners', $condition);

// if ($result) {
//     print_r($result);
// } else {
//     echo 'No records found';
// }
