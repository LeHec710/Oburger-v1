<?php

class User {

    // variables
    private $id;
    private $email;
    private $name;
    private $password;
    private $date_creation;
    private $rank;

    // constructor
    public function __construct($email, $name, $password) {
        $this->email = $email;
        $this->name = $name;
        $this->password = $password;
    }

    // getter and setter for id
    public function getId() {return $this->id;}
    public function setId($id) {$this->id = $id;}

    // getter and setter for email
    public function getEmail() {return $this->email;}
    public function setEmail($email) {$this->email = $email;}

    // getter and setter for name
    public function getName() {return $this->name;}
    public function setName($name) {$this->name = $name;}

    // getter and setter for password
    public function getPassword() {return $this->password;}
    public function setPassword($password) {$this->password = $password;}

    // getter and setter for date_creation
    public function getDateCreation() {return $this->date_creation;}
    public function setDateCreation($date_creation) {$this->date_creation = $date_creation;} 
    
    // getter and setter for admin
    public function getRank() {return $this->rank;}
    public function setRank($rank) {$this->rank = $rank;}

}

?>