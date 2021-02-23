<?php
  include('includes/config.php');

  $bdd = bdd();
  $req = 'SELECT count FROM TRACK WHERE name = ? ORDER BY mounth';
  $res = $bdd->prepare($req);
  $res->execute(['signup']);

 $data = $res->fetchAll(PDO::FETCH_ASSOC);
 echo 0;
 for ($i=0; $i < count($data); $i++) {
   echo '|'.$data[$i]['count'];
 }
?>
