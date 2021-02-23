<?php
  include('adm/includes/config.php');
  $bdd = bdd();
  session_start();

  $q = 'SELECT id_match, content FROM NOTIF WHERE id_user = ? ORDER BY dateh DESC LIMIT 5';
  $req = $bdd->prepare($q);
  $req->execute([$_SESSION['id']['id']]);
  $res = $req->fetchAll(PDO::FETCH_ASSOC);

  if(count($res) > 0){
    foreach($res as $key => $value){
      $req = $bdd->prepare('SELECT name, first, second FROM MATSH WHERE id = ?');
      $req->execute([$res[$key]['id_match']]);
      $notif = $req->fetch(PDO::FETCH_ASSOC);

      $req = $bdd->prepare('SELECT name FROM TEAM WHERE id = ?');
      $req->execute([$notif['first']]);
      $first = $req->fetch(PDO::FETCH_ASSOC);

      $req = $bdd->prepare('SELECT name FROM TEAM WHERE id = ?');
      $req->execute([$notif['second']]);
      $second = $req->fetch(PDO::FETCH_ASSOC);

      echo( '<p id="p_notif"><b>' . $res[$key]['content'] . '</b><br>' . $notif['name'] . ': <b id = "first">' . $first['name'] . '</b> VS <b id = "second">' . $second['name'] . '</b></p>');
      echo '<br>';
    }
  }else{
    echo 'no result';
  }

?>

<style type="text/css">

#first{
  color:#44bd32;
}
#second{
  color:#cd84f1;
}

#p_notif:hover{
  background-color:#F5F1FD;
}

</style>
