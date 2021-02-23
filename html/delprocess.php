<?php
require('adm/includes/config.php');
$bdd=bdd();
$id = htmlspecialchars($_GET['id']);
$pass = htmlspecialchars($_POST['password']);
if(!isset($_POST['password']) || empty($_POST['password'])){
    header('location: delaccount.php?message=error during the del process');
    exit;
}
$salt = "gucciwallet";
$passworduser = hash('sha256', $salt . $pass);
$q = $bdd->query('SELECT passwd AS passwd FROM USR WHERE id ='.$id);
$passuser = $q->fetch(PDO::FETCH_ASSOC);
$password = $passuser['passwd'];

if($password == $passworduser){
    $q = "DELETE FROM USR WHERE id = ?";
    $req = $bdd->prepare($q);
    $req->execute([$id]);
    session_start();
    $_SESSION = [];
    session_destroy();
    header('location: index.php');
    exit;
}else {
    header('location: delaccount.php?message=error during the del process');
    exit;
}



?>