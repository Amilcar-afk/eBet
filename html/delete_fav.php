<?php
  include('adm/includes/config.php');
  $bdd = bdd();
?>
<?php
  if(isset($_GET['id_user'], $_GET['id_match']) && !empty($_GET['id_user']) && !empty($_GET['id_match'])){
    $req = $bdd->prepare('DELETE FROM FAVOURITE WHERE id_user = ? AND id_match = ?');
    $req->execute(array($_GET['id_user'], $_GET['id_match']));
    header('location:434523354634545342534545435345343454657654342322233445456323142345432352354363254.html');
  }
?>
