<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include 'includes/head.php';?>
    <link rel="stylesheet" type="text/css" href="../css/register.css">

    <?php
      require 'modules/database/databaseManager.php'
    ?>
  </head>
  <body>
    <?php 
      include 'includes/header.php';
    
      if (isset($_POST['submitButton'])) {
        $email = $_POST["email"];
        $pseudo = $_POST["pseudo"];
        $password = $_POST["password"];
        $passwordConfirmation = $_POST["password-confirmation"];

        $errorMsg = "";
        $validMsg = "";

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errorMsg = "Le format de l'adresse mail n'est pas valide.";
        } else {
          if ($password !== $passwordConfirmation) {
            $errorMsg = "Les deux mots de passe doivent être identiques";
          } else {
            $databaseManager = new DatabaseManager();
            $databaseManager->connect();

            $res = $databaseManager->getUserByEmail($email);
            
            if ($res->num_rows > 0) {
              $errorMsg = "Cette adresse mail est déjà utilisée.";
            } else {
              $res = $databaseManager->getUserByPseudo($pseudo);
            
              if ($res->num_rows > 0) {
                $errorMsg = "Ce pseudo est déjà utilisée.";
              } else {
                $salt = $databaseManager->getSalt()->fetch_assoc()['data'];
                $passwordCrypted = crypt($password, $salt);
                $databaseManager->createUser($email, $pseudo, $passwordCrypted);

                $validMsg = "Vous avez reçu un mail pour valider la création du compte.";
              }
            }
          }
        }
      }
    ?>

    <div class="register-page">
      <h1>Inscription</h1>
      <form method="POST" action="">
        <div class="register-box">
          <div class="input-group">
            <input type="text" name="email" required value="<?=$email?>">
            <span class="bar"></span>
            <label>Adresse mail</label>
          </div>
          <div class="input-group">
            <input type="text" name="pseudo" minlength="5" required value="<?=$pseudo?>">
            <span class="bar"></span>
            <label>Pseudo</label>
          </div>
          <div class="input-group">
            <input type="password" name="password" minlength="8" required>
            <span class="bar"></span>
            <label>Mot de passe</label>
          </div>
          <div class="input-group">
            <input type="password" name="password-confirmation" minlength="8" required>
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
          <?php
            if (!empty($validMsg)) {
          ?>
            <p class="valid-message"><?=$validMsg?></p>
          <?php
            }
          ?>
        </div>
      </form>
      <p>Vous avez un compte ? <a href="../connexion">Se connecter</a></p>
    </div>
  </body>
</html>