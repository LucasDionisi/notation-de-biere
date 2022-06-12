<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include 'includes/head.php';?>
    <link rel="stylesheet" type="text/css" href="../css/register.css">
  </head>
  <body>
    <?php include 'includes/header.php';?>

    <div class="register-page">
      <h1>Inscription</h1>
      <form method="POST" action="">
        <div class="register-box">
          <div class="input-group">
            <input id="email-input" type="text" name="email" required value="<?=$email?>">
            <span class="bar"></span>
            <label>Adresse mail</label>
          </div>
          <div class="input-group">
            <input id="email-input" type="text" name="name" required value="<?=$name?>">
            <span class="bar"></span>
            <label>Pseudo</label>
          </div>
          <div class="input-group">
            <input id="password-input" type="password" name="password" required>
            <span class="bar"></span>
            <label>Mot de passe</label>
          </div>
          <div class="input-group">
            <input id="password-input" type="password" name="password-confirmation" required>
            <span class="bar"></span>
            <label>Confirmez votre mot de passe</label>
          </div>
          <button type="submit" name="submitButton">S'inscrire</button>
          <?php
            if (!empty($errorMsg)) {
          ?>
            <p class="error-message"><?=$errorMsg?></p>
          <?php
            }
          ?>
        </div>
      </form>
      <p>Vous avez un compte ? <a href="../connexion">Se connecter</a></p>
    </div>
  </body>
</html>