<?php
  session_start();
  include('adm/includes/config.php');
  $bdd = bdd();

  $req = $bdd->prepare('SELECT id FROM USR WHERE id = ?');
  $req->execute([$_GET['id']]);
  $verif_user = $req->fetchAll(PDO::FETCH_ASSOC);

  if(count($verif_user) > 0){

    $req = $bdd->prepare('INSERT INTO REPORT (id_user, user_report) VALUES (?, ?);');
    $req->execute([$_SESSION['id']['id'], $_GET['id']]);

    $req = $bdd->prepare('SELECT user_report FROM REPORT WHERE id_user = ?');
    $req->execute([$_SESSION['id']['id']]);
    $res = $req->fetchAll(PDO::FETCH_ASSOC);

    $req = $bdd->prepare('SELECT COUNT(user_report) FROM REPORT WHERE user_report = ?');
    $req->execute([$_GET['id']]);
    $res_count = $req->fetch(PDO::FETCH_ASSOC);

    if((int)$res_count['COUNT(user_report)'] >= 6){
      $req = $bdd->prepare('UPDATE USR SET banOrNot = 1 WHERE id = ?');
      $req->execute(array($_GET['id']));
      header('location:434523354634545342534545435345343454657654342322233445456323142345432352354363254.html'); //profile.php
      exit;
    }
    header('location:43452335463454534' . $_GET['id'] . '2534545435345343454657654342322233445456323142345432352354363254.html'); //users_profile.php
    exit;
  }
  echo 'ehbahnan';
?>
