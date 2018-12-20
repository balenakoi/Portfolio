
<?php include('template/header.php'); ?>

    <div class="container col-12 mt-5">
        <a href="dashboard.php" class="btn btn-dark mb-1">Retour</a>
        <a href="add_production.php" class="btn btn-success mb-1">Ajouter un projet</a>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">name</th>
                    <th scope="col">Image</th>
                    <th scope="col">desciption</th>
                    <th scope="col">Link</th>
                    <th scope="col">MAJ</th>
                    <th scope="col">Delete</th>                  
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($all_production_req as $project) {
                    ?>
                <tr>
                    <td>
                        <?= $project->getName(); ?>
                    </td>
                    <td>
                        <?= $project->getImages(); ?>
                    </td>
                    <td>
                        <?= $project->getDescription(); ?>
                    </td>
                    <td>
                        <?= $project->getLink(); ?>
                    </td>
            
                    <td>
                        <a href="production.php?id=<?= $project->getId(); ?>&update=true" class="btn btn-primary" rel="noopener noreferrer">Mettre à jour</a>
                    </td>
                    <td>
                        <a href="production.php?id=<?= $project->getId(); ?>&delete=true" class="btn btn-danger" rel="noopener noreferrer">Supprimer</a>
                    </td>
                </tr>
            <?php

        }
        ?>
    </tbody>
        </table>
    </div>
    <?php


    ?>