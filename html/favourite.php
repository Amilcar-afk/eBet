<style type="text/css">
  #delete_fav{
    text-decoration: none;
    margin-left:5px ;
    border-radius: 3px;
    padding:10px;
    padding-left: 20px;
    padding-right: 20px;
    color:white;
    background-color:#c0392b;
  }
  #delete_fav:hover{
    text-decoration: none;
    color:black;
    border: solid 1.5px;
  }
</style>

<?php
  $req = $bdd->prepare('SELECT id_match FROM FAVOURITE WHERE id_user = ?');
  $req->execute([$_SESSION['id']['id']]);
  $res = $req->fetchAll(PDO::FETCH_ASSOC);

    /*echo '<div id="scroll_div">';*/

    if(count($res) > 0){

      /*echo '<div id="scroll_div">';*/

      foreach ($res as $key => $value) {
        $q = 'SELECT id, name, game, first, second, dateH FROM MATSH WHERE id = ?';
        $req = $bdd->prepare($q);
        $req->execute([$res[$key]['id_match']]);
        $res_match = $req->fetch(PDO::FETCH_ASSOC);

        //select for game
          $q = 'SELECT name FROM GAME WHERE id = ?';
          $req = $bdd->prepare($q);
          $req->execute(array($res_match['game']));
          $res_game = $req->fetch(PDO::FETCH_ASSOC);
          //

          //select for team first
          $q = 'SELECT name FROM TEAM WHERE id = ?';
          $req = $bdd->prepare($q);
          $req->execute(array($res_match['first']));
          $res_first = $req->fetch(PDO::FETCH_ASSOC);
          ///

          //select for team second
          $q = 'SELECT name FROM TEAM WHERE id = ?';
          $req = $bdd->prepare($q);
          $req->execute(array($res_match['second']));
          $res_second = $req->fetch(PDO::FETCH_ASSOC);
          ///

          //verif if user have already bet on this match
          $q = 'SELECT id_usr, id_match FROM BET WHERE id_match = ? AND id_usr = ?';
          $req = $bdd->prepare($q);
          $req->execute([$res_match['id'], $_SESSION['id']['id']]);
          $verif_bet = $req->fetchAll(PDO::FETCH_ASSOC);
          //

          //verif if the bet is not already share
          $req = $bdd->prepare('SELECT id_user FROM SHARE_BET WHERE id_match = ? AND id_user = ?');
          $req->execute(array($res_match['id'], $_SESSION['id']['id']));
          $verif_share = $req->fetchAll();

          if(!count($verif_bet) > 0){

            echo '
              <div>
                <hr>
                  <table>
                    <label><u>Competition:</u><h3 id="res_compet" class="res_compet">'. $res_match['name'] .'</h3></label>
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
                       <td id="res_date">' . $res_match ['dateH'] . '</td>
                     </tr>
                    </table><br>
                    <a class="bet_link" href="43623453452244534323443224223344é354523433355' . $res_match['id'] . '47153567443222345543' . $res_match['name']  . 'ETYRGVEzSD' . $res_first['name'] . 'ZREDVFGRZD' . $res_second['name'] . 'FFGHZFREG' . $res_game['name'] . 'UBHEZERFGEFDGRE' . $res_match['dateH'] .'.html">To BET</a>
                    <a id="delete_fav" href="delete_fav.php?id_user=' . $_SESSION['id']['id'] . '&id_match=' . $res_match['id'] . '">DELETE FROM FAVOURITE</a>';
                    if(!count($verif_share) > 0){
                      echo('<a id="share" href="to_share.php?id_user=' . $_SESSION['id']['id'] . '&id_match=' . $res_match['id'] . '">SHARE</a>');
                    }

              echo'</div>';
          }
      }
    }else{
      echo('<h1>no favored bet</h1>');
    }
?>
