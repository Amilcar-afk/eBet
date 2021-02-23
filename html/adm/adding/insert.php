<?php
  $bdd = bdd();
  $playerT = $bdd->query('SELECT id, name FROM TEAM');
  $playerC = $bdd->query('SELECT id, nom_en_gb FROM COUNTRY');
  $matchG = $bdd->query('SELECT id, name FROM GAME');
  $matchT = $bdd->query('SELECT id, name FROM TEAM');
  $matchS = $bdd->query('SELECT id, name FROM TEAM');
  $gameT = $bdd->query('SELECT id, name FROM CATEGORY');
?>
