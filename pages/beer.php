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

    <?php include 'includes/beerInfo.php'; ?>

    <div class="beer-content">
      <div class="beer-content-header">
        <button class="add-advice" onclick="window.location.href='../rediger/<?= $beer['name'] ?>'">Rédiger un avis</button>
        <p><?= $beer['nb_advices'] ?> avis</p>
      </div>
      <div class="advices">

        <?php
        if (!isset($databaseManager)) {
          $databaseManager = new DatabaseManager();
          $databaseManager->connect();
        }

        $advices = $databaseManager->getAdvices($beer['id']);

        if ($advices->num_rows > 0) {
          while ($advice = $advices->fetch_assoc()) {
            $isUserPage = false;
            require 'includes/adviceTemplate.php';
          }
        }

        if ($databaseManager != null) {
          $databaseManager->disconnect();
        }
        ?>
      </div>
    </div>
  </div>
</body>

</html>