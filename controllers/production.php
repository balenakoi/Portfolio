<?php session_start();
// Connection to the database
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
if (!empty($_SESSION['name'])) {
} else {
    header('location: index.php');
}
// //conection to database
$db = Database::DB();
$productionManager = new ProductionManager($db);

if (isset($_GET['delete'])) {

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $production_req = $productionManager->deleteProduction($id);
    }
}

if (isset($_GET['update'])) {

    if (!empty($_POST['name']) and !empty($_POST['description']) and !empty($_POST['link']) and !empty($_POST['images'])) {
        $updateProduction = new Production([
            'name' => htmlspecialchars(addslashes(strip_tags($_POST['name']))),
            'description' => htmlspecialchars(addslashes(strip_tags($_POST['description']))),
            'link' => htmlspecialchars(addslashes(strip_tags($_POST['link']))),
            'images' => $_FILES['images']['name']
        ]);

        $productionManager->updateProduction($updateProduction);
    }
}
$all_production_req = $productionManager->productions();
include "../views/ProductionView.php";
?>
