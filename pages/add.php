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
    ?>
    <div class="page-content">
        <h1>Ajouter une nouvelle bière</h1>
        <div class="box-new">
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
                <button class="submitButton">Publier</button>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/libs/<?=$jsJquery?>"></script>
    <script type="text/javascript" src="../js/libs/<?=$jsCompressorJs?>"></script>
    <script type="text/javascript" src="../js/<?=$jsAdd?>"></script>
</body>

</html>