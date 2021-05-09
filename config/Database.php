<?php 

    // Create a database connection using a class
    class Database {
        // Database parameters
        // private $host = 'localhost';
        // private $db_name = 'quotesdb';
        // private $username = 'root';
        // private $password = 'sesame';
        private $conn;

        // Database connection using a try/catch block
        public function connect () {
            // Set connection parameter to null
            $this->conn = null;
            $url = getenv('JAWSDB_URL');
            $dbparts = parse_url($url);
            
            $hostname = $dbparts['host'];
            $username = $dbparts['user'];
            $password = $dbparts['pass'];
            $database = ltrim($dbparts['path'],'/');

            $dsn = "mysql:host={$hostname};dbname={$database}";

            try {
                // $this->conn = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
                // $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
                $this->conn = new PDO($dsn, $username, $password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOExecption $e) {
                echo 'Connection Error: ' .$e->getMessage();
            }
            return $this->conn;
        }
    }