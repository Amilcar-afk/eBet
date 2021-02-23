<?php
function winner($team){
    
    $bdd = bdd();
    $q = $bdd->query('SELECT nb_victory FROM TEAM WHERE name ="'.$team.'"');
    $nbvictory = $q->fetch(PDO::FETCH_ASSOC);
    $victory = $nbvictory['nb_victory'];
    $base = $victory;
    return $base;
}

function lose($base,$team){
    
    $bdd = bdd();
    $q = $bdd->query('SELECT nb_lose AS lose FROM TEAM WHERE name ="'.$team.'"');
    $nblose = $q->fetch(PDO::FETCH_ASSOC);
    $lose = $nblose['lose'];
    $base = $base+$lose;
    return $base;
}

function exper($base,$team){
    
    $bdd = bdd();
    $q = $bdd->query('SELECT creation AS creation FROM TEAM WHERE name ="'.$team.'"');
    $born = $q->fetch(PDO::FETCH_ASSOC);
    $creation = $born['creation'];
    $actually = date('Y-m-d');
    $date = (int)$actually - (int)$creation;
    $base += $date;
    return $base;    
}

function howmany($base,$team,$id){
    $bdd = bdd();
    $q1 = $bdd->query('SELECT id from TEAM WHERE name="'.$team.'"');
    $req = $q1->fetch(PDO::FETCH_ASSOC);
    $id = $req['id'];
    $q = $bdd->query('SELECT count(team) AS team FROM BET WHERE team ='.$id);
    $nbbet = $q->fetch(PDO::FETCH_ASSOC);
    $howmany = $nbbet['team'];
    $base = $base+$howmany;
    $base = number_format($base/(8+$howmany), 2,".",",");
    return $base;
}
?>