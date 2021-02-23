<?php
    include('adm/includes/config.php');
    $bdd = bdd();
?>
<?php
  session_start();

  if(!isset($_GET['id_match']) || empty($_GET['id_match'])){
    echo('no srry');
    exit;
  }

  $req = $bdd->prepare('INSERT INTO SHARE_BET(id_user, id_match) VALUES (?, ?) ');
  $req->execute([$_SESSION['id']['id'], $_GET['id_match']]);
  header('location:434523354634545342534545435345343454657654342322233445456323142345432352354363254.html');
  ?>
