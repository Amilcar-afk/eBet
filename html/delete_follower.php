<?php
  session_start();
  include('adm/includes/config.php');
  $bdd = bdd();

  $req = $bdd->prepare('DELETE FROM FOLLOWER WHERE id_usr = ? AND follower = ?');
  $req->execute([$_SESSION['id']['id'], $_GET['id']]);
  header('location:434523354634545342534545435345343454657654342322233445456323142345432352354363254.html');
?>
