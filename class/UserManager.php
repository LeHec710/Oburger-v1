<?php

class UserManager {

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

    // add user to database
    public function addUser(User $user) {
        $insertUser = $this->bdd->prepare('insert into users(email, name, password) values(?, ?, ?)');
        $insertUser->execute(array($user->getEmail(), $user->getName(), $user->getPassword()));
        return true;
    }

    // get all users in database
    public function getAllUsers() {
        $getAllUsers = $this->bdd->query("select * from users");
        return $getAllUsers->fetchAll(PDO::FETCH_ASSOC);
    }

    // get user in database
    public function getUser($email) {
        $getUser = $this->bdd->prepare('select * from users where email = ?');
        $getUser->execute(array($email));
        $returnedUser = $getUser->fetch(PDO::FETCH_ASSOC);
        $user = new User($returnedUser["email"], $returnedUser["name"], $returnedUser["password"]);
        $user->setId($returnedUser["id"]);
        $user->setDateCreation($returnedUser["date_creation"]);
        $user->setRank($returnedUser["rank"]);
        return $user;
    }

    // return if user email already exists
    public function userExists($email) {
        $userExists = $this->bdd->prepare('select email from users where email = ?');
        $userExists->execute(array($email));
        $found = $userExists->fetchColumn();
        if($found) {
            return true;
        } else {
            return false;
        }
    }

    // redirect user
    public function redirect($url) {
       header("Location: $url");
    }

    // hash password
    public function hashPassword($password) {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    // login user
    public function loginUser($email, $password) {
        if($this->userExists($email)) {
            $user = $this->getUser($email);
            if(password_verify($password, $user->getPassword())) {
                $_SESSION["id"] = $user->getId();
                $_SESSION["email"] = $user->getEmail();
                $_SESSION["name"] = $user->getName();
                $_SESSION["date_creation"] = $user->getDateCreation();
                $_SESSION["rank"] = $user->getRank();
                $message = 'admin-'.$user->getRank();
                $this->redirect("index.php?msg=".$message);
            } else {
                $error = "Mauvais mot de passe";
            }
        } else {
            $error = "Mauvaise adresse Email.";
        }
        if(isset($error)) { return $error; }
    }

    // logout user
    public function logout() {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

    // if user is logged in
    public function isLoggedin() {
        if(isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
            return true;
        } else {
            return false;
        }
    }

    // if player is admin
    public function isAdmin() {
        if($this->isLoggedin()) {
            if($_SESSION["rank"] == "admin") {
                return true;
            } else {
                return false;
            }
        } else {
            return "Utilisateur non connecté";
        }
    }

}

?>