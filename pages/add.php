<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'includes/head.php'; ?>
    <link rel="stylesheet" type="text/css" href="../css/<?=$cssAdd?>">
</head>

<body>
    <?php 
      include 'includes/header.php';

      if ($sessionManager->getUserInfo() === NULL) {
        header('Location: ../connexion');
      }

      if (isset($_POST['submitButton'])) {
        $beerName = $_POST['name'];
        $description = $_POST['description'];
        $image = $_FILES['img'];
        $ext = '.' . pathinfo($image['name'], PATHINFO_EXTENSION);

        $version = 0;
        $fileName = $beerName . $ext;

        while (file_exists( __DIR__ . '/../resources/img/beers/' . $fileName)) {
            $version += 1;
            $fileName = $beerName . $version . $ext;
        }

        move_uploaded_file($_FILES['img']['tmp_name'], __DIR__ . '/../resources/img/beers/' . $fileName);
      }

    ?>
    <div class="page-content">
        <h1>Ajouter une nouvelle bière</h1>
        <div class="box-new">
            <form method="POST" action="POST" enctype="multipart/form-data">
                <div class="box-main">
                    <div class="left-box">
                        <div class="name-group">
                            <input id="name-input" type="text" name="name" required maxlength="100">
                            <span class="bar"></span>
                            <label>Nom de la bière</label>
                        </div>
                        <div class="description-group">
                            <textarea id="description-textarea" name="description" required maxlength="500"
                                placeholder="Donnez une description à cette bière." rows="10" cols="40"></textarea>
                        </div>
                    </div>
                    <div class="right-box">
                        <img id="uploaded-img" src="../resources/img/beers/fada.png">
                        <button id="btn-upload-img">Photo</button>
                        <input id="file-input" type="file" name="img" accept="image/*" hidden>
                    </div>
                </div>
                <div>
                    <button type="submit" name="submitButton" class="submitButton">Publier</button>
                </div>
            </form>
         </div>
    </div>
    <script type="text/javascript" src="../js/libs/<?=$jsJquery?>"></script>
    <script type="text/javascript" src="../js/libs/<?=$jsCompressorJs?>"></script>
    <script type="text/javascript" src="../js/<?=$jsAdd?>"></script>
</body>

</html>