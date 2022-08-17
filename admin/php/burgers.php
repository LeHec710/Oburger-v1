<?php
$burgersResearch = $burgerManager->getAllBurgers();
if(isset($_POST["subSearchBurger"])) {
    if(!empty($_POST["searchBurger"])) {
        $burgersResearch = $burgerManager->getBurgersByName($_POST["searchBurger"]);
    }
} else {
    $burgersResearch = $burgerManager->getAllBurgers();
}

if(isset($_POST["deleteBurger"])) {
    $burgerManager->deleteById($_POST["burgerId"]);
    Header('refresh:0');
}

if(isset($_POST["subEdit"])) {
    $editingBurger = $burgerManager->getBurgerById($_POST["burgerId"]);
    $updateParams = array();
    if($editingBurger["name"] !== $_POST["editName"]) {
        $updateParams += ["name" => $_POST["editName"]];
    }
    if($editingBurger["price"] !== $_POST["editPrice"]) {
        $updateParams += ["price" => $_POST["editPrice"]];
    }
    $burgerManager->updateById($_POST["burgerId"], $updateParams);
    Header('refresh:0');
}

if(isset($_POST["addBurger"])) {
    if(isset($_POST["name"]) && isset($_POST["price"]) && isset($_POST["desc"])) {
        $name = $_POST["name"];
        $price = $_POST["price"]*1;
        $desc = $_POST["desc"];
        if(!empty($name) && !empty($price) && !empty($desc) && file_exists($_FILES["image"]["tmp_name"])) {
            $imgPath = $burgerManager->moveBurgerImage($_FILES["image"], $name);
            $params = array(
                "name" => $name,
                "price" => $price,
                "description" => $desc,
                "image" => $imgPath
            ); 
            $burgerManager->insertBurger($params);
            Header('Location: ?menu=burgers');
        } else {
            $error = "Veuillez remplir tous les champs";
        }
    } else {
        $error = "Tous les champs doivent être définis";
    }
}

?>