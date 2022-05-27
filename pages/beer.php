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

      try {
        $test = new DatabaseViewer();
        $test->connect();
        
      } catch (Exception $exception) {
        // Show exception->getmessage(); dans logger
        header("Location: ../404");
        exit();
      }
    ?>

    <div class="beer-page">
      <div class="beer-info">
        <div class="title-rate-and-description">
        <div class="title-and-rate">
          <h1>Fada</h1>
          <div class="rate-icons">
            <img src="../resources/img/beer-rate.svg">
            <img src="../resources/img/beer-rate.svg">
            <img src="../resources/img/beer-rate.svg">
            <img src="../resources/img/beer-rate.svg">
            <img src="../resources/img/beer-rate.svg">
          </div>
        </div>
        <div class="description">
          <p>
            Des matières premières sélectionnées avec grand soin

            C’est à la Brasserie du Castellet à Signes que sont brassées ces bières artisanales et provençales, à partir de matières premières locales.

            Epeautre tout droit venu de la Drôme pour la Blonde, romarin des collines cueilli à la main pour la blanche et saveur pêche pour la Sunny India Pale Ale.

            Des recettes originales élaborées avec soin par Victor, maître brasseur amoureux de la Provence et passionné de son métier.
          </p>
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