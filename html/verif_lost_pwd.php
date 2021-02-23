<?php
  include('adm/includes/config.php');
  $bdd = bdd();
  $email = $_POST['mail'];
  $q = $bdd->query('SELECT mail AS mail FROM USR');
  while( ($mail = $q->fetch(PDO::FETCH_ASSOC)) !== false){
    if($mail['mail'] == $email){
      $checkmail = $mail['mail'];
    }
  }

  $header="MIME-Version: 1.0\r\n";
  $header .= 'From: "ebet-esport.space"<support@ebet-esport.space>' . "\n";
  $message = '
  Modifier votre mot de passe en cliquant sur ce lien:
  http://www.ebet-esport.space/changepwd.php?mail=' . $checkmail . '
  Si vous etes pas a l origine de la demande veuillez ignorer ce mail :)
  ';
  mail($checkmail, "modification de mot de passe", $message, $header);
  header('location:index.php');
  exit;
?>
