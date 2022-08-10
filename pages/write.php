<!DOCTYPE html>
<html lang="fr">

<head>
    <?php 
        $title = "Rédiger un avis";
        include 'includes/head.php';
    ?>
    <link rel="stylesheet" type="text/css" href="../css/<?=$cssBeer?>">
    <link rel="stylesheet" href="../css/<?=$cssWrite?>">
</head>

<body>
    <?php 
      include 'includes/header.php';

      if ($session === NULL) {
        header('Location: ../connexion');
      }

      require_once 'modules/database/databaseManager.php';
      $databaseManager = null;

      $beer = null;
    ?>

    <div class="beer-page">
        <?php
      include 'includes/beerInfo.php';

      $title = "";
      $rate = "";
      $comment = "";

      if (isset($_POST['submitButton'])) {
        $title = $_POST['title'];
        $rate = $_POST['rate'];
        $comment = $_POST['comment'];
        
        $titleLength = strlen($title);
        $rateLength = strlen($rate); 
        $commentLength = strlen($comment);
        
        $errorMsg  = "";

        if ($titleLength < 3 || $titleLength > 100)
        {
          $errorMsg = $errorMsg . "Veuillez écrire un titre.";
        }

        if ($rateLength < 1 || $rateLength > 5)
        {
          $errorMsg = $errorMsg . "Veuillez donner une note."; 
        }

        if ($commentLength < 15 || $commentLength > 500)
        {
          $errorMsg = $errorMsg . "Veuillez donner un commentaire d'au moins 15 caractères."; 
        }

        if (empty($errorMsg)) 
        {
          if (!isset($databaseManager)) {
            $databaseManager = new DatabaseManager();
            $databaseManager->connect();
          }

          $res = $databaseManager->addAdvice($beer['id'], $session['id'], $rate, $title, $comment);

          if (!isset($res)) {
            header('Location: ../biere/' . $beer['name']);
          } else {
            // TODO display error
          }
        }
      }
      ?>
        <form method="POST" action="">
            <div class="write-advice">
                <div class="advice-header">
                    <div class="title-group">
                        <input id="title-input" type="text" name="title" required maxlength="100" value="<?=$title?>">
                        <span class="bar"></span>
                        <label>Titre</label>
                    </div>
                    <div class="rate-group">
                        <p id="rate-message">Selectionnez pour noter ></p>
                        <div class="rate-img">
                            <img name="1" src="../resources/img/beer-rate/beer-0.png" alt="Image de notation">
                            <img name="2" src="../resources/img/beer-rate/beer-0.png" alt="Image de notation">
                            <img name="3" src="../resources/img/beer-rate/beer-0.png" alt="Image de notation">
                            <img name="4" src="../resources/img/beer-rate/beer-0.png" alt="Image de notation">
                            <img name="5" src="../resources/img/beer-rate/beer-0.png" alt="Image de notation">
                        </div>
                        <input type="text" name="rate" id="rate-input" value="<?=$rate?>" hidden>
                    </div>
                </div>
                <div class="comment-group">
                    <textarea id="comment-textarea" name="comment" required maxlength="500"
                        placeholder="Faites part de votre avis." rows="10" cols="40"><?=$comment?></textarea>
                </div>
                <?php if (!empty($errorMsg)) { ?>
                <p class="error-message">Pour créer un avis : <?=$errorMsg?></p>
                <?php } ?>
            </div>
            <div class="buttons-bar">
                <button type="submit" name="submitButton">Poster l'avis</button>
            </div>
        </form>
    </div>
    <?php
      if (isset($databaseManager)) 
      {
        $databaseManager->disconnect();
      }
    ?>
    <script type="text/javascript" src="../js/libs/<?=$jsJquery?>"></script>
    <script type="text/javascript" src="../js/<?=$jsWriteAdvice?>"></script>
</body>

</html>