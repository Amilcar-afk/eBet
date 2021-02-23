<?php
require('process_agenda.php');
require('adm/includes/config.php');
$bdd=bdd();
$q = 'SELECT id, name,dateH FROM MATSH';
$req = $bdd->prepare($q);
$req->execute();
$results = $req->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="css/agenda.css" rel="stylesheet">
    </head>
    <body>
        <header id="title">
            <h1><?php echo month();?></h1>
                 <p id="para">calendar of upcoming matches</p>
        </header>
        <main>
            <?php 
            $array = [];
            $array = days();
            $date = date('Y-m-j');
            $split = explode("-",$date);
            $nbdays = numberday();
            ?>
            <?php
                   for($day = 1; $day <= $nbdays; $day++){
                        $daymonth = $split[0] . '-' . $split[1] . '-' . $day;
                        echo '<div class="card" id="cardcss">
                                <div class="card-body">
                                 <div class="scoller">
                                    <h1 class="card-title" id="hone">' . $daymonth . '</h5>';
                                    if($day < $split[2]){
                                        echo '<a id="linkpast">past date</a>';
                                    }
                                    else {
                                        for($x = 0; $x < count($results); $x++){
                                            $fmatch = explode(' ',$results[$x]["dateH"]);
                                            $namematch = $results[$x]["name"];
                                            $match = $fmatch[0];
                                            $idmatch = $results[$x]["id"];
                                            if($day < 10){
                                            	$daymonth = $split[0] . '-' . $split[1] . '-' . '0'.$day;
                                            }else{
                                            	$daymonth = $split[0] . '-' . $split[1] . '-' . $day;
                                            }
                                            if($match == $daymonth){
                                                echo '<a href="bet.php?id=' . $idmatch . '"' . ' id="link">'.$namematch.'</a>';
                                            }
                                        }
                                        $x=0;
                                        echo '<br>';
                                    }
                                echo '</div>
                                </div>
                            </div>';
                        }
            ?>
        </main>
        <footer id="footercss">
            <p id="para"><?php echo "current date: " . date('Y/m/d');?></p>
        </footer>
    </body>
</html>