<?php
  require_once 'modules/session/sessionManager.php';
?>

<header>
    <a href="../">
        <div class="header header-left">
            <img src="../resources/img/beer.svg" alt="Logo Notabière" />
            <p>Notabière</p>
        </div>
    </a>
    <div class="header header-right">
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
        <a href="../u/<?=$session['pseudo']?>">
            <div class="user-connected">
                <p><?=$session['pseudo']?></p>
                <?php
                    $img = $session['avatar'];
                    if ($img == NULL || !file_exists('resources/img/avatars/' . $img)) {
                        $img = "default.png";
                    }
                ?>
                <img src="../resources/img/avatars/<?=$img?>" alt="Photo de profil" />
            </div>
        </a>
        <?php
      }
    ?>
    </div>
</header>