<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'includes/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../css/<?=$cssAdd?>">
</head>

<body>
    <?php 
      include 'includes/header.php';
      require_once 'modules/database/databaseManager.php';
      $databaseManager = new DatabaseManager();
      $databaseManager->connect();

      if ($sessionManager->getUserInfo() === NULL) {
        header('Location: ../connexion');
      }

      if (isset($_POST['submitButton'])) {
        $beerName = $_POST['name'];
        $description = $_POST['description'];
        $beerStyle = $_POST['beerStyle'];
        $image = $_FILES['img'];
        $ext = '.' . pathinfo($image['name'], PATHINFO_EXTENSION);

        $version = 0;
        $fileName = $beerName . $ext;

        while (file_exists( __DIR__ . '/../resources/img/beers/' . $fileName)) {
            $version += 1;
            $fileName = $beerName . $version . $ext;
        }

        if(!move_uploaded_file($_FILES['img']['tmp_name'], __DIR__ . '/../resources/img/beers/' . $fileName)) {
            // TODO Error
        } 

        if (!$databaseManager->addBeer($beerName, $beerStyle, $description, 2.7, $fileName, $sessionManager->getUserInfo()['id'])) {
            // TODO Error
        }

        header('Location: ../biere/' . $beerName);
      }

    ?>
    <div class="page-content">
        <h1>Ajouter une nouvelle bière</h1>
        <div class="box-new">
            <form method="POST" action="" enctype="multipart/form-data">
                <div class="box-main">
                    <div class="left-box">
                        <div class="name-style">
                            <div class="name-group">
                                <input id="name-input" type="text" name="name" required maxlength="100">
                                <span class="bar"></span>
                                <label>Nom de la bière</label>
                            </div>
                            <?php
                                $styles = $databaseManager->getBeerStyle();
                                if ($styles->num_rows > 0) {
                            ?>
                            <div class="style-group">
                                <select id="styles" name="beerStyle" required>
                                    <option value="">Style de bière</option>
                                <?php while($style = $styles->fetch_assoc()) { ?>
                                    <option value="<?=$style['id']?>"><?=$style['name']?></option>
                                <?php } ?>
                                </select>
                            </div>
                            <?php } ?>
                        </div>
                        <div class="description-group">
                            <textarea id="description-textarea" name="description" required maxlength="500"
                                placeholder="Donnez une description à cette bière." rows="10" cols="40"></textarea>
                        </div>
                    </div>
                    <div class="right-box">
                        <img id="uploaded-img" src="../resources/img/beers/404.jpg">
                        <input id="file-input" type="file" name="img" accept="image/*" hidden>
                    </div>
                </div>
                <div>
                    <button type="submit" name="submitButton" class="submitButton">Publier</button>
                </div>
            </form>
         </div>
    </div>
    <?php $databaseManager->disconnect(); ?>
    <script type="text/javascript" src="../js/libs/<?=$jsJquery?>"></script>
    <script type="text/javascript" src="../js/libs/<?=$jsCompressorJs?>"></script>
    <script type="text/javascript" src="../js/<?=$jsAdd?>"></script>
</body>

</html>