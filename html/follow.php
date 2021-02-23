<?php
  session_start();
  include('adm/includes/config.php');
  $bdd = bdd();

  $req = $bdd->prepare('INSERT INTO FOLLOWER(id_usr, follower) VALUES (?, ?)');
  $req->execute([$_GET['id'], $_SESSION['id']['id']]);
  header('location:43452335463454534' . $_GET['id'] . '2534545435345343454657654342322233445456323142345432352354363254.html');

?>
