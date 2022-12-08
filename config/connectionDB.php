<?php

require_once('constants.php');

    class connectionDB extends PDO{

        private $dbType = DB_TYPE;
        private $dbHost = DB_HOST;
        private $dbName = DB_NAME;
        private $dbUser = DB_USER;
        private $dbPass = DB_PASSWORD;
        private $dbPort = DB_PORT;
        private $options;

        public function __construct()
        {
            // try{
            //     $this->options= [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            //     parent::__construct("{$this->tipo_de_base}:dbname={$this->nombre_de_base};port={$this->puerto};host={$this->host}", $this->usuario, $this->clave, $this->options );
            // } catch (PDOException $e) {
            //     echo '<br><br>Ha surgido un error y no se puede conectar a la base de datos. Detalle: <br><br>' . $e->getMessage().'<br><br>';
            // }
        }
    
        public function mysql()
        {
           $conn = new mysqli($this->dbHost, $this->dbUser, $this->dbPass, $this->dbName);
           return $conn; 
        }

    }

?>
