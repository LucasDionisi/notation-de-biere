<!DOCTYPE html>
<html lang="fr">
  <head>
    <?php include 'tools/head.php';?>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header>
      <div class="header header-left">
        <img src="resources/img/beer.svg" alt="Logo notation de bière"/>
        <p>Notation de bière</p>
      </div>
      <div class="header header-right">
        <div class="add-advice">
          <img src="resources/img/add.svg" alt="Ajouter un avis"/>
          <p>Ajouter un avis</p>
        </div>
        <img src="resources/img/profil.svg" alt="Photo de profil"/>
      </div>
    </header>
    <main>
      <form class="form-search" role="search">
        <input type="search" class="input-search" placeholder="Quelle bière ?" aria-label="Rechercher une bière">
      </form>
    </main>
  </body>
</html>