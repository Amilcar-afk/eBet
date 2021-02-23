<?php
  session_start();
  include('adm/includes/config.php');
  $bdd = bdd();
?>

<?php

  $q = 'SELECT wallet FROM USR WHERE id = ?';
  $req = $bdd->prepare($q);
  $req->execute([$_SESSION['id']['id']]);
  $res_w = $req->fetchAll(PDO::FETCH_ASSOC);

  $wallet = $res_w[0]['wallet'] - $_POST['amount'];

    $q = 'SELECT id, name, game, first, second, dateH FROM MATSH WHERE id = ?';
    $req = $bdd->prepare($q);
    $req->execute([$_GET['id_bet']]);
    $res = $req->fetchAll(PDO::FETCH_ASSOC);

    //select for game
    $q = 'SELECT name FROM GAME WHERE id = ?';
    $req = $bdd->prepare($q);
    $req->execute(array($res[0]['game']));
    $res_game = $req->fetch(PDO::FETCH_ASSOC);
    //

    //select for team first
    $q = 'SELECT name FROM TEAM WHERE id = ?';
    $req = $bdd->prepare($q);
    $req->execute(array($res[0]['first']));
    $res_first = $req->fetch(PDO::FETCH_ASSOC);
    ///

    //select for team second
    $q = 'SELECT name FROM TEAM WHERE id = ?';
    $req = $bdd->prepare($q);
    $req->execute(array($res[0]['second']));
    $res_second = $req->fetch(PDO::FETCH_ASSOC);
    ///

    $req = $bdd->prepare('SELECT id FROM TEAM WHERE name = ?');
    $req->execute([$_POST['check']]);
    $team_name = $req->fetch(PDO::FETCH_ASSOC);

    print_r($res);
    echo "//";
    print_r($res_second);
    echo "//";
    print_r($res_w);

    if ($_POST['check'] == $res_first['name']){
      $rating = $_GET['cote1'];
    }
    if ($_POST['check'] == $res_second['name']){
      $rating = $_GET['cote2'];
    }

  if($_POST['amount'] > $res_w[0]['wallet']){

    header('location:43623453452244534323443224223344é354523433355' . $res[0]['id'] . '47153567443222345543' . $res[0]['name']  . 'ETYRGVEzSD' . $res_first['name'] . 'ZREDVFGRZD' . $res_second['name'] . 'FFGHZFREG' . $res_game['name'] . 'UBHEZERFGEFDGRE' . $res[0] ['dateH'] . '-' . 'not_enought coin' . '-' . $_GET['cote1'] . '-' . $_GET['cote2'] .'.html'
          ); //to_bet.php
    exit;
  }

  if((int)$_POST['amount'] < 0){
    header('location:43623453452244534323443224223344é354523433355' . $res[0]['id'] . '47153567443222345543' . $res[0]['name']  . 'ETYRGVEzSD' . $res_first['name'] . 'ZREDVFGRZD' . $res_second['name'] . 'FFGHZFREG' . $res_game['name'] . 'UBHEZERFGEFDGRE' . $res[0] ['dateH'] . '-' . 'false_value' . '-' . $_GET['cote1'] . '-' . $_GET['cote2'] .'.html'          ); //to_bet.php
    exit;
  }

  echo(date($res[0]['dateH']));

  $q = 'INSERT INTO BET(id_match, id_usr, rating, amount, date_h, team) VALUES(?, ?, ?, ?, ?, ?)';
  $req = $bdd->prepare($q);
  $req->execute([$res[0]['id'], $_SESSION['id']['id'],  $rating, $_POST['amount'], $res[0]['dateH'], $team_name['id']]);

  $q = 'UPDATE USR SET wallet = ? WHERE id = ?';
  $req = $bdd->prepare($q);
  $req->execute([$wallet, $_SESSION['id']['id']]);

  header('location:434523354634545342534545435345343454657654342322233445456323142345432352354363254.html'); //profile.php
?>
