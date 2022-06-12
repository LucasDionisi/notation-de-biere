<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include 'includes/head.php';?>
    <link rel="stylesheet" type="text/css" href="../css/connection.css">
  </head>
  <body>
    <?php 
      include 'includes/header.php';
      require_once 'modules/database/databaseManager.php';

      if (isset($_POST['submitButton'])) {
        $email = $_POST["email"];
        $password = $_POST["password"];

        $errorMsg = "";

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errorMsg = "Le format de l'adresse mail n'est pas valide.";
        } else {
          
        }
      }
    ?>
    <div class="connection-page">
      <h1>Connexion</h1>
      <form method="POST" action="">
        <div class="connection-box">
          <div class="input-group">
            <input id="email-input" type="text" name="email" required value="<?=$email?>">
            <span class="bar"></span>
            <label>Adresse mail</label>
          </div>
          <div class="input-group">
            <input id="password-input" type="password" name="password" required>
            <span class="bar"></span>
            <label>Mot de passe</label>
          </div>
          <button type="submit" name="submitButton">Se connecter</button>
          <?php
            if (!empty($errorMsg)) {
          ?>
            <p class="error-message"><?=$errorMsg?></p>
          <?php
            }
          ?>
        </div>
      </form>
      <p>Vous n'avez pas de compte ? <a href="../inscription">S'inscrire</a></p>
    </div>
  </body>
</html>