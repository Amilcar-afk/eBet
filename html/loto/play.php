<?php
session_start();
include('../adm/includes/config.php');
$bdd = bdd();

$req = 'UPDATE USR SET wallet = wallet - 1 WHERE id = ?';
$request = $bdd->prepare($req);
$request->execute([
  $_SESSION['id']['id']
]);

echo 'Vous avez dépensé 1 jeton';
?>
