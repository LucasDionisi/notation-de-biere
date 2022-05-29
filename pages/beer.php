<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include 'includes/head.php';?>
    <link rel="stylesheet" href="../css/beer.css">
  </head>
  <body>
    <?php 
      include 'includes/header.php';

      require_once 'modules/database/databaseViewer.php';

      $beer = null;
      try 
      {
        $databaseViewer = new DatabaseViewer();
        $databaseViewer->connect();
        $result = $databaseViewer->getBeer($beerName);

        if ($result->num_rows != 1) {
          header("Location: ../404");
          exit();
        }

        $beer = $result->fetch_assoc();
        if ($beer == null) {
          header("Location: ../404");
          exit();
        }
      } catch (Exception $exception) 
      {
        // Show exception->getmessage(); dans logger
        header("Location: ../404");
        exit();
      }
    ?>

    <div class="beer-page">
      <div class="beer-info">
        <div class="title-rate-and-description">
        <div class="title-and-rate">
          <div class="title-info">
            <h1><?=$beer['name']?></h1>
            <p>Alc. <?=$beer['alcohol_level']?>% Vol.</p>
          </div>
          <div class="rate-icons">
            <img src="../resources/img/beer-rate.svg">
            <img src="../resources/img/beer-rate.svg">
            <img src="../resources/img/beer-rate.svg">
            <img src="../resources/img/beer-rate.svg">
            <img src="../resources/img/beer-rate.svg">
          </div>
        </div>
        <div class="description">
          <p><?=$beer['information']?></p>
        </div>
        </div>
        <img src="../resources/img/beers/<?=$beer['image_name']?>">
      </div>

      <div class="beer-content">
        <div class="beer-content-header">
          <button class="add-advice">Rédiger un avis</button>
          <p><?=$beer['nb_advices']?> avis</p>
        </div>
        <div class="beer-advices">

      <?php
        $advices = $databaseViewer->getAdvices($beer['id']);
        $databaseViewer->disconnect();

        if ($advices->num_rows > 0) {
          while ($advice = $advices->fetch_assoc()) {
      ?>
          <div class="beer-advice">
            <!-- c'est écrit en blanc lol -->
            <p><?=$advice['userName']?></p>
            <p><?=$advice['comment']?></p>
          </div>
        
      <?php
          }
        }
      ?>
        </div>
      </div>
    </div>
  </body>
</html>