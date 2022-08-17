<?php 
function chargerClasse(string $classe) {
    $classe=str_replace('\\','/',$classe);
    require "class/" . $classe . '.php'; 
}
spl_autoload_register('chargerClasse');
?>