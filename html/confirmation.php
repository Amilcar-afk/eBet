<?php
   require('adm/includes/config.php');
   $bdd=bdd();
   $pseudo = htmlspecialchars($_GET['pseudo']);
   $key = htmlspecialchars($_GET['key']);
   $q = 'SELECT * FROM USR WHERE login = ?';
   $req = $bdd->prepare($q);
   $req->execute([$_GET['pseudo']]);
   $results = $req->fetchAll(); 
   if(count($results) > 0){ //tableau non vide: pseudo déja utilisé
    if($results['confirm'] == 0){
        $update ='UPDATE USR SET confirm = 1 WHERE login = ? AND confirmkey = ?';
        $requp = $bdd->prepare($update);
        $requp->execute([$pseudo,$key]);
        echo "Votre compte a bien été confirmé";
        header('location: connexion.php');
        exit;
    }else{
        echo "Votre compte a déja été confirmé";
        header('location: index.php');
        exit;
    }
} else {
    echo "L'utilisateur n'existe pas";
    header('location: inscription.php');
    exit;
}
?>