<?php
  include('includes/config.php');
  $bdd = bdd();
  $name = htmlspecialchars($_POST['name']);
  $type = htmlspecialchars($_POST['type']);
  $organization = htmlspecialchars($_POST['orga']);
  $date = $_POST['date'];

  if (isset($name) && !empty($name) && isset($type) && !empty($type) && isset($organization) && !empty($organization)) {

    $q = 'INSERT INTO TEAM (name, type, organization, creation) VALUES (?, ?, ?, ?)';
    $req = $bdd->prepare($q);
    $req->execute([$name, $type, $organization, $date]);

    header('location:./');
    exit;
  } else {
    header('location:./?msg=ko');
    exit;
  }
?>
