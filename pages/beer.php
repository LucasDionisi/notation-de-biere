<!DOCTYPE html>
<html lang="fr">

<head>
  <?php include 'includes/head.php'; ?>
  <link rel="stylesheet" type="text/css" href="../css/<?=$cssBeer?>">
  <link rel="stylesheet" type="text/css" href="../css/<?=$cssAdviceTemplate?>">
</head>

<body>
  <?php
  include 'includes/header.php';

  require_once 'modules/database/databaseManager.php';
  $databaseManager = null;

  $beer = null;
  ?>

  <div class="beer-page">

    <?php 
      include 'includes/beerInfo.php'; 

      if (!isset($databaseManager)) {
        $databaseManager = new DatabaseManager();
        $databaseManager->connect();
      }

      if (isset($_POST['submitDeleteButton'])) {
        $deleteId = $_POST['advice-id'];

        $databaseManager->deleteAdvice($session['id'], $deleteId);
      }

    ?>

    <div class="beer-content">
      <div class="beer-content-header">
        <button class="add-advice" onclick="window.location.href='../rediger/<?= $beer['name'] ?>'">Rédiger un avis</button>
        <p><?= $databaseManager->getAdvices($beer['id'])->num_rows ?> avis</p>
      </div>
      <div class="advices">

        <?php

        $advices = $databaseManager->getAdvices($beer['id']);

        if ($advices->num_rows > 0) {
          while ($advice = $advices->fetch_assoc()) {
            $isUserPage = false;
            require 'includes/adviceTemplate.php';
          }
        }
        ?>
      </div>
    </div>
  </div>

  <?php

    include 'includes/deleteModal.php';
        
    if ($databaseManager != null) {
      $databaseManager->disconnect();
    }
  ?>

          <?php
            include 'includes/footer.php';
        ?>
        <div class="end-of-page"></div>

  <script type="text/javascript" src="../js/libs/<?=$jsJquery?>"></script>
  <script type="text/javascript" src="../js/<?=$jsBeer?>"></script>
</body>

</html>