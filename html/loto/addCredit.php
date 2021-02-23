<?php
session_start();
include('../adm/includes/config.php');
$bdd = bdd();

$req = 'UPDATE USR SET credit = credit + 1 WHERE id = ?';
$request = $bdd->prepare($req);
$request->execute([
  $_SESSION['id']['id']
]);

echo 'Vous avez gagné 1 jeton de pari a 10€';
?>
