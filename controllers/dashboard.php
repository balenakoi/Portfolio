<?php
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
$db = Database::DB();
$dashboardManager = new DashboardManager($db);




include "../views/dashboardView.php";
?>