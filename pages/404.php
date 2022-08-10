<!DOCTYPE html>
<html lang="fr">

<head>
    <?php 
        $title = "Page introuvable 404";
        include 'includes/head.php';
    ?>
    <link rel="stylesheet" type="text/css" href="../css/<?=$css404?>">
</head>

<body>
    <?php include 'includes/header.php';?>
    
    <div class="page-content">
        <h1>Oh nooon, cette page est introuvable !</h1>
        <img src="resources/img/empty_beer.jpg" alt="Photo de bière vide">
        <h1>Va te resservir une bière 🍺 !</h1>
    </div>
</body>

</html>