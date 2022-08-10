<!DOCTYPE html>
<html lang="fr">

<head>
    <?php 
        $title = "Réinitialiser le mot de passe";
        include 'includes/head.php';
    ?>
    <link rel="stylesheet" type="text/css" href="../css/<?=$cssResetPswd?>">
</head>

<body>
    <?php 
      include 'includes/header.php';
      
      if ($session !== NULL || (!isset($validationToken) || empty($validationToken)))  {
        header('Location: ../');
      }

      require_once 'modules/database/databaseManager.php';
      require_once 'modules/database/credentialManager.php';

    ?>
    <div class="page">
        <h1>Réinitialisaton</h1>
        <form method="POST" action="">
            <div class="box">
                <div class="input-group">
                    <input type="password" name="password1" required>
                    <span class="bar"></span>
                    <label>Mot de passe</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password2" required>
                    <span class="bar"></span>
                    <label>Vérification mot de passe</label>
                </div>
                <button type="submit" name="submitButton">Modification</button>
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