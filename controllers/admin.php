<?php
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
// //conection to database
$db = Database::DB();
$adminManager = new AdminManager($db);

if (!empty($_POST['name'])) {
    if (!empty($_POST['password'])) {
        $sqladmin = new Admin([
            'name' => $_POST['name']
        ]);
        $checkAdmin = $adminManager->admin($sqladmin);
        $checkPassword = password_verify($_POST['password'], $checkAdmin->getPassword());
        if ($checkPassword) {
            session_start();
            $_SESSION['name'] = htmlspecialchars(addslashes(strip_tags($_POST['name'])));
            $_SESSION['password'] = htmlspecialchars(addslashes(strip_tags($_POST['password'])));
            header('location: dashboard.php');
        } else {
            echo "Vous n'avez pas accès à cette page.";
        }
    } else {
        echo "Vous n'avez pas accès à cette page.";
    }
}
include "../views/adminView.php";
?>