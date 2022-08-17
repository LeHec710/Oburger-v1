<?php
include_once("includes/header.php");
?>

<div class="wrapper">
    <h1 class="title">Nos burgers</h1>
    <div class="burgers-list">
       <?php foreach($burgerManager->getAllBurgers() as $burger): ?>
            <div class="burger-item">
        <a href="burger.php?id=<?= $burger['id']; ?>">
                <h3><?= $burger['name']; ?></h3>
                <img src="<?= $burger['image'] ?>" alt="<?= $burger['name']; ?>">
        </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php
include_once("includes/footer.php");
?>