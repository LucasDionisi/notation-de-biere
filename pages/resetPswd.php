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

      if (isset($_POST['submitButton'])) {

        $errorMsg = "";

        $password = $_POST['password'];
        $passwordConfirmation = $_POST['password-confirmation'];

        if ($password !== $passwordConfirmation) {
            $errorMsg = "Les deux mots de passe doivent être identiques";
        } else {
            $databaseManager = new DatabaseManager();
            $databaseManager->connect();

            // TODO
        }
      }

    ?>
    <div class="page">
        <h1>Réinitialisaton</h1>
        <form method="POST" action="">
            <div class="box">
                <div class="input-group">
                    <input type="password" name="password" required>
                    <span class="bar"></span>
                    <label>Mot de passe</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password-confirmation" required>
                    <span class="bar"></span>
                    <label>Vérification mot de passe</label>
                </div>
                <button type="submit" name="submitButton">Modification</button>
            <?php
            if (!empty($errorMsg)) {
            ?>
                <p class="error-message"><?=$errorMsg?></p>
            <?php
            }
            ?>
            </div>
        </form>
    </div>
</body>

</html>