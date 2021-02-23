<?php
session_start();
include('../adm/includes/config.php');
$bdd = bdd();

$req = 'UPDATE USR SET wallet = wallet + 1000 WHERE id = ?';
$request = $bdd->prepare($req);
$request->execute([
  $_SESSION['id']['id']
]);

echo 'Vous avez gagné 1000 jetons';
?>
