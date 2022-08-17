<?php
include_once("includes/header.php");

// burger aléatoire
$burger = $burgerManager->getRandomBurger();

// phrases d'accroche
$phrases = [];
$phrase1 = "Le " . $burger['name'] . " <br> est enfin de retour !";
$phrase2 = "Savourez le bon " . $burger['name'] . " <br> dans toute sa splendeur :)";
$phrase3 = "L'incournable " . $burger['name'] . ", <br> simple et efficace !";
array_push($phrases, $phrase1);array_push($phrases, $phrase2);array_push($phrases, $phrase3);
$phrase = $phrases[array_rand($phrases)];
?>

<div class="background" id="background" style="top:0">
    <div class="left" id="left"></div>
    <div class="right" id="right"></div>
</div>

<div class="burger" style="position: absolute;">
    <img src="<?= $burger['image'] ?>" alt="<?= $burger['name'] ?>" id="burger">
</div>

<div class="content" id="content">
    <div class="burger-price">
        <h2><?= $burger['price'] . "€" ?></h2>
        <p>seulement</p>
    </div>
    <h1 id="main_title"><?= $phrase ?></h1>
    <div class="box">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis officia debitis eius ab doloribus. Culpa
            labore molestias velit iure.</p>
        <button onclick="animate_burger()">Commander<img src="images/icons/right_arrow.png"
                alt="Voir les burgers"></button>
        <div class="links" id="links">
            <a href="cart.php">
                <div id="cart">
                    <img src="images/icons/cart.png" alt="Mon panier">
                    <p>Mon panier</p>
                </div>
            </a>
            <a href="account.php">
                <div id="account">
                    <img src="images/icons/account.png" alt="Se connecter">
                    <p>Mon compte</p>
                </div>
            </a>
        </div>
    </div>
</div>

<div class="newcontent" id="newcontent">
    <?php include_once("php/commande.php") ?>
</div>

<?php
include_once("includes/footer.php");
?>