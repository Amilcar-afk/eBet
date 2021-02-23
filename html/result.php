<?php
  $today = date('Y-m-d H:i:s');
  $req = $bdd->prepare('SELECT id_match FROM BET WHERE id_usr = ? AND date_h < ?');
  $req->execute([$_SESSION['id']['id'], $today]);
  $check = $req->fetchAll(PDO::FETCH_ASSOC);

  if(count($check) > 0){
    foreach ($check as $key => $value) {
      $q = 'SELECT team, result FROM BET WHERE id_match = ?';
      $req = $bdd->prepare($q);
      $req->execute([$check[$key]['id_match']]);
      $verif = $req->fetch(PDO::FETCH_ASSOC);

      if($verif['team'] == $verif['result']){
        echo "<div id='div_victory' class = 'div_res'>";
          echo '<img src="imgs/medal.png" class="img_victory">';
          echo '<h1 id="h1_victory">Victory</h1>';
          echo '<img src="imgs/medal.png" class="img_victory">';
        echo "</div>";
        include('bet_res.php');
      }else{
        echo "<div class = 'div_res'>";
          echo '<img src="imgs/close.png" class="img_defeat">';
          echo '<h1 id="h1_defeat">Defeat</h1>';
          echo '<img src="imgs/close.png" class="img_defeat">';
        echo "</div>";
        include('bet_res.php');
      }
    }
  }else{
    echo 'No Bet';
  }
?>





<style type="text/css">
  .div_res{
    display: flex;
    flex-direction: row;
    justify-content: flex-start;
    flex-basis: auto;
  }
  .img_victory, .img_defeat{
    width:8%;
    margin:0px;
  }
  #h1_victory{
    color:#f1c40f;
  }
  #h1_defeat{
    color:#e74c3c;
  }
</style>
