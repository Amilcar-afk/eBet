<?php
  session_start();
  include('adm/includes/config.php');
  $bdd = bdd();

  $req = $bdd->prepare('DELETE FROM SHARE_BET WHERE id_user = ? AND id_match = ?');
  $req->execute([$_SESSION['id']['id'], $_GET['id_match']]);
  header('location:434523354634545342534545435345343454657654342322233445456323142345432352354363254.html');
?>
