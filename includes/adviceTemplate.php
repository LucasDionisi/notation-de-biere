<div class="advice">
  <div class="advice-left">
    <a href="../u/<?=$advice['pseudo']?>">
      <img src="../resources/img/profil.svg">
    </a>
    <div class="userInfos">
      <div class="pseudo">
        <p><?=$advice['pseudo']?></p>
      </div>
      <!--<div class="nbAdvices">
        <p><?=$advices->num_rows?> Avis</p>
      </div>-->
    </div>
  </div>   
    <div class="advice-right">
      <div class="rate-and-date">
        <div class="advice-rate">
        <?php
        if ($advice['rate']) 
        {
         $floor = floor($advice['rate']);
         $i = 0;
         while ($i < $floor) 
         {?>
          <img src="../resources/img/beer-rate/beer-100.png">
          
          <?php
          $i++; 
         }
         if ($i < 5) {
         ?>
          <img src="../resources/img/beer-rate/beer-<?=(int)((fmod($advice['rate'], $floor))*4) * 25?>.png">
          <?php
          $i++;
         }
            
          while($i < 5) {
          ?>
            <img src="../resources/img/beer-rate/beer-0.png">
            <?php
           $i++;
          }
        } 
        ?>
        </div>
        <p><i>Avis publié le <?=date_format(new DateTime($advice['created_at']), 'd-m-Y à H:i')?></i></p>
      </div>
      <div class="advice-title">
        <p><?=$advice['title']?></p>
    </div>
    <p><?=$advice['comment']?></p>
  </div>
</div>