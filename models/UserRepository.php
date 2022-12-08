<?php

/**
 * @author Rafael Rivero
*/

require_once("config/connectionDB.php");

class UserRepository{

    private $conn;
    private $db;

    public function __construct()
    {
        $this->conn = new connectionDB();
        $this->db = $this->conn->mysql();
    }

    public function create($user, $identification, $firstname, $lastname, $contactNumber, $email){
        try{
            $user = mysqli_real_escape_string($this->db, $user);
            $identification = mysqli_real_escape_string($this->db, $identification);
            $firstname = mysqli_real_escape_string($this->db, $firstname);
            $lastname = mysqli_real_escape_string($this->db, $lastname);
            $contactNumber = mysqli_real_escape_string($this->db, $contactNumber);
            $email = mysqli_real_escape_string($this->db, $email);
    
            $sql = "SELECT id FROM persons WHERE identification = $identification";
            $query = $this->db->query($sql);
            if($query->num_rows == 0)
            {
                $sql = "INSERT INTO persons (identification, firstname, lastname, contact_number, email) 
                        VALUES ('$identification', '$firstname', '$lastname', '$contactNumber', '$email')";
                $query = $this->db->query($sql);
                
                if($query)
                {
                    $sql = "SELECT id FROM users WHERE user = '$user'";
                    $query = $this->db->query($sql);
                    if($query->num_rows == 0)
                    {
                        $sql = "SELECT id FROM persons WHERE identification = '$identification'";
                        $query = $this->db->query($sql);
                        $result = $query->fetch_assoc();
                        $person_id = $result['id'];
    
                        $sql = "INSERT INTO users (user, person_id) VALUES ('$user', '$person_id')";
                        $query = $this->db->query($sql);
        
                        if($query)
                        {
                            return array(
                                'message' => 'Registro de Usuario y sus Datos Exitoso',
                            );
                        }else{
                            return array(
                                'message' => 'Se registraron los datos del Usuario, pero no se pudo registrar sus datos',   
                            );
                        }
                    }else{
                        return array(
                            'message' => 'Este Usuario ya se encuentra registrado en el Sistema',
                        );
                    }
                }else{
                    return array(
                        'message' => 'No se pudo Ingresar los datos del Usuario, por favor intente nuevamente',
                    );
                }
            }else{
                return array(
                    'message' => 'Esta identificación ya se encuentra registrada en el Sistema',
                );
            }
        }catch(Exception $e){
            return $e;
        }
    }

    public function edit($user_id, $user, $identification, $firstname, $lastname, $contactNumber, $email){

        try{
            $sql = "SELECT id FROM users WHERE id = '$user_id'";
            $query = $this->db->query($sql);
            if($query->num_rows == 0)
            {
                $modifyUser = null;
                if($user != null){
                    $user = mysqli_real_escape_string($this->db, $user);
                    $modifyUser = "user = $user, ";
                }
                if($modifyUser != null)
                {
                    $sqlUser = "UPDATE users SET $modifyUser WHERE id = '$user_id'";
                    $query = $this->db->query($sqlUser);
                }

                if($query)
                {
                    $sql = "SELECT id FROM persons WHERE identification = '$identification'";
                    $query = $this->db->query($sql);
                    if($query->num_rows == 0)
                    {
                        $sql = $sql = "SELECT person_id FROM users WHERE id = '$user_id'";
                        $query = $this->db->query($sql);
                        $result = $query->fetch_assoc();
                        $person_id = $result['person_id'];
                        
                        $modifyPersons = null;
                        if($identification != null)
                        {
                            $identification = mysqli_real_escape_string($this->db, $identification);
                            $modifyPersons.= "identification = '$identification', ";
                        }
                        if($firstname != null)
                        {
                            $firstname = mysqli_real_escape_string($this->db, $firstname);
                            $modifyPersons.= "firstname = '$firstname', ";
                        }
                        if($lastname != null)
                        {
                            $lastname = mysqli_real_escape_string($this->db, $lastname);
                            $modifyPersons.= "lastname = '$lastname', ";
                        }
                        if($contactNumber != null)
                        {
                            $contactNumber = mysqli_real_escape_string($this->db, $contactNumber);
                            $modifyPersons.= "contact_number = '$contactNumber', ";
                        }
                        if($email != null)
                        {
                            $email = mysqli_real_escape_string($this->db, $email);
                            $modifyPersons.= "email = '$email', ";
                        }

                        if($modifyPersons != null)
                        {
                            $sqlPersons = "UPDATE persons SET $modifyUser WHERE id = '$person_id'";
                            $query = $this->db->query($sqlPersons);
                        }

                        if($query)
                        {
                            return array(
                                'message' => 'Datos Editados Exitosamente',
                            );
                        }else{
                            return array(
                                'message' => 'No se pudo Editar los datos del Usuario, por favor intente nuevamente',
                            );
                        }
                    }else{
                        return array(
                            'message' => 'La Identificacion que intenta ingresar, ya se encuentra en uso',
                        );
                    }
                }else{
                    return array(
                        'message' => 'No se pudo Editar el Usuario, por favor intente nuevamente',
                    );
                }
            }else{
                return array(
                    'message' => 'El Usuario ya se encuentra en uso, por favor intente nuevamente',
                );
            }
        }catch(Exception $e){
            return $e;
        }
    }

    public function delete($user_id){
        
        try{
            $sqlPersons = "SELECT person_id WHERE id = '$user_id'";
            $query = $this->db->query($sqlPersons);
            $result = $query->fetch_assoc();
            $person_id = $result['person_id'];

            $sqlUser = "DELETE FROM users WHERE id = '$user_id'";
            $query = $this->db->query($sqlUser);

            if($query)
            {
                $sqlPerson = "DELETE FROM persons WHERE id = '$person_id'";
                $query = $this->db->query($sqlPerson);

                if($query)
                {
                    return array(
                        'message' => 'Se eliminó al Usuario y sus Datos exitosamente',
                    );
                }else{
                    return array(
                        'message' => 'No se pudo Eliminar a la Persona asociada a este Usuario, por favor intente nuevamente',
                    );
                }
            }else{
                return array(
                    'message' => 'No se pudo Eliminar el Usuario, por favor intente nuevamente',
                );
            }
        }catch(Exception $e){
            return $e;
        }
    }
}

?>