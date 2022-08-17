<?php

class BurgerManager {
    
    // variables
    public $bdd;
    
    // constructor
    public function __construct($bdd) {
        $this->setBdd($bdd);
    }
    
    // database connexion
    public function setBdd($bdd) {
        $this->bdd = $bdd;
    }
    
    // add burger to database
    public function addBurger(Burger $burger) {
        $insertBurger = $this->bdd->prepare("insert into burgers(name, price, image) values(?, ?, ?)");
        $insertBurger->execute(array($burger->getName(), $burger->getPrice(), $burger->getImage()));
    }

    // delete burger in database (by id)
    public function deleteById($id) {
        $deleteBurger = $this->bdd->prepare('delete from burgers where id = ?');
        $deleteBurger->execute(array($id));
        // delete image 
    }

    // update burger in database (by id)
    public function updateById($id, $update = array()) {
        $toUpdateSql = "";
        $index = 0;
        forEach($update as $default => $key) {

            if(!empty($default)) {
                $toUpdateSql = $toUpdateSql . $default . "= ?";
                if($index !== count($update)-1 && count($update)-1 > 0) {
                    $toUpdateSql = $toUpdateSql . ", ";
                }
            }
            $index++;
        }

        $sql = 'update burgers set '.$toUpdateSql.' where id = ?';
        array_push($update, intval($id));

        $updateBurger = $this->bdd->prepare($sql);
        $updateBurger->execute(array_values($update));
    }
    
    // instert burger in database
    public function insertBurger($insert = array()) {
        $toInsertSql = "";
        $toInsertSql2 = "";
        $index = 0;
        forEach($insert as $default => $key) {
            if(!empty($default)) {
                $toInsertSql = $toInsertSql . $default;
                $toInsertSql2 = $toInsertSql2 . "?";
                if($index !== count($insert)-1 && count($insert)-1 > 0) {
                    $toInsertSql = $toInsertSql . ", ";
                    $toInsertSql2 = $toInsertSql2 . ", ";
                }
            }
            $index++;
        }

        $sql = 'insert into burgers('.$toInsertSql.')  values('.$toInsertSql2.')';
        $updateBurger = $this->bdd->prepare($sql);
        $updateBurger->execute(array_values($insert));
    }

    // return all burgers
    public function getAllBurgers() {
        $getAllBurgers = $this->bdd->query("select * from burgers");
        return $getAllBurgers->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBurgersByName($name) {
        $getBurgersByName = $this->bdd->prepare("select * from burgers where name like ?");
        $getBurgersByName->execute(array("%$name%"));
        return $getBurgersByName->fetchAll(PDO::FETCH_ASSOC);
    }
    
    // return asked burger
    public function getBurger($burger) {
        // find by int or by name
        if(gettype($burger) == "integer") {
            $getBurger = $this->bdd->prepare("select * from burgers where id = ?");
        } else {
            $getBurger = $this->bdd->prepare("select * from burgers where name = ?");
        }
        $getBurger->execute(array($burger));
        return $getBurger->fetch(PDO::FETCH_ASSOC);
    }

    public function getBurgerById($id) {
        // find by int or by name
        $getBurger = $this->bdd->prepare("select * from burgers where id = ?");
        $getBurger->execute(array($id));
        return $getBurger->fetch(PDO::FETCH_ASSOC);
    }
    
    // return a random burger
    public function getRandomBurger() {
        $getRandom = $this->bdd->prepare("select * from burgers order by rand() limit 1");
        $getRandom->execute();
        return $getRandom->fetch(PDO::FETCH_ASSOC);
    }

    public function moveBurgerImage($image, $name) {
        $allowedExts = array("gif", "jpeg", "jpg", "png");
        $array = explode(".", $image["name"]);
        $extension = end($array);
        if(in_array($extension, $allowedExts)) {
            $dir =  $_SERVER['DOCUMENT_ROOT']."/O'burger/images/burgers/".$name.".".$extension;
            if (move_uploaded_file($image['tmp_name'], $dir)) {
                return "images/burgers/".$name.".".$extension;
            }
        }
        return false;
    }
    
}

?>