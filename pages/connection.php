<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include 'includes/head.php';?>
    <link rel="stylesheet" type="text/css" href="../css/connection.css">
  </head>
  <body>
    <?php include 'includes/header.php';?>
    <div class="connection-page">
      <h1>Connexion</h1>
      <div class="connection-box">
        <div class="input-group">
          <input id="email-input" type="text" name="email" required>
          <span class="bar"></span>
          <label>Adresse mail</label>
        </div>
        <div class="input-group">
          <input id="password-input" type="password" name="password" required>
          <span class="bar"></span>
          <label>Mot de passe</label>
        </div>
        <button type="submit" name="submitButton">Se connecter</button>
      </div>
      <p>Vous n'avez pas de compte ? <a href="../inscription">S'inscrire</a></p>
    </div>
  </body>
</html>