<?php
  session_start();
  include('adm/includes/config.php');
  $bdd = bdd();

  /*$req = $bdd->prepare('SELECT ');*/
  echo($_POST['msg'] . '<br><br>');

?>
