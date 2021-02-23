<?php
function bdd() {
  try {
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=dataX;charset=utf8', 'root', 'p@ssw0rd', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  } catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
  }
    return $bdd;
  }
?>
