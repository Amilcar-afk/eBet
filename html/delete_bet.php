<?php
    include('adm/includes/config.php');
    $bdd = bdd();
?>

<?php
  $q = 'SELECT wallet FROM USR WHERE id = ?';
  $req = $bdd->prepare($q);
  $req->execute([$_GET['id_user']]);
  $res = $req->fetchAll(PDO::FETCH_ASSOC);

  $wallet = $res[0]['wallet'] + $_GET['amount'];

  $q = 'UPDATE USR SET wallet = ? WHERE id = ?';
  $req = $bdd->prepare($q);
  $req->execute([$wallet, $_GET['id_user']]);

  $q = 'DELETE FROM BET WHERE id_usr = ? AND id_match = ?';
  $req = $bdd->prepare($q);
  $req->execute([$_GET['id_user'], $_GET['id_match']]);
  header('location:434523354634545342534545435345343454657654342322233445456323142345432352354363254.html');
?>
