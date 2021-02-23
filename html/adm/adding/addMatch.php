<?php
  include('includes/config.php');
  $bdd = bdd();

  $name = htmlspecialchars($_POST['name']);
  $date = $_POST['date'];
  $time = $_POST['time'];
  $datetime = $date . " " . $time;
  $game = $_POST['game'];
  $first = $_POST['first'];
  $second = $_POST['second'];

  if (isset($name) && !empty($name) && isset($date) && !empty($date) && isset($time) && !empty($time) && isset($game) && !empty($game) && isset($first) && !empty($first) && isset($second) && !empty($second)) {
    $req = $bdd->prepare('INSERT INTO MATSH (name, game, first, second, dateH) VALUES (?, ?, ?, ?, ?)');
    $req->execute([$name, $game, $first, $second, $datetime]);

    header('location:./');
    exit;
  } else {
    header('location:./?msg=ko');
    exit;
  }
?>
