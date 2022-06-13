<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include 'includes/head.php';?>
    <link rel="stylesheet" type="text/css" href="../css/user.css">
  </head>
  <body>
    <?php 
      include 'includes/header.php';

      $isMyPage = $session['pseudo'] === $pseudo;

      require_once 'modules/database/databaseManager.php';
      $databaseManager = new DatabaseManager();
      $databaseManager->connect();
      $res = $databaseManager->getUserByPseudo($pseudo);

      if ($res->num_rows != 1) {
        header('Location: ../404');
      }

      $user = $res->fetch_assoc();
    ?>

    <div class="user-page">
       <div class="user-header">
          <img src="../resources/img/profil.svg" alt="Photo de profil"/>
          <div class="user-header-right">
            <div class="user-header-right-top">
              <p><?=$user['pseudo']?></p>
              <button>Modifier le profil</button>
            </div>
            <div class="user-header-right-bottom">
              <p>Contributions</p>
              <p>117 Avis</p>
            </div>
          </div>
       </div>
    </div>

  </body>
</html>