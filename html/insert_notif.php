<?php
  include('adm/includes/config.php');
  $bdd = bdd();
  session_start();

  $today = date('Y-m-d H:i:s');
  $q = 'SELECT id_match FROM BET WHERE id_usr = ? AND date_h < ?'; //take all the over bet of the user
  $req = $bdd->prepare($q);
  $req->execute([$_SESSION['id']['id'], $today]);
  $res = $req->fetchAll(PDO::FETCH_ASSOC);

  if(count($res) > 0){
    $req = $bdd->prepare('SELECT id_match FROM NOTIF WHERE id_user = ?'); //verif if the notif already exist
    $req->execute([$_SESSION['id']['id']]);
    $check = $req->fetchAll(PDO::FETCH_ASSOC);

    if(count($check) > 0){
      for ($i=0; $i<count($res); $i++) {
        $verif = 0;
        for($j=0; $j<count($check);$j++){
          if($res[$i]['id_match'] == $check[$j]['id_match']){
            $verif++;
          }
        }
        if($verif === 0){
          $req = $bdd->prepare('INSERT INTO NOTIF (content, id_user, dateh, id_match) VALUES (?, ?, ?, ?)');

          $req->execute([
            'You have completed a bet !',
            $_SESSION['id']['id'],
            $today,
            $res[$i]['id_match']
          ]);
        }

      }
    }else{
      foreach ($res as $key => $value) {
        $req = $bdd->prepare('INSERT INTO NOTIF (content, id_user, dateh, id_match) VALUES (?, ?, ?, ?)');

        $req->execute([
          'You have completed a bet !',
          $_SESSION['id']['id'],
          $today,
          $res[$key]['id_match']
        ]);
      }
    }
  }
?>
