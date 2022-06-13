<?php
  require_once 'modules/session/sessionManager.php';
?>

<header>
  <a href="../">
    <div class="header header-left">
      <img src="../resources/img/beer.svg" alt="Logo Notabière"/>
      <p>Notabière</p>
    </div>
  </a>
  <div class="header header-right">
    <div class="add-beer">
      <a href="../ajouter/">
        <img src="../resources/img/add.svg" alt="Ajouter un advice"/>
        <p>Ajouter une bière</p>
      </a>
    </div>
    <?php
      $session = $sessionManager->getUserInfo();
      if ($session === NULL) {
    ?>
      <div>
        <a href="/connexion/">
          <p>Connectez-vous</p>
        </a>
      </div>
    <?php 
      } else {
    ?>
      <a href="../u/<?=$session['pseudo']?>"><img src="../resources/img/profil.svg" alt="Photo de profil"/></a>
    <?php
      }
    ?>
  </div>
</header>