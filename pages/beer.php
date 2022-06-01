<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include 'includes/head.php';?>
    <link rel="stylesheet" type="text/css" href="../css/beer.css">
  </head>
  <body>
    <?php 
      include 'includes/header.php';

      require_once 'modules/database/databaseViewer.php';
      $databaseViewer = null;

      $beer = null;
    ?>

    <div class="beer-page">

      <?php include'includes/beerInfo.php';?>

      <div class="beer-content">
        <div class="beer-content-header">
          <button class="add-advice" onclick="window.location.href='../rediger/<?=$beer['name']?>'">Rédiger un avis</button>
          <p><?=$beer['nb_advices']?> avis</p>
        </div>
        <div class="beer-advices">

      <?php
        $advices = $databaseViewer->getAdvices($beer['id']);

        if ($advices->num_rows > 0) {
          while ($advice = $advices->fetch_assoc()) {
      ?>
          <div class="beer-advice">
            <div class="beer-advice-left">
              <img src="../resources/img/profil.svg">
              <div class="userInfos">
                <div class="userName">
                  <p><?=$advice['userName']?></p>
                </div>
                <div class="nbAdvices">
                  <p><?=$advices->num_rows?> Avis</p>
                </div>
              </div>
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
                      <img src="../resources/img/beer-rate/beer-<?=(int)((fmod($advice['rate'], $floor))*4) * 25?>.png">
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
                <p><i>Avis publié : le 31 mai 2022</i></p>
              </div>
              <div class="advice-title">
                <p><?=$advice['title']?></p>
              </div>
              <p><?=$advice['comment']?></p>
            </div>
          </div>
        
      <?php
          }
        }

        if ($databaseViewer != null) 
        {
          $databaseViewer->disconnect();
        }
      ?>
        </div>
      </div>
    </div>
  </body>
</html>