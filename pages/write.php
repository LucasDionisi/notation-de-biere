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
      <div class="write-advice">
        
      </div>
    </div>
    <?php
      if ($databaseViewer != null) 
      {
        $databaseViewer->disconnect();
      }
    ?>
  </body>
</html>