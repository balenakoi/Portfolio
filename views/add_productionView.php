<?php
include('template/header.php');
?>
    <div class="container col-12 mt-5">
        <a href="production.php" class="btn btn-dark mb-1">Retour</a>
        <form action="add_production.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" class="form-control" id="title" name="name" placeholder="Titre du projet">
            </div>
            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" class="form-control" id="image" name="images">
            </div>
            <div class="form-group">
                <label for="body">Description</label>
                <textarea name="description" id="body" cols="30" rows="10" placeholder="Description du projet" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="body">Link</label>
                <textarea name="link" id="body" cols="30" rows="10"  class="form-control"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Ajouter le projet</button>
        </form>
    </div>
    <?php


    ?>