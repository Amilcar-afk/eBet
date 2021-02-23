<?php
  include('includes/config.php');
  $bdd = bdd();

  $valid = $bdd->prepare('UPDATE MATSH SET valid = 1 WHERE id = ?');
  $validate = $valid->execute([
    $_POST['id']
  ]);

  $req = $bdd->prepare('UPDATE BET SET result = ? WHERE id_match = ?');
  $req->execute([$_POST['sec'], $_POST['id']]);

  $select = $bdd->prepare('SELECT id_usr, rating, amount FROM BET WHERE id_match = ? AND team = ?');
  $select->execute([
    $_POST['id'],
    $_POST['sec']
  ]);
  $data = $select->fetchAll(PDO::FETCH_ASSOC);

  for ($i=0; $i < count($data); $i++) {
    $win = $bdd->prepare('UPDATE USR SET wallet = wallet + (? * ?) WHERE id = ?');
    $win->execute([
      $data[$i]['amount'],
      $data[$i]['rating'],
      $data[$i]['id_usr']
    ]);
  }

  for ($j=0; $j < count($data); $j++) {
    $winnerU = $bdd->prepare('UPDATE USR SET countVictory = countVictory + 1 WHERE id = ?');
    $winnerU->execute([
      $data[$j]['id_usr']
    ]);
  }

?>
