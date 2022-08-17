<?php
session_start();

// display errors
error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', TRUE);

// requires
set_include_path($_SERVER['DOCUMENT_ROOT'].'/includes');
require_once 'functions.php';

// classes
$db = new Database();
$bdd = $db->getConnexion();
$burgerManager = new BurgerManager($bdd);
$userManager = new UserManager($bdd);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>O'Burger</title>
        <!--        css -->
        <link rel="stylesheet" href="css/style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
        <!--        js -->
        <script src="js/animations.js"></script>
        <!--        metas -->
        <meta charset="utf-8">
    </head>
    <body>
        <header>
            <div class="logo">
                <a href="index.php"><img src="images/logos/logo_white.png" alt="O'Burger" id="logo"></a>
            </div>
            <nav>
                <ul>
                    <a href="index.php"><li>Accueil</li></a>
                    <a href="burgers.php"><li>Nos burgers</li></a>
                    <a href=""><li>A propos</li></a>
                    <?php
                        if($userManager->isLoggedin()) {
                            echo '<a href="php/logout.php"><li>Déconnexion</li></a>';
                            if($userManager->isAdmin()) {
                                echo '<a href="admin/index.php"><li>Espace admin</li></a>';
                            }
                        }
                    ?>
                </ul>
            </nav>
        </header>