<?php
// We register our autoload.
function chargerClasse($classname)
{
    if (file_exists('../model/' . $classname . '.php')) {
        require '../model/' . $classname . '.php';
    } else {
        require '../entities/' . $classname . '.php';
    }
}
spl_autoload_register('chargerClasse');
session_start();

$db = Database::DB();
$addProductionManager = new ProductionManager($db);

$productions = $addProductionManager->productions();


include "../views/indexView.php";
?>
