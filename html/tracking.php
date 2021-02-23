<?php
include('adm/includes/config.php');

$bdd = bdd();
$timedate = date('Y-m');
$columname = 'signup';


$exist = 'SELECT mounth FROM TRACK WHERE mounth = ?';
$existornot = $bdd->prepare($exist);
$existornot->execute([$timedate]);
$result = $existornot->fetchAll();

if(count($result) == 0){
  $create = 'INSERT INTO TRACK (name, mounth) VALUES (?, ?)';
  $creating = $bdd->prepare($create);
  $creating->execute([$columname, $timedate]);
}

$up = 'UPDATE TRACK SET count = count + 1 WHERE name = ? AND mounth = ?';
$updatetrack = $bdd->prepare($up);
$updatetrack->execute([$columname, $timedate]);
?>
