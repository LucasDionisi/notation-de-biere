<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include 'includes/head.php';?>
    <link rel="stylesheet" type="text/css" href="../css/validation.css">
  </head>
  <body>
    <?php 
      include 'includes/header.php';
      require_once 'modules/database/databaseManager.php';

      $databaseManager = new DatabaseManager();
      $databaseManager->connect();
      $res = $databaseManager->getUserByValidationToken($validationToken);

      $message = "";
      $isValidated = false;

      if($res->num_rows > 0) {
        $userValidation = $res->fetch_assoc();
        if (!$userValidation['is_validated']) {
          $databaseManager->validateUser($validationToken);
          $isValidated = true;
        } else {
          $message = "Ce compte a déjà été validé.";
          $isValidated = true;
        }
      } else {
        $message = "Aucun compte à valider n'a été trouvé.";
      }
    ?>
    <div class="validation-page">
      <div class="box">
        <h1>Validation du compte</h1>
        
        <?php if ($isValidated) { ?>
          <p>Votre compte a bien été validé 🍻.</p>
          <a href="../connexion"><p class="msg-connection">Se connecter</p></a>
        <?php } else { ?>
          <p class="error-message"><?=$message?></p>
          <a href="../inscription"><p class="msg-connection">S'inscrire</p></a>
        <?php } ?>
      </div>
    </div>
  </body>
</html>