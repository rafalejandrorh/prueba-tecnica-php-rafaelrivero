<?php

require_once('constants.php');

    class connectionDB extends PDO{

        private $dbHost = DB_HOST;
        private $dbName = DB_NAME;
        private $dbUser = DB_USER;
        private $dbPass = DB_PASSWORD;
        private $dbPort = DB_PORT;

        public function __construct()
        {
            
        }
    
        public function mysql()
        {
           $conn = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName, $this->dbPort);
           return $conn; 
        }

    }

?>
