<?php

/**
 *
 *
 * @author Rafael Rivero
 */

require_once("../config/connectionDB.php");

class UserRepository{

    private $conn;
    private $db;

    public function __construct()
    {
        $this->conn = new connectionDB();
        $this->db = $this->conn->mysql();
    }

    public function getAllData()
    {
        $sql = "SELECT * FROM users";
        $query = $this->db->query($sql);
        return $query->fetch_all();
    }

    public function create($user, $identification, $firstname, $lastname, $contactNumber, $email)
    {
        $user = mysqli_real_escape_string($this->db, $user);
        $identification = mysqli_real_escape_string($this->db, $identification);
        $firstname = mysqli_real_escape_string($this->db, $firstname);
        $lastname = mysqli_real_escape_string($this->db, $lastname);
        $contactNumber = mysqli_real_escape_string($this->db, $contactNumber);
        $email = mysqli_real_escape_string($this->db, $email);

        $sql = "INSERT INTO persons ('identification', 'firstname', 'lastname'. 'contact_number', 'email') 
                VALUES ($identification, $firstname, $lastname, $contactNumber, $email)";
        $query = $this->db->query($sql);
        
        if($query)
        {
            $sql = "SELECT id FROM persons WHERE identification = $identification";
            $query = $this->db->query($sql);
            $person_id = $query['id'];

            $sql = "INSERT INTO users ('user', 'person_id') VALUE ($user, $person_id)";
            $query = $this->db->query($sql);

            if($query)
            {
                return 'Registro de Usuario y sus Datos Exitoso';
            }else{
                return 'Se registraron los datos del Usuario, pero no se pudo registrar sus datos';
            }
        }else{
            return 'No se pudo Ingresar los datos del Usuario, por favor intente nuevamente';
        }
    }

    public function edit($user_id, $user, $identification, $firstname, $lastname, $contactNumber, $email){
        
        if($user != null){
            $user = mysqli_real_escape_string($this->db, $user);
            $modifyUser = "user = $user, ";
        }
        $sqlUser = "UPDATE users SET $modifyUser WHERE id = $user_id";
        $query = $this->db->query($sqlUser);

        $sql = $sql = "SELECT id FROM persons WHERE id = $user_id";
        $query = $this->db->query($sql);
        $person_id = $query['id'];

        $sqlPersons = "UPDATE users SET $modifyUser WHERE id = $user_id";

    }
}

?>