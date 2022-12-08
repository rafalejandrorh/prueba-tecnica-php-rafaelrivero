<?php

class User{

    private $user;
    private $firstname;
    private $lastname;
    private $contactNumber;
    private $email;

    public function setUser($user){
        $this->user = $user;
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

    public function getUser(){
        return $this->user;
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