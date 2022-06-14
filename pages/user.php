<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'includes/head.php';?>
    <link rel="stylesheet" type="text/css" href="../css/user.css">
    <link rel="stylesheet" type="text/css" href="../css/adviceTemplate.css">
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

      $advices = $databaseManager->getAdvicesByUserId($user['id']);
    ?>

    <div class="user-page">
        <div class="user-header">
            <img src="../resources/img/profil.svg" alt="Photo de profil" />
            <div class="user-header-right">
                <div class="user-header-right-top">
                    <p><?=$user['pseudo']?></p>
                    <?php if ($isMyPage) { ?>
                    <button>Modifier le profil</button>
                    <?php } ?>
                </div>
                <div class="user-header-right-bottom">
                    <p>Contributions</p>
                    <p><?=$advices->num_rows > 0 ? $advices->num_rows : 0?> Avis</p>
                </div>
            </div>
        </div>

        <?php if ($advices->num_rows > 0) { ?>
        <div class="advices">
            <?php while($advice = $advices->fetch_assoc()) {
                $isUserPage = true;
                require 'includes/adviceTemplate.php';
            } ?>
        </div>
        <?php 
            } 
            $databaseManager->disconnect();
        ?>
    </div>

</body>

</html>