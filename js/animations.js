function animate_burger() {
    // INDEX CONTENT ANIMATION
    $right = document.querySelector("#background #right");
    $left = document.querySelector("#background #left");
    $content = document.querySelector("#content");
    $burger = document.querySelector("#burger");
    $logo = document.querySelector("#logo");
    $newcontent = document.querySelector("#newcontent");
    $newcontent_burger = document.querySelector(".burger-choosen");
    $newcontent_title = document.querySelector("#burger-choosen-title");

    // on lance l'animation des deux parties du background
    window.requestAnimationFrame(function(time) {
        window.requestAnimationFrame(function(time) {
            $right.className = "right anim_right";
            $left.className = "left anim_left";
        });
    });
    
    // on affiche le nouveau contenu
    $newcontent.style.display = "block";
    setTimeout(function(){ 
        $newcontent.style.opacity = 1;
    }, 2000);
    // on cache le burger car != page burgers
    $newcontent_burger.style.display = "none";
    
    // on supprime l'ancien contenu
    $content.style.opacity = 0;
    // on change la couleur du logo
    $logo.setAttribute("src", "images/logos/logo_dark.png");
    // on reposition le burger + le texte
    $burger.style.left = "22vw";
    $newcontent_title.style.position = "absolute";
    $newcontent_title.style.top = "-120px;";
}