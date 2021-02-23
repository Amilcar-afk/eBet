<?php
function confirmail(){
    $lenkey = 12;
    $key = "";

    for($i = 0; $i < $lenkey; $i++){
        $key .= mt_rand(0,9);
    }

    return $key;
}

function sendmail($email,$pseudo,$key){
    $header="MIME-Version: 1.0\r\n";
    $header .= 'From: "ebet-esport.space"<support@ebet-esport.space>' . "\n";
    $message = '
    Confirmez votre compte en cliquant sur le lien:
    http://www.ebet-esport.space/confirmation.php?pseudo=' . $pseudo . '&key=' . $key . '
    En cas de probleme veillez contacter le support et non repondre a ce mail :)
    ';
    mail($email, "confirmation de compte", $message, $header);
}
?>