<?php

class Database {
    private $hostname;
    private $port;
    private $database;
    private $username;
    private $password;
    private $conn;
    private static $instance = null;

    private function __construct() {
        // Load configuration from config.ini
        $config = parse_ini_file(__DIR__ . "/config.ini", true);

        $this->hostname = $config['database']['hostname'];
        $this->port = $config['database']['port'];
        $this->database = $config['database']['database'];
        $this->username = $config['database']['username'];
        $this->password = $config['database']['password'];

        $this->connect(); // Instantiate method connect
    }

    // Singleton pattern to ensure a single instance
    public static function getInstance() {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Method to Establish a Connection
    private function connect() {
        $this->conn = null;

        try {
            $dsn = "mysql:host={$this->hostname};port={$this->port};dbname={$this->database}";
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            $this->warn($e);
        }
    }

    // Method to Warn
    private function warn(PDOException $e) {
        echo 'Failed to Connect: ' . $e->getMessage();
    }

    // Method to Execute a Query
    public function query(string $query) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Method to Insert a Query
    public function insert($table, $data) {
        
        // Check if $data is an array
        if (!is_array($data)) {
            throw new InvalidArgumentException("Data must be an array");
        }
        
        $columns = implode(',', array_keys($data));
        $placeholders = implode(',', array_fill(0, count($data), "?"));
        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";
    
        try {
            $stmt = $this->conn->prepare($sql);
            $success = $stmt->execute(array_values($data));
    
            if ($success) {
                return $this->conn->lastInsertId(); // Return the last inserted ID if successful
            } else {
                return false; // Return false if insertion failed
            }
        } catch (PDOException $e) {
            echo 'Insert failed: ' . $e->getMessage(); // Improve error handling
            return false;
        }
    }
    

    // Method to Select a Query
    public function select($table, $conditions = [], $columns = "*") {
        $sql = "SELECT $columns FROM $table";
        if (!empty($conditions)) {
            $conditionClauses = [];
            foreach ($conditions as $column => $value) {
                $conditionClauses[] = "$column = ?";
            }
            $sql .= " WHERE " . implode(" AND ", $conditionClauses);
        }
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(array_values($conditions));
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'SQL error: ' . $e->getMessage() . '<br>';
            echo 'Executed SQL: ' . $sql . '<br>';
            print_r($conditions);
        }
    }

    // Method to Update a Query
    public function update($table, $data, $conditions) {
        $setClauses = [];
        foreach ($data as $column => $value) {
            $setClauses[] = "$column = ?";
        }

        $conditionClauses = [];
        foreach ($conditions as $column => $value) {
            $conditionClauses[] = "$column = ?";
        }
        $sql = "UPDATE $table SET " . implode(",", $setClauses) . " WHERE " . implode(" AND ", $conditionClauses);

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(array_merge(array_values($data), array_values($conditions)));
    }

    // Method to Delete a Query
    public function delete($table, $conditions) {
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
$db = Database::getInstance();
