<?php
include('includes/config.php');
if(isset($_POST['banmail']) && !empty($_POST['banmail'])) {
  $bdd = bdd();
  $mail = $_POST['banmail'];

  $test = $bdd->prepare('SELECT banOrNot FROM USR WHERE mail = :mail');
  $test->execute([
    "mail" => $_POST['banmail']
  ]);
  $testr = $test->fetch();

  if ($testr[0] == 1) {
    $req = 'UPDATE USR SET banOrNot = 0 WHERE mail = :banmail';
    $req = $bdd->prepare($req);

    $req->execute([
      "banmail" => $_POST['banmail']
    ]);

  } else if($testr[0] == 0) {

  $req = 'UPDATE USR SET banOrNot = 1 WHERE mail = :banmail';
  $req = $bdd->prepare($req);

  $req->execute([
    "banmail" => $_POST['banmail']
  ]);

  }

  header('location:../');
  exit;
}
?>
