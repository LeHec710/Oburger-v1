<?php
include 'includes/header.php';
include 'php/register.php';
include 'php/login.php';
?>
<div class="account">
    <div class="register">
        <h1 class="title">Créer un compte</h1>
        <form action="" method="post">
            <label for="email">Email :</label><br>
            <input type="email" id="email" name="email">
            <br>
            <label for="name">Prenom :</label><br>
            <input type="text" id="name" name="name">
            <br>
            <label for="password">Mot de passe :</label><br>
            <input type="password" id="password" name="password">
            <br><br>
            <input type="submit" name="subRegister" value="Créer un compte">
        </form>
    </div>

    <div class="separator"></div>

    <div class="login">
        <h1 class="title">Se connecter</h1>
        <form action="" method="post">
            <label for="email">Email :</label><br>
            <input type="email" id="email" name="email" value="<?php if(isset($_POST["email"])) {echo $_POST["email"];} ?>">
            <br>
            <label for="password">Mot de passe :</label><br>
            <input type="password" id="password" name="password">
            <br><br>
            <input type="submit" name="subLogin" value="Se connecter">
        </form>
    </div>
</div>

<?php if(isset($error)) {echo $error;} ?>

<?php
include 'includes/footer.php'
?>