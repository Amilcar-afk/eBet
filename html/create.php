<?php
session_start();
require('adm/includes/config.php');
$bdd=bdd();

if(isset($_POST['valuebuy']) || $_POST['valuebuy'] > 0){
        $q = "UPDATE USR SET wallet = wallet + ? WHERE id = ?";
        $req = $bdd->prepare($q);
        if($req === false){
            echo '0';
            return;
        }
        $success = $req->execute([$_POST['valuebuy'],$_SESSION['id']['id']]);
        echo (int)$success;  
}else {
    echo "Missing required parameter(s)";
}
?>