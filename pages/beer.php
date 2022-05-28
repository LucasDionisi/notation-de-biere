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
        $databaseViewer->disconnect();

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
            <h1><?=$beer['nom']?></h1>
            <p>Alc. <?=$beer['degre_alcool']?>% Vol.</p>
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
        <img src="../resources/img/beers/fada.png">
      </div>
      <div class="beer-content">
        <button class="add-advice">Rédiger un avis</button>
        <div class="beer-advices">
          <div class="beer-advice"></div>
          <div class="beer-advice"></div>
          <div class="beer-advice"></div>
          <div class="beer-advice"></div>
          <div class="beer-advice"></div>
          <div class="beer-advice"></div>
          <div class="beer-advice"></div>
        </div>
      </div>
    </div>
  </body>
</html>