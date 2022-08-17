<div class="container burgers">
    <form method="post" action="" class="searchbar">
        <input type="text" placeholder="Rechercher un burger" name="searchBurger" value="<?php if(isset($_POST["searchBurger"])) { echo $_POST["searchBurger"]; } ?>">
        <button type="submit" name="subSearchBurger"><i class="fas fa-search"></i></button>
    </form>
    <div class="burgers-container table">
        <div class="row selectors">
            <ul>
                <li>id</li>
                <li>image</li>
                <li>nom</li>
                <li>prix</li>
                <li></li>
            </ul>
        </div>

        <?php
        foreach($burgersResearch as $burger){ ?>
            <!-- elements -->
            <div class="row element">
                    <ul>
                        <li><?= $burger["id"]; ?></li>
                        <li><img src="../<?= $burger["image"]; ?>" alt=""></li>
                        <li><?= $burger["name"]; ?></li>
                        <li><?= $burger["price"]; ?>€</li>
                        <li class="action">
                            <i id="deleteBurger" class="fas fa-trash-alt deleteBurger" burgerId="<?= $burger["id"]; ?>"></i>
                            <i id="editBurger" class="far fa-edit editBurger" burgerId="<?= $burger["id"]; ?>"></i>
                        </li>
                    </ul>
            </div>
            <!-- edit elements -->
            <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="burgerId" value="<?= $burger['id']; ?>">
                <div class="row element hidden edit" editingBurger="<?= $burger['id']; ?>">
                    <ul>
                        <li><?= $burger["id"]; ?></li>
                        <li>
                            <label for="editImage" class="input">Choisir une image</label>
                            <input type="file" name="editImage" id="editImage"  accept="image/*" style="display: none">
                        </li>
                        <li><input type="text" name="editName" value="<?= $burger['name']; ?>"></li>
                        <li><input type="text" name="editPrice" value="<?= $burger['price']; ?>">€</li>
                        <li class="action editBurger" id="editBurger" burgerId="<?= $burger["id"]; ?>"><button type="submit" name="subEdit" style="border:none; background: transparent; color:inherit;"><i class="fas fa-check"></button></i></li>
                    </ul>
                </div>
            </form>
            <br>
        <?php } ?>
    </div>
</div>