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
session_start();
if (!empty($_SESSION['name'])) {
} else {
    header('location: index.php');
}
// //conection to database
$db = Database::DB();
$MailManager = new MailManager($db);

// Basic verifications
if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
    $name = htmlspecialchars(addslashes(strip_tags($_POST['name'])));
    $email = htmlspecialchars(addslashes(strip_tags($_POST['email'])));
    $message = htmlspecialchars(addslashes(strip_tags($_POST['message'])));

    if (preg_match("#^[a-zA-Z0-9]{2,15}$#", $name) && preg_match("#^[a-zA-Z0-9]{2,15}$#", $message) && preg_match("#^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
        $to = 'balenakoi@gmail.com';
        $subject = 'Contact for WebSite';
        $message = $_POST['message'] . "<br>";
        $message .= 'Email : ' . $_POST['email'] . "<br>";
        $message .= 'Nom : ' . $_POST['name'] . "<br>";
        $headers[] = 'MIME-Version: 1.0';
        $headers[] = 'Content-type: text/html; charset=iso-8859-1';
        $headers[] = 'From: admin@gmail.com';
        mail($to, $subject, $message, implode("\r\n", $headers));
        $sqlmessage = new Mail([
            'name' => addslashes(strip_tags($_POST['name'])),
            'message' => addslashes(strip_tags($_POST['message'])),
            'email' => addslashes(strip_tags($_POST['email']))
        ]);
        var_dump($sqlmessage);

        $MailManager->about($sqlmessage);
        header('Location: index.php');
    }

} else {


    header('Location:index.php');

}


