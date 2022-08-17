<?php
if(isset($_POST["subRegister"])) {
    if(isset($_POST["email"]) && isset($_POST["name"]) && isset($_POST["password"])) {
        if(!empty($_POST["email"]) && !empty($_POST["name"]) && $_POST["password"]) {
            $email = $_POST["email"];
            $name = $_POST["name"];
            $password = $userManager->hashPassword($_POST["password"]);

            // email verification
            if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
                // existing email verification
                if(!$userManager->userExists($email)) {
                    $user = new User($email, $name, $password);
                    $userManager->addUser($user);
                    $message = "Votre compte à bien été créé";
                    $userManager->redirect("index.php?msg=".$message);
                } else {
                    $error = "Votre adresse email est déjà utilisée par un autre utilisateur.";
                }
            } else {
                $error = "Veuillez saisir une adresse email valide";
            }
        } else {
            $error = "Veuillez remplir tous les champs.";
        }
    } else {
        $error = "Tous les champs doivent être définis.";
    }
}
?>