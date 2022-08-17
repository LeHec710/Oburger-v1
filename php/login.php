<?php
if(isset($_POST["subLogin"])) {
    if(isset($_POST["email"]) && isset($_POST["password"])) {
        if(!empty($_POST["email"]) && !empty($_POST["password"])) {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $userManager->loginUser($email, $password);
        } else {
            $error = "Veuillez remplir tous les champs";
        }
    } else {
        $error = "Tous les champs doivent être définis";
    }
}
?>