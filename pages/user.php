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
            <?php while($advice = $advices->fetch_assoc()) { ?>

            <div class="beer-advice">
                <div class="beer-advice-left">
                    <a href="../u/<?=$user['pseudo']?>">
                        <img src="../resources/img/profil.svg">
                        <div class="userInfos">
                            <div class="userName">
                                <p><?=$advice['userName']?></p>
                            </div>
                            <!--<div class="nbAdvices">
                    <p><?=$advices->num_rows?> Avis</p>
                  </div>-->
                        </div>
                    </a>
                </div>

                <div class="beer-advice-right">
                    <div class="rate-and-date">
                        <div class="advice-rate">
                            <?php
                  if ($advice['rate']) 
                  {
                    $floor = floor($advice['rate']);
                    $i = 0;
                    while ($i < $floor) 
                    {?>
                            <img src="../resources/img/beer-rate/beer-100.png">
                            <?php
                      $i++; 
                    }
                    if ($i < 5) {
                    ?>
                            <img
                                src="../resources/img/beer-rate/beer-<?=(int)((fmod($advice['rate'], $floor))*4) * 25?>.png">
                            <?php
                      $i++;
                    }
                    while($i < 5) {
                    ?>
                            <img src="../resources/img/beer-rate/beer-0.png">
                            <?php
                      $i++;
                    }
                  } 
                  ?>
                        </div>
                        <p><i>Avis publié le <?=date_format(new DateTime($advice['created_at']), 'd-m-Y à H:i')?></i>
                        </p>
                    </div>
                    <div class="advice-title">
                        <p><?=$advice['title']?></p>
                    </div>
                    <p><?=$advice['comment']?></p>
                </div>
            </div>

            <?php } ?>
        </div>
        <?php } ?>
    </div>

</body>

</html>