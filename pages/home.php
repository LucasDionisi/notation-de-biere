<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'includes/head.php'; ?>
    <link rel="stylesheet" href="css/<?=$cssHome?>">
</head>

<body>
    <?php 
        include 'includes/header.php';

        $search = "";

        if (isset($_POST['submitButton'])) {
            $search = trim(rtrim($_POST['search']));
        }
    ?>

    <form class="form-search" role="search" method="POST" action="">
        <input type="search" class="input-search" name="search" placeholder="Recherche une bière" aria-label="Rechercher une bière" value="<?=$search?>">
        <button type="submit" name="submitButton">🔎</button>
    </form>

    <div class="home-page">
        <div class="collection-beer">
            <?php
            require_once 'modules/database/databaseManager.php';

            $beers = null;
            try
            {
              $databaseManager = new DatabaseManager();
              $databaseManager->connect();
              $beers;

              if (isset($_POST['submitButton'])) {
                $beers = $databaseManager->getBeersSearch($search);
              } else {
                $beers = $databaseManager->getBeers();
              }

              $databaseManager->disconnect();
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
                        <img src="resources/img/beers/<?=$beer['image_name']?>" alt="Image de bière"/>
                    </div>
                    <div class="beer-description">
                        <div class="beer-description-name">
                            <p><?=$beer['name']?></p>
                        </div>
                        <div class="beer-rate">
                            <div class="beer-rate-img">
                                <?php
                        if ($beer['rate_average']) 
                        {
                          $floor = floor($beer['rate_average']);
                          $i = 0;
                          while ($i < $floor) 
                          {?>
                                <img src="resources/img/beer-rate/beer-100.png" alt="Image de notation">
                                <?php
                            $i++; 
                          }
                          if ($i < 5) {
                          ?>
                                <img
                                    src="resources/img/beer-rate/beer-<?=(int)((fmod($beer['rate_average'], $floor))*4) * 25?>.png" alt="Image de notation">
                                <?php
                            $i++;
                          }
                          while($i < 5) {
                            ?>
                                <img src="resources/img/beer-rate/beer-0.png" alt="Image de notation">
                                <?php
                            $i++;
                          }
                        } 
                      ?>
                            </div>
                            <div class="beer-rate-advices"><p><?=$beer['nb_advices']?> avis</p></div>
                        </div>
                    </div>
                </a>
            </div>

            <?php
              }
            }
            ?>
            <div class="end-of-page"></div>
        </div>
    </div>

    <script type="text/javascript" src="../js/libs/<?=$jsJquery?>"></script>
    <script type="text/javascript" src="../js/<?=$jsHome?>"></script>
</body>

</html>