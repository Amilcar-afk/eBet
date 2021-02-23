<?php
require('adm/includes/config.php');
include('confirmmail.php');
$bdd=bdd();
$checkmail = $_POST['mail'];
$check = explode('@',$checkmail);

if(!isset($_POST['private']) || empty($_POST['private'])){
  header('location: inscription.php?msg=Choose private or public account');
  exit;
}

$private = $_POST['private'] == 'private' ? 1 : 0;


$mailcheck = [
	'itiomail.com',
	'yopmail.com',
	'mailinator.com'
];

for($i = 0; $i < count($mailcheck); $i++){
	if($check[1] == $mailcheck[$i]){
		header('location: inscription.php?msg=email invalid');
    exit;
	}
}

//vérification, pseudo(existe ou non,longueur comprise entre 5 et 45 caractères), email(existe,format valide),password(existe et valeur comprise entre 8 et 15caractères).
if(!isset($_POST['login']) || empty($_POST['login']) || strlen($_POST['login']) < 5 || strlen($_POST['login']) > 35){
	header('location: inscription.php?msg=login invalid');
	exit;
}

//verifier que le pseudo n'est pas déja pris

$q = 'SELECT id FROM USR WHERE login = ?';
$req = $bdd->prepare($q);
$req->execute([$_POST['login']]);
$results = $req->fetchAll();

if(count($results) > 0){ //tableau non vide: pseudo déja utilisé
	header('location: inscription.php?msg=login already exist');
	exit;
}



if(count($results) > 0){ //tableau non vide: pseudo déja utilisé
	header('location: inscription.php?msg=login already exist');
	exit;
}

if(!isset($_POST['mail']) || empty($_POST['mail']) || !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
	header('location: inscription.php?msg=mail invalid');
	exit;
}

$q = 'SELECT id FROM USR WHERE mail = ?';
$req = $bdd->prepare($q);
$req->execute([$_POST['mail']]);
$results = $req->fetchAll();

if(count($results) > 0){
	header('location: inscription.php?msg=mail already exist');
	exit;
}


if(!isset($_POST['password']) || empty($_POST['password']) ||  strlen($_POST['password']) < 8 || strlen($_POST['password']) > 15){
	header('location: inscription.php?msg=password invalid');
	exit;
}
//htmlspecialchars pour empecher la faille XSS
$pseudo = htmlspecialchars($_POST['login']);
$name = $_POST['lastname'];
$firstname = $_POST['firstname'];
$country = $_POST['country'];

if(!isset($_POST['mobile']) || empty($_POST['mobile']) ||  strlen($_POST['mobile']) != 10){
	header('location: inscription.php?msg=invalid phone number');
	exit;
}

$mobile = $_POST['mobile'];
$email = $_POST['mail'];


//SALT

$salt = "gucciwallet";
$password = hash('sha256', $salt . $_POST['password']);
$key = confirmail();
$confirmail = 0;
$wallet = 100;
$ip = $_SERVER['REMOTE_ADDR'];

$acceptable = [
	'image/jpeg',
	'image/jpg',
	'image/gif',
	'image/png'
  ];


  if(!in_array($_FILES['image']['type'], $acceptable)){
	header('location: inscription.php?msg=Le fichier nest pas une image !');
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
  if(!file_exists($path)) {
	mkdir($path, 0777, true);
  }

  $filename = $_FILES['image']['name']; // le nom d'origine


  // renommer le fichier pour eviter les doublons
  $temp = explode('.', $filename);
  $extension = end($temp); //recuper l'extension
  $timestamp = time();
  $filename = 'image-' . $timestamp . '.' . $extension; //attention, ne marche pas si 2 fichier sont uploader dans la meme seconde

  $chemin_image = $path . '/' . $filename; //definition du chemin definitive
  var_dump($_FILES['image']['tmp_name']);
  var_dump($_FILES['image']['size']);

  move_uploaded_file($_FILES['image']['tmp_name'], $chemin_image);


foreach($_POST as $imag){
	if($_POST['imag1']== 'on' || $_POST['imag2']== 'on' || $_POST['imag3']== 'on'){
		$counter++;
	}
}

if($counter != 3){
	header('location: inscription.php?msg=captcha avaible');
}

//requete préparée
$timedate = date('Y-m');
$qdate = 'INSERT INTO TRACK (name,mounth) VALUES (?,?)';
$datreq = $bdd->prepare($qdate);
$datreq->execute([$columname,$timedate]);
$q = 'INSERT INTO USR (mail,name,firstName,login,passwd,city,phoneNumber,wallet,confirmkey,confirm,ip,img,private) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?,?,?,?,?)';
$req = $bdd->prepare($q);
$req->execute([$email,$name,$firstname,$pseudo,$password,$country,$mobile,$wallet,$key,$confirmail,$ip,$filename,$private]);

sendmail($email,$pseudo,$key);

header('location: index.php');
exit;

?>
