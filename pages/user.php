<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'includes/head.php';?>
    <link rel="stylesheet" type="text/css" href="../css/<?=$cssUser?>">
    <link rel="stylesheet" type="text/css" href="../css/<?=$cssAdviceTemplate?>">
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

    <div class="user-page" id="content">
        <div class="user-header">
            <?php
                $img = $user['avatar'];
                if ($img == NULL || !file_exists('resources/img/avatars/' . $img)) {
                    $img = "default.png";
                }
            ?>
            <img src="../resources/img/avatars/<?=$img?>" alt="Photo de profil" <?php if ($isMyPage) { ?> id="avatar-img" <?php } ?>/>
            <div class="user-header-right">
                <div class="user-header-right-top">
                    <h1><?=$user['pseudo']?></h1>
                    <?php if ($isMyPage) { ?>
                    <div class="manage-user">
                        <!--<button class="first">Modifier le profil</button>-->
                        <button id="logout">Se déconnecter</button>
                    </div>
                    <?php } ?>
                </div>
                <div class="user-header-right-bottom">
                    <p>Contributions :</p>
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
        <?php } ?>
    </div>
    <?php if ($isMyPage) { ?>

        <div id="avatar-modal" class="modal">
            <div class="modal-content">
                <div class="modal-top">
                    <h2>Sélectionner une image de profil</h2>
                    <a id="close-modal" href="#"><p>&#x2715</p></a>
                </div>
                <div class="modal-main scrollbar">
                    <div class="avatars">
                        <?php 
                            if (file_exists('resources/img/avatars/')) {
                                $files = scandir('resources/img/avatars/');

                                foreach ($files as $file) {
                                    if (is_file('resources/img/avatars/' . $file)) {
                        ?>
                                        <a href="#"><img src="../resources/img/avatars/<?=$file?>"/></a>
                        <?php 
                                    }  
                                }
                            } else {
                                // TODO no img
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>

    <?php 
        } 
        $databaseManager->disconnect();
    ?>
    <script type="text/javascript" src="../js/libs/<?=$jsJquery?>"></script>
    <script type="text/javascript" src="../js/<?=$jsUser?>"></script>
</body>

</html>