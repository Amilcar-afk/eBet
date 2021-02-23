<?php
  include('includes/config.php');
  $bdd = bdd();

  $req = $bdd->prepare('SELECT id_usr, amount FROM BET WHERE id_match = ?');
  $req->execute([$_POST['button']]);
  $res = $req->fetchAll(PDO::FETCH_ASSOC);

  if(count($res) > 0){
    foreach ($res as $key => $value) {
      $q = 'SELECT wallet FROM USR WHERE id = ?';
      $req = $bdd->prepare($q);
      $req->execute([$res[$key]['id_usr']]);
      $wallet = $req->fetch(PDO::FETCH_ASSOC);

      $new_wallet = $wallet['wallet'] + $res[$key]['amount'];

      $req = $bdd->prepare('UPDATE USR SET wallet = ? WHERE id = ?');
      $req->execute([$new_wallet, $res[$key]['id_usr']]);
      print_r($new_wallet);
    }
  }

  $del = $bdd->prepare('DELETE FROM MATSH WHERE id = ?');
  $del->execute([$_POST['button']]);

  $del = $bdd->prepare('DELETE FROM BET WHERE id_match = ?');
  $del->execute([$_POST['button']]);

  $del = $bdd->prepare('DELETE FROM FAVOURITE WHERE id_match = ?');
  $del->execute([$_POST['button']]);

  $del = $bdd->prepare('DELETE FROM SHARE_BET WHERE id_match = ?');
  $del->execute([$_POST['button']]);

  $del = $bdd->prepare('DELETE FROM NOTIF WHERE id_match = ?');
  $del->execute([$_POST['button']]);

  header('location:index.php');

  exit;
?>
