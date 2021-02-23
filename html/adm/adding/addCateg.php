<?php
  include('includes/config.php');
  $bdd = bdd();
  $name = htmlspecialchars($_POST['name']);
  $description = htmlspecialchars($_POST['description']);

  if (isset($name) && !empty($name) && isset($description) && !empty($description)) {

    $q = 'INSERT INTO CATEGORY (name, description) VALUES (?, ?)';
    $req = $bdd->prepare($q);
    $req->execute([$name, $description]);

    header('location:./');
    exit;
  } else {
    header('location:./?msg=ko');
    exit;
  }
?>
