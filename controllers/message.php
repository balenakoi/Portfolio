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
if (!empty($_SESSION['name'])) {
} else {
    header('location: index.php');
}
// //conection to database
$db = Database::DB();
$messageManager = new MailManager($db);
if (isset($_GET['delete'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $message_req = $messageManager->deleteMessage($id);
    }
}
$all_message_req = $messageManager->messages();
include "../views/messageView.php";