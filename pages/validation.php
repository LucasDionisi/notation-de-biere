<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include 'includes/head.php';?>
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
        }
      } else {
        $message = "Aucun utilisateur n'a été trouvé via ce token.";
      }
    ?>
    <p><?=$message?></p>
  </body>
</html>