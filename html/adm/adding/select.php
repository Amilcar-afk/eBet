<!-- Request to print -->
<?php
  $respP = $bdd->query('SELECT id, firstname, lastname, pseudo, team, country FROM PLAYER');
  $respT = $bdd->query('SELECT id, name, type, organization, creation FROM TEAM');
  $respM = $bdd->query('SELECT id, name, game, first, second, dateH FROM MATSH WHERE dateH > NOW()');
  $respG = $bdd->query('SELECT id, name, description, category FROM GAME');
  $respC = $bdd->query('SELECT id, name, description FROM CATEGORY');
?>
