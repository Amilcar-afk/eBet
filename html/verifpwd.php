<?php
    require('adm/includes/config.php');
    $bdd=bdd();
    $newpassword = htmlspecialchars($_POST['pwd']);
    $newpassword1 = htmlspecialchars($_POST['pwd1']);
    $mail = htmlspecialchars($_GET['mail']);
    if($newpassword != $newpassword1){
        header('location: changepwd.php?mail='.$mail.'&error=yes');
        exit;
    }
    $q = 'SELECT id AS id FROM USR WHERE mail= ?';
    $req = $bdd->prepare($q);
    $req->execute([$mail]);
    $results = $req->fetch(PDO::FETCH_ASSOC);
    $id = $results['id'];
    $salt = "gucciwallet";
    $password = hash('sha256', $salt . $newpassword);
    $update ='UPDATE USR SET passwd = ? WHERE id = ?';
    $requp = $bdd->prepare($update);
    $success = $requp->execute([$password,$id]);
    if((int)$success == 1){
        echo "<script>alert('mot de passe modifier !');</script>";
        header('location: connexion.php');
        exit;
    }else{
        echo "<script>alert('probleme lors du changement, si le probleme persiste veuillez contacter notre support !');</script>";
        header('location: index.php');
        exit;
    }
?>