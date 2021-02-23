<?php
  include('includes/config.php');
  $bdd = bdd();
  $name = htmlspecialchars($_POST['name']);
  $category = $_POST['type'];
  $description = htmlspecialchars($_POST['description']);

  if (isset($name) && !empty($name) && isset($category) && !empty($category) && isset($description) && !empty($description)) {

    $q = 'INSERT INTO GAME (name, description, category) VALUES (?, ?, ?)';
    $req = $bdd->prepare($q);
    $req->execute([$name, $description, $category]);

    header('location:./');
    exit;
  } else {
    header('location:./?msg=ko');
    exit;
  }
?>
