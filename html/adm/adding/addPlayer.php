<?php
  include('includes/config.php');
  $bdd = bdd();
  $firstname = htmlspecialchars($_POST['firstname']);
  $lastname = htmlspecialchars($_POST['lastname']);
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $team = $_POST['team'];
  $country = $_POST['country'];

  if (isset($firstname) && !empty($firstname) && isset($lastname) && !empty($lastname) && isset($pseudo) && !empty($pseudo) && isset($team) && !empty($team) && isset($country) && !empty($country)) {
    $q = 'INSERT INTO PLAYER (firstname,lastname,pseudo,team,country) VALUES (?, ?, ?, ?, ?)';
    $req = $bdd->prepare($q);
    $req->execute([$firstname, $lastname, $pseudo, $team, $country]);

    header('location:./');
    exit;
  } else {
    header('location:./?msg=ko');
    exit;
  }
?>
