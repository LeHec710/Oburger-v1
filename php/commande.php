<?php

if(basename($_SERVER['PHP_SELF']) == "index.php") {
    
} else if (isset($_GET["id"]) && !empty($_GET["id"])) {
    // recuperation du burger
    $reqBurger = $bdd->prepare("select * from burgers where id = ?");
    $reqBurger->execute(array($_GET["id"]));
    $burger = $reqBurger->fetch();
} else {
    header('Location: index.php');
}


?>

   <div class="wrapper">
    <h1 class="title" id="burger-choosen-title" style="margin-left: 300px"><?= $burger['name']; ?></h1>
    <img src="<?= $burger['image'] ?>" alt="<?= $burger['name']; ?>" class="burger-choosen">
    <div class="burger-form">
        <form action="">
            <label for="boisson">Boisson:</label> <br>
            <select name="boisson" id="boisson">
                <option value="coca">Coca-cola</option>
                <option value="icetea">Ice tea</option>
                <option value="fanta">Fanta</option>
                <option value="orangina">Orangina</option>
                <option value="7up">7up</option>
            </select>
            <br><br>
            <label for="accompagnement">Accompagnement:</label> <br>
            <select name="accompagnement" id="accompagnement">
                <option value="frites">Frites</option>
                <option value="potatoes">Potatoes</option>
                <option value="onionrigs">Onion rigs</option>
                <option value="salade">Salade</option>
            </select>
            <br>
            <div class="quantite">
                <label for="quantite" style="font-size: 12px">Quantite: </label>
                <input type="number" value="1">
            </div>
            <br>
            <input type="submit" value="Ajouter au panier (+<?= $burger['price'] ?>€)" name="subCommande">
        </form>
    </div>
</div>