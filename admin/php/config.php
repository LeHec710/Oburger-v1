<?php
session_start();

error_reporting(E_ALL);
ini_set("display_errors", 1);
ini_set('display_startup_errors', TRUE);



include '../includes/bdd.php';
include 'php/menus.php';

function chargerClasse(string $classe) {
    $classe=str_replace('\\','/',$classe);
    require "../class/" . $classe . '.php'; 
}
spl_autoload_register('chargerClasse');


$db = new Database();
$bdd = $db->getConnexion();
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$burgerManager = new BurgerManager($bdd);
$userManager = new UserManager($bdd);

?>