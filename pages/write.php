<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include 'includes/head.php';?>
    <link rel="stylesheet" type="text/css" href="../css/beer.css">
    <link rel="stylesheet" href="../css/write.css">
  </head>
  <body>
    <?php 
      include 'includes/header.php';
      require_once 'modules/database/databaseViewer.php';
      $databaseViewer = null;

      $beer = null;
    ?>

    <div class="beer-page">
    <?php
      include 'includes/beerInfo.php';
    ?>
      <div class="buttons-bar">
        <button>Annuler</button>
        <button>Poster l'avis</button>
      </div>
      <div class="write-advice">
        <div class="rate-group">
          <div class="rate-img">
            <img name="1" onclick="imageOver(this)" src="../resources/img/beer-rate/beer-0.png">
            <img name="2" onclick="imageOver(this)" src="../resources/img/beer-rate/beer-0.png">
            <img name="3" onclick="imageOver(this)" src="../resources/img/beer-rate/beer-0.png">
            <img name="4" onclick="imageOver(this)" src="../resources/img/beer-rate/beer-0.png">
            <img name="5" onclick="imageOver(this)" src="../resources/img/beer-rate/beer-0.png">
          </div>
          <input type="text" name="rate" id="rate-input" value="0" hidden>
          <p id="rate-message">< Selectionnez pour noter</p>
        </div>
        <div class="info-group">
          <input type="text" id="rate-title-input" required>
          <label for="rate-title-input">Titre</label>
        </div>
      </div>
    </div>
    <?php
      if ($databaseViewer != null) 
      {
        $databaseViewer->disconnect();
      }
    ?>
    <script type="text/javascript" src="../js/writeAdvice.js"></script>
  </body>
</html>