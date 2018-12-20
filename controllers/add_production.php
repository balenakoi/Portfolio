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
$addProductionManager = new ProductionManager($db);

if (!empty($_POST['name'])) {
    if (!empty($_POST['link'])) {
        if (isset($_FILES['images'])) {
            $target_dir = "../assets/img/";
            $target_file = $target_dir . basename($_FILES["images"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
            if (isset($_POST["submit"])) {
                $check = getimagesize($_FILES["images"]["tmp_name"]);
                if ($check !== false) {
                // echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
            }
        // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
        // Check file size
            if ($_FILES["images"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
        // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
        // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["images"]["tmp_name"], $target_file)) {
                    echo "The file " . basename($_FILES["images"]["name"]) . " has been uploaded.";
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
            if (!empty($_POST['description'])) {
                $add_production = new Production([
                    'name' => htmlspecialchars(addslashes(strip_tags($_POST['name']))),
                    'description' => htmlspecialchars(addslashes(strip_tags($_POST['link']))),
                    'link' => htmlspecialchars(addslashes(strip_tags($_POST['description']))),
                    'images' => '../assets/img/' . $_FILES['images']['name']
                ]);
                $addProductionManager->addProductions($add_production);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            } else {
                echo "Le champs description dois être remplis.";
            }
        } else {
            echo "Le champs images dois être remplis.";
        }
    } else {
        echo "Le champs link dois être remplis.";
    }
}

include "../views/add_productionView.php";