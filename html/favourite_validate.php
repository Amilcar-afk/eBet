
<?php
    include('adm/includes/config.php');
    $bdd = bdd();
?>
<?php
  session_start();

  if(!isset($_GET['id_match']) || empty($_GET['id_match'])){
    echo('no srry');
    exit;
  }

  $req = $bdd->prepare('INSERT INTO FAVOURITE VALUES (?, ?) ');
  $req->execute([$_SESSION['id']['id'], $_GET['id_match']]);
  header('location:434523354634545342534545435345343454657654342322233445456323142345432352354363254.html'); //profile.php

  /*echo '
    <div>
      <hr>
        <table>
          <label><u>Competition:</u><h3 id="res_compet" class="res_compet">'. $_GET['compet'] .'</h3></label>
           <tr>
             <th>First team</th>
             <th>Second team</th>
             <th>Game</th>
             <th>rating</th>
             <th>Date</th>
           </tr>
            <tr>
             <td><b id="res_first" class="first_team">'. $_GET['first'] . '</b></td>
             <td><b id="res_second" class="second_team">' . $_GET['second'] . '</b></td>
             <td id="res_game">' . $_GET['game']. '</td>
             <td>' . '0' . '</td>
             <td id="res_date">' . $_GET['date'] . '</td>
           </tr>
          </table><br>
          <a class="bet_link" href="to_bet.php?id_bet=' . $res['id'] . '&amp;
          compet= '. $_GET['compet'] .' &amp;
          first= '. $_GET['first'] .' &amp;
          second= '. $_GET['second'] .'&amp;
          game= '. $_GET['game'] .'&amp;
          date= '. $_GET['date'] .' ">To BET</a>
    </div>';*/
?>
