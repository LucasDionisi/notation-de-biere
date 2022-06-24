<div class="advice">
  <div class="advice-left">
    <?php if ($isUserPage) { ?>
      <a href="../biere/<?= $advice['beer_name'] ?>">
        <img src="../resources/img/beers/<?= $advice['image_name'] ?>">
        <div class="userInfos">
          <div class="pseudo">
            <p><?= $advice['beer_name'] ?></p>
          </div>
        </div>
      </a>
    <?php } else { ?>
      <a href="../u/<?= $advice['pseudo'] ?>">
        <img src="../resources/img/profil.svg">
        <div class="userInfos">
          <div class="pseudo">
            <p><?= $advice['pseudo'] ?></p>
          </div>
        </div>
      </a>
    <?php } ?>
  </div>
  <div class="advice-right">
    <div class="rate-and-date">
      <div class="advice-rate">
        <?php
        if ($advice['rate']) {
          $floor = floor($advice['rate']);
          $i = 0;
          while ($i < $floor) { ?>
            <img src="../resources/img/beer-rate/beer-100.png">
          <?php
            $i++;
          }
          if ($i < 5) {
          ?>
            <img src="../resources/img/beer-rate/beer-<?= (int)((fmod($advice['rate'], $floor)) * 4) * 25 ?>.png">
          <?php
            $i++;
          }

          while ($i < 5) {
          ?>
            <img src="../resources/img/beer-rate/beer-0.png">
        <?php
            $i++;
          }
        }
        ?>
      </div>
      <p class="date-full"><i>Avis publié le <?= date_format(new DateTime($advice['created_at']), 'd-m-Y à H:i') ?></i></p>
      <p class="date-cut"><i>Le <?= date_format(new DateTime($advice['created_at']), 'd-m-Y') ?></i></p>
    </div>
    <div class="advice-title">
      <p><?= $advice['title'] ?></p>
    </div>
    <p class="advice-comment scrollbar"><?= $advice['comment'] ?></p>
  </div>
</div>