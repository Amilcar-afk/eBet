<?php
require('adm/includes/config.php');
$bdd=bdd();
$id = htmlspecialchars($_GET['id']);


if(empty($_POST['lastname'])){
    $q = $bdd->query('SELECT name AS name FROM USR WHERE id ='.$id);
    $nameuser = $q->fetch(PDO::FETCH_ASSOC);
    $name = $nameuser['name'];
}else {
    $name = htmlspecialchars($_POST['lastname']);
}

if(empty($_POST['firstname'])){
    $q = $bdd->query('SELECT firstname AS first FROM USR WHERE id ='.$id);
    $firstuser = $q->fetch(PDO::FETCH_ASSOC);
    $firstname = $firstuser['first'];
}else {
    $firstname = htmlspecialchars($_POST['firstname']);
}
if(empty($_POST['login'])){
    if(strlen($_POST['login']) > 35){
        header('location: modify.php?msg=login invalid');
	    exit;
    }
    $q = $bdd->query('SELECT login AS login FROM USR WHERE id ='.$id);
    $loginuser = $q->fetch(PDO::FETCH_ASSOC);
    $login = $loginuser['login'];
}else {
    $login = htmlspecialchars($_POST['login']);
    $q = 'SELECT id FROM USR WHERE login = ?';
    $req = $bdd->prepare($q);
    $req->execute([$login]);
    $results = $req->fetchAll();

    if(count($results) > 0){ //tableau non vide: pseudo déja utilisé
	    header('location: modifydata.php?msg=login already exist');
	    exit;
    }
}
if(empty($_POST['mail'])){
    $q = $bdd->query('SELECT mail AS mail FROM USR WHERE id ='.$id);
    $mailuser = $q->fetch(PDO::FETCH_ASSOC);
    $checkmail = $mailuser['mail'];
}else {
    if(!filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
        header('location: modifydata.php?msg=mail invalid');
        exit;
    }
    $checkmail = htmlspecialchars($_POST['mail']);
    $q = 'SELECT id FROM USR WHERE mail = ?';
    $req = $bdd->prepare($q);
    $req->execute([$checkmail]);
    $results = $req->fetchAll();

    if(count($results) > 0){
	    header('location: modifydata.php?msg=mail already exist');
	    exit;
    }
}

$check = explode('@',$checkmail);
$mailcheck = [
	'itiomail.com',
	'yopmail.com',
	'mailinator.com'
];

for($i = 0; $i < count($mailcheck); $i++){
	if($check[1] == $mailcheck[$i]){
		header('location: modifydata.php?msg=email invalid');
    exit;
	}
}
if(empty($_POST['mobile'])){
    $q = $bdd->query('SELECT phoneNumber AS phone FROM USR WHERE id ='.$id);
    $phoneuser = $q->fetch(PDO::FETCH_ASSOC);
    $mobile = $phoneuser['phone'];
}else {
    $mobile = htmlspecialchars($_POST['mobile']);
}

if(empty($_POST['private'])){
    $q = $bdd->query('SELECT private AS private FROM USR WHERE id ='.$id);
    $privateuser = $q->fetch(PDO::FETCH_ASSOC);
    $private = $privateuser['private'];
}else{
    $private = $_POST['private'] == 'private' ? 1 : 0;
}

if(empty($_POST['password'])){
    $q = $bdd->query('SELECT passwd AS pwd FROM USR WHERE id ='.$id);
    $passuser = $q->fetch(PDO::FETCH_ASSOC);
    $password = $passuser['pwd'];
}else{
    $salt = "gucciwallet";
    $pass = htmlspecialchars($_POST['password']);
    $pass2 = htmlspecialchars($_POST['cpassword']);
    if($pass != $pass2){
        header('location: modifydata.php?msg=password is diffirent');
	    exit;
    }
    $password = hash('sha256', $salt . $pass);
}
$ip = $_SERVER['REMOTE_ADDR'];

if(empty($_FILES['image'])){
    $q = $bdd->query('SELECT img AS image FROM USR WHERE id ='.$id);
    $imguser = $q->fetch(PDO::FETCH_ASSOC);
    $filename = $imguser['image'];
}else {
    $acceptable = [
	    'image/jpeg',
	    'image/jpg',
	    'image/gif',
	    'image/png'
    ];


  if(!in_array($_FILES['image']['type'], $acceptable)){
	header('location: modify.php?msg=Le fichier nest pas une image !');
	exit;
  }
   //verification du poids du fichier

  $maxsize = 1024 * 1024; //limite a 1Mo
  if($_FILES['image']['size'] > $maxsize) {
	header('location: inscription.php?msg=Le fichier est trop volumineux!');
	exit;
  }

  //determination du chemin ou va etre enregistree l'image
  $path = 'signup';
  //si le dossier nexiste pas, le creer

  $filename = $_FILES['image']['name']; // le nom d'origine


  // renommer le fichier pour eviter les doublons
  $temp = explode('.', $filename);
  $extension = end($temp); //recuper l'extension
  $timestamp = time();
  $filename = 'image-' . $timestamp . '.' . $extension; //attention, ne marche pas si 2 fichier sont uploader dans la meme seconde

  $chemin_image = $path . '/' . $filename; //definition du chemin definitive

  move_uploaded_file($_FILES['image']['tmp_name'], $chemin_image);
    }

  $q = 'INSERT INTO USR (mail,name,firstName,login,passwd,city,phoneNumber,ip,img,private) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?)';
  $req = $bdd->prepare($q);
  $req->execute([$checkmail,$name,$firstname,$login,$password,$country,$mobile,$ip,$filename,$private]);

  header('location: 434523354634545342534545435345343454657654342322233445456323142345432352354363254.html');
  exit;

?>