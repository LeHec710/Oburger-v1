<?php

class Database{
    
    // variables
    private $host = "localhost";
    private $db_name = "Oburger";
    private $username = "root";
    private $password = "";
    private $con;
     
    // return database connexion
    public function getConnexion(){
        $this->con = null;
 
        try {
            $this->con = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->con->exec("set names utf8");
        }
         catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
 
        return $this->con;
    }
}

?>