<?php
      try 
      {
        $databaseManager = new DatabaseManager();
        $databaseManager->connect();
        $result = $databaseManager->getBeer($beerName);

        if ($result->num_rows != 1) {
          $databaseManager->disconnect();
          header("Location: ../404");
          exit();
        }

        $beer = $result->fetch_assoc();
        if ($beer == null) {
          $databaseManager->disconnect();
          header("Location: ../404");
          exit();
        }
      } catch (Exception $exception) 
      {
        $databaseManager->disconnect();
        // Show exception->getmessage(); dans logger
        header("Location: ../404");
        exit();
      }
?>

<div class="beer-info">
    <div class="title-rate-and-description">
        <div class="title-and-rate">
            <div class="title-info">
                <h1><?=$beer['name']?></h1>
                <p>Alc. <?=$beer['alcohol_level']?>% Vol.</p>
            </div>
            <div class="rate-icons">
                <?php
            if ($beer['rate_average']) 
            {
              $floor = floor($beer['rate_average']);
              $i = 0;
              while ($i < $floor) 
              {?>
                <img src="../resources/img/beer-rate/beer-100.png">
                <?php
                $i++; 
              }
              if ($i < 5) {
              ?>
                <img src="../resources/img/beer-rate/beer-<?=(int)((fmod($beer['rate_average'], $floor))*4) * 25?>.png">
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
        </div>
        <div class="description">
            <p><?=$beer['information']?></p>
        </div>
    </div>
    <img src="../resources/img/beers/<?=$beer['image_name']?>">
</div>