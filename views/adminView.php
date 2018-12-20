<?php
include('template/header.php');
?>

  <div class="container">
    <div class="row">
      <form class="col-12" method="POST" action="admin.php">
        <div class="form-group">
          <label for="name">Nom :</label>
          <input type="text" class="form-control col-8" id="name" placeholder="Nom" name="name">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control col-8" id="password" placeholder="Password" name="password">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Connexion</button>
      </form>
    </div>
  </div>