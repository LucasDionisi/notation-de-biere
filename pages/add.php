<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'includes/head.php'; ?>
</head>

<body>
    <?php 
      include 'includes/header.php';

      if ($sessionManager->getUserInfo() === NULL) {
        header('Location: ../connexion');
      }
    ?>
    <h1>
        Ajouter une nouvelle bière
    </h1>
</body>

</html>