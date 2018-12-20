<?php session_start(); ?>
<?php include('template/header.php'); ?>
    <div class="container col-12 mt-5">
        <a href="dashboard.php" class="btn btn-dark mb-1">Retour</a>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Message</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($all_message_req as $message) {
                    ?>
                <tr>
                <td>
                        <?= $message->getName(); ?>
                    </td>
                    <td>
                        <?= $message->getEmail(); ?>
                    </td>
                    <td>
                        <?= $message->getMessage(); ?>
                    </td>
                    <td><a href="message.php?id=<?= $message->getId(); ?>&delete=true" class="btn btn-danger" rel="noopener noreferrer">Supprimer</a>
                    <td>
                </tr>
            <?php

        }
        ?>
    </tbody>
        </table>
    </div>
    
