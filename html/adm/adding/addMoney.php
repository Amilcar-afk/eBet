<?php
include('includes/config.php');
if(isset($_POST['amount']) && !empty($_POST['amount']) && isset($_POST['mail']) && !empty($_POST['mail'])) {

  $bdd = bdd();
  $req = 'UPDATE USR SET wallet = wallet + :amount WHERE mail = :mail';
  $req = $bdd->prepare($req);

  $req->execute([
    "mail" => $_POST['mail'],
    "amount" => $_POST['amount']
  ]);

  $test = $bdd->prepare('SELECT wallet FROM USR WHERE mail = :mail');
  $test->execute([
    "mail" => $_POST['mail']
  ]);
  $testr = $test->fetch();

  if($testr[0] < 0) {

  $req = 'UPDATE USR SET banOrNot = 1 WHERE mail = :mail';
  $req = $bdd->prepare($req);

  $req->execute([
    "mail" => $_POST['mail']
  ]);

} else {

    $requ = 'UPDATE USR SET banOrNot = 0 WHERE mail = :mail';
    $requ = $bdd->prepare($requ);

    $requ->execute([
      "mail" => $_POST['mail']
    ]);
}

  header('location:../');
  exit;
}
?>
