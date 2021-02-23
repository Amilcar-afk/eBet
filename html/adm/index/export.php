<?php
$file = 'xml.php';
$newfile = 'client.xml';
if (!copy($file, $newfile)) {
 echo "La copie du fichier $file n'a pas réussi...\n";
}
?>
