<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include 'includes/head.php';?>
    <link rel="stylesheet" href="css/home.css">
  </head>
  <body>
    <?php include 'includes/header.php';?>
      <form class="form-search" role="search">
        <input type="search" class="input-search" placeholder="Quelle bière ?" aria-label="Rechercher une bière">
      </form>

      <div class="collection-beer">
      <?php
        require_once 'modules/database/databaseViewer.php';

        $beers = null;
        try
        {
          $databaseViewer = new DatabaseViewer();
          $databaseViewer->connect();
          $beers = $databaseViewer->getBeers();
          $databaseViewer->disconnect();
        } catch (Exception $e)
        {
          // Show exception->getMessage(); dans logger
          header("Location: ../404");
          exit();
        }

        if ($beers == null) {
          header("Location: ../404");
          exit();
        }

        if ($beers->num_rows > 0) {
          while ($beer = $beers->fetch_assoc()) {
      ?>

        <div class="beer-preview">
          <a href="/biere/<?=$beer['name']?>">
            <div class="beer-thumbnail">
              <img src="resources/img/beers/<?=$beer['image_name']?>"/>
            </div>
            <div class="beer-description">
              <div class="beer-description-name"><p><?=$beer['name']?></p></div>
              <div class="beer-rate">
                <div class="beer-rate-img">
                  <img src="resources/img/beer-rate.svg">
                  <img src="resources/img/beer-rate.svg">
                  <img src="resources/img/beer-rate.svg">
                  <img src="resources/img/beer-rate.svg">
                  <img src="resources/img/beer-rate.svg">
                </div>
                <div class="beer-rate-advices"><?=$beer['nb_advices']?> avis</div>
              </div>
            </div>
          </a>
        </div>

        <?php
          }
        }
        ?>
      </div>
  </body>
</html>