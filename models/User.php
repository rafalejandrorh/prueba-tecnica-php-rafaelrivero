<?php

/**
 * @author Rafael Rivero
*/

class User{

    private $user;
    private $firstname;
    private $lastname;
    private $contactNumber;
    private $email;
    private $identification;

    public function setDataUser($user, $identification, $firstname, $lastname, $contactNumber, $email){
        $this->user = $user;
        $this->identification = $identification;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->contactNumber = $contactNumber;
        $this->email = $email;
    }

    public function setUser($user){
        $this->user = $user;
    }

    public function setIdentification($identification){
        $this->identification = $identification;
    }

    public function setFirstname($firstname){
        $this->firstname = $firstname;
    }

    public function setLastname($lastname){
        $this->lastname = $lastname;
    }

    public function setContactNumber($contactNumber){
        $this->contactNumber = $contactNumber;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getDataUser(){
        return array(
            'User' => $this->user,
            'Identification' => $this->identification,
            'Firstname' => $this->firstname,
            'Lastname' => $this->lastname,
            'ContactNumber' => $this->contactNumber,
            'Email' => $this->email
        );
    }

    public function getUser(){
        return $this->user;
    }

    public function getIdentification(){
        return $this->identification;
    }

    public function getFirstname(){
        return $this->firstname;
    }

    public function getLastname(){
        return $this->lastname;
    }

    public function getContactNumber(){
        return $this->contactNumber;
    }

    public function getEmail(){
        return $this->email;
    }
}

?>