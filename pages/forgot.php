<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'includes/head.php';?>
    <link rel="stylesheet" type="text/css" href="../css/<?=$cssForgot?>">
</head>

<body>

<?php 
      include 'includes/header.php';
      require_once 'modules/database/databaseManager.php';

      if (isset($_POST['submitButton'])) {
        $email = $_POST["email"];

        $errorMsg = "";
        $validationMsg ="";

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $errorMsg = "Le format de l'adresse mail n'est pas valide.";
        } else {

            $databaseManager = new DatabaseManager();
            $databaseManager->connect();

            
            
            $validationMsg = "Un lien vous a été envoyé par mail pour modifier votre mot de passe.";
        }
      }
?>

    <div class="page">
        <h1>Mot de passe oublié</h1>

        <form method="POST" action="">
            <div class="box">
                <div class="input-group">
                    <input type="text" name="email" required value="<?=$email?>">
                    <span class="bar"></span>
                    <label>Adresse mail</label>
                </div>
                
                <button type="submit" name="submitButton">Envoyer un lien</button>
                <?php
                if (!empty($errorMsg)) {
                ?>
                    <p class="error-message"><?=$errorMsg?></p>
                <?php
                } else if (!empty($validationMsg)) {
                ?>
                    <p class="validation-message"><?=$validationMsg?></p>
                <?php
                }
                ?>
            </div>
        </form>
    </div>

</body>

</html>