<?php
  session_start();
  include('adm/includes/config.php');
  $bdd = bdd();

  $req = $bdd->prepare('SELECT name, firstname, login, wallet, city, countVictory FROM USR WHERE id = ?');
  $req->execute([$_GET['id']]);
  $res = $req->fetch(PDO::FETCH_ASSOC);

  $req = $bdd->prepare('SELECT nom_en_gb FROM COUNTRY WHERE id = ?');
  $req->execute([$res['city']]);
  $country = $req->fetch(PDO::FETCH_ASSOC);

  $req = $bdd->prepare('SELECT id_usr FROM FOLLOWER WHERE id_usr = ? AND follower = ?');
  $req->execute([$_GET['id'], $_SESSION['id']['id']]);
  $verif_follow = $req->fetchAll();

  $req = $bdd->prepare('SELECT id_user FROM REPORT WHERE id_user = ? AND user_report = ?');
  $req->execute([$_SESSION['id']['id'], $_GET['id']]);
  $verif_ban = $req->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE html>
<html>
<head>
  <title>User_profile</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="css/style_users.css">
</head>
<body>
  <header></header>
  <main>
    <div id="info">
      <h1><?php echo($res['login']); ?></h1>
      <table>
         <tr>
           <th>Name</th>
           <th>Firstname</th>
           <th>Wallet</th>
           <th>Country</th>
           <th>Numbers of wins</th>
         </tr>
        <tr>
           <?php echo('<td>' . $res['name']  . '</td>');
            echo('<td>' . $res['firstname']  . '</td>');
            echo('<td>' . $res['wallet']  . '</td>');
            echo('<td>' . $country['nom_en_gb'] . '</td>');
            echo('<td>' . $res['countVictory'] . '</td>'); ?>
         </tr>
       </table><br><br>
       <?php
        if(!count($verif_follow) > 0){
          echo ('<a id="follow" href="follow.php?id=' . $_GET['id'] . '">FOLLOW</a>');
        }else{
          echo ('<a id="unfollow" href="unfollow.php?id=' . $_GET['id'] . '">UNFOLLOW</a>');
        }
        if(!count($verif_ban) > 0){
          echo ('<a id="ban" href="ban.php?id=' . $_GET['id'] . '">REPORT</a>');
        }
      ?>
      </div><br><br><hr>
      <h2>Shared bets</h2>
      <?php

        if(count($verif_follow) > 0){

          $req = $bdd->prepare('SELECT id_match FROM SHARE_BET WHERE id_user = ?');
          $req->execute([$_GET['id']]);
          $res_match = $req->fetchAll(PDO::FETCH_ASSOC);

          if(count($res) > 0){
            foreach ($res_match as $key => $value) {
              $today = date('Y-m-d');
              $req = $bdd->prepare('SELECT id, name, game, first, second, dateH FROM MATSH WHERE dateH > ? AND id = ?');
              $req->execute([$today, $res_match[$key]['id_match']]);
              $res = $req->fetch(PDO::FETCH_ASSOC);

              //select for game
              $q = 'SELECT name FROM GAME WHERE id = ?';
              $req = $bdd->prepare($q);
              $req->execute(array($res['game']));
              $res_game = $req->fetch(PDO::FETCH_ASSOC);
              //

              //select for team first
              $q = 'SELECT name FROM TEAM WHERE id = ?';
              $req = $bdd->prepare($q);
              $req->execute(array($res['first']));
              $res_first = $req->fetch(PDO::FETCH_ASSOC);
              ///

              //select for team second
              $q = 'SELECT name FROM TEAM WHERE id = ?';
              $req = $bdd->prepare($q);
              $req->execute(array($res['second']));
              $res_second = $req->fetch(PDO::FETCH_ASSOC);
              ///

              //verif if user have already bet on this match
              $q = 'SELECT id_usr, id_match FROM BET WHERE id_match = ? AND id_usr = ?';
              $req = $bdd->prepare($q);
              $req->execute([$res['id'], $_SESSION['id']['id']]);
              $verif_bet = $req->fetchAll(PDO::FETCH_ASSOC);
              //

              //verif if the bet is not already in Favourite
              $req = $bdd->prepare('SELECT id_user FROM FAVOURITE WHERE id_match = ? AND id_user = ?');
              $req->execute(array($res['id'], $_SESSION['id']['id']));
              $verif_fav = $req->fetchAll();

              //verif if the bet is not already share
              $req = $bdd->prepare('SELECT id_user FROM SHARE_BET WHERE id_match = ? AND id_user = ?');
              $req->execute(array($res['id'], $_SESSION['id']['id']));
              $verif_share = $req->fetchAll();

              echo '
                    <div id="div_bet">
                        <table>
                          <label><u>Competition:</u><h3 id="res_compet" class="res_compet">'. $res['name'] .'</h3></label>
                           <tr>
                             <th>First team</th>
                             <th>Second team</th>
                             <th>Game</th>
                             <th>rating</th>
                             <th>Date</th>
                           </tr>
                            <tr>
                             <td><b id="res_first" class="first_team">'. $res_first['name'] . '</b></td>
                             <td><b id="res_second" class="second_team">' . $res_second['name'] . '</b></td>
                             <td id="res_game">' . $res_game['name']. '</td>
                             <td>' . '0' . '</td>
                             <td id="res_date">' . $res ['dateH'] . '</td>
                           </tr>
                          </table><br>';
                          if(!count($verif_bet) > 0){
                            echo '<a class="bet_link" href="43623453452244534323443224223344é354523433355' . $res['id'] . '47153567443222345543' . $res['name']  . 'ETYRGVEzSD' . $res_first['name'] . 'ZREDVFGRZD' . $res_second['name'] . 'FFGHZFREG' . $res_game['name'] . 'UBHEZERFGEFDGRE' . $res['dateH'] .'.html">To BET</a>';
                          }
                          if(!count($verif_fav) > 0){
                            echo('<a id="add_fav" href="favourite_validate.php?id_match=' . $res['id'] . '">ADD FAVOURITE</a>');
                          }
                          if(!count($verif_share)){
                            echo ('<a id="share" href="to_share.php?id_match=' . $res['id'] . '">SHARE</a>');
                          }
                          echo'</div>';
                          echo '<br><br>';


            }
          }
        }

      ?>

  </main>
</body>
</html>
