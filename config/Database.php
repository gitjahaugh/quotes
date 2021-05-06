<?php 

    // Create a database connection using a class
    class Database {
        // Database parameters
        private $host = 'frwahxxknm9kwy6c.cbetxkdyhwsb.us-east-1.rds.amazonaws.com	';
        private $db_name = 'scif14nniu3kzuc5';
        private $username = 'dq2vnt8sgb11rgn8';
        private $password = 'kkqkxaorr213zyhy';
        private $conn;

        // Database connection using a try/catch block
        public function connect () {
            // Set connection parameter to null
            $this->conn = null;

            try {
                $this->conn = new PDO ('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOExecption $e) {
                echo 'Connection Error: ' .$e->getMessage();
            }
            return $this->conn;
        }
    }