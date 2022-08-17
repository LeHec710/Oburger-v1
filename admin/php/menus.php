<?php
if(isset($_SESSION["id"]) && !empty($_SESSION["id"])) {
    $menus = ["burgers", "add-burger"];
    if(isset($_GET["menu"]) && in_array($_GET["menu"], $menus)) {
        $insertMenu = $_GET["menu"].".php";
    }
} else {
    Header('Location: ../index.php');
}
?>