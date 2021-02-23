<?php
  session_start();
  if(!isset($_SESSION['id']['id']) || empty($_SESSION['id']['id'])){
    include('adm/includes/config.php');
    $bdd = bdd();

    $mail = htmlspecialchars($_POST['mail']);
    $salt = 'gucciwallet';
    $password =  hash('sha256', $salt . $_POST['password']);;

    $q = 'SELECT id FROM USR WHERE mail = ? AND passwd = ? AND banOrNot = ?';
    $req = $bdd->prepare($q);
    $req->execute(array($mail, $password, 0));
    $result = $req->fetchAll(PDO::FETCH_ASSOC);

    $q1 = 'SELECT confirm FROM USR WHERE mail = ? AND passwd = ? AND banOrNot = ?';
    $req1 = $bdd->prepare($q1);
    $req1->execute(array($mail, $password, 0));
    $confirm = $req1->fetch(PDO::FETCH_ASSOC);
    $confirm1 = $confirm['confirm'];
 

    if($confirm == 0){
      header('location:connexion.php?error1=yes');
      exit;
    }

    if(count($result) > 0){
      session_start();
      $_SESSION['id'] = $result[0];
      print_r($result);
      print_r($_SESSION['id']);
      header('location:434523354634545342534545435345343454657654342322233445456323142345432352354363254.html'); //redirection profile.php
      exit;
    }else{
      header('location:connexion.php?error=yes');
      exit;
    }
  }

    header('location:connexion.php?error=already connected');
?>
