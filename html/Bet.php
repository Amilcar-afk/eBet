  <style type="text/css">
  .bet_link{
    background-color:#70798C;
    color:white;
    border-radius: 3px;
    padding:10px;
    padding-left: 20px;
    padding-right: 20px;
  }
  .bet_link:hover{
    color: black;
    text-decoration: none;
  }

  #add_fav{
    text-decoration: none;
    margin-left:5px ;
    border-radius: 3px;
    padding:10px;
    padding-left: 20px;
    padding-right: 20px;
    background-color: #f1c40f;
    color:white;
  }
  #add_fav:hover{
    text-decoration: none;
    color:black;
  }
  /*#scroll_div{
    overflow: auto;
    max-height:150px;
  }*/

</style>

<?php /*include('slide.php')*/; ?>


<?php
  require('ratingprocess.php');
  /*echo '<div id="scroll_div">';*/
    if(!isset($_GET['team']) || empty($_GET['team'])){

      $today = date('Y-m-d H:i:s');

      if(isset($_POST['filter']) && $_POST['filter'] == 'date'){

        $q = 'SELECT id, name, game, first, second, dateH FROM MATSH WHERE dateH > ? ORDER BY dateH ASC';
        $req = $bdd->prepare($q);
        $req->execute(array($today));
        $res = $req->fetchAll(PDO::FETCH_ASSOC);

      }else if(isset($_POST['filter']) && $_POST['filter'] == 'popular'){

        /*$q = 'SELECT id FROM MATSH WHERE dateH > ?';
        $req = $bdd->prepare($q);
        $req->execute(array($today));
        $res_tcheck = $req->fetchAll(PDO::FETCH_ASSOC);
*/
        $res_id = [];

          $q = 'SELECT id_match FROM BET WHERE date_h > ? GROUP BY id_match ORDER BY COUNT(id_match) DESC LIMIT 5';
          $req = $bdd->prepare($q);
          $req->execute([$today]);
          $res_id = $req->fetchAll(PDO::FETCH_ASSOC);

        $res = [];

        foreach ($res_id as $key => $value) {
          $q = 'SELECT id, name, game, first, second, dateH FROM MATSH WHERE dateH > ? AND id = ?';
          $req = $bdd->prepare($q);
          $req->execute(array($today, $res_id[$key]['id_match']));
          $res[$key] = $req->fetch(PDO::FETCH_ASSOC);
        }

      }else{
        $q = 'SELECT id, name, game, first, second, dateH FROM MATSH WHERE dateH > ?';
        $req = $bdd->prepare($q);
        $req->execute(array($today));
        $res = $req->fetchAll(PDO::FETCH_ASSOC);
      }

      if(count($res) > 0){
        foreach ($res as $key => $value) {
          //select for game
          $q = 'SELECT name FROM GAME WHERE id = ?';
          $req = $bdd->prepare($q);
          $req->execute(array($res[$key]['game']));
          $res_game = $req->fetch(PDO::FETCH_ASSOC);
          //

          //select for team first
          $q = 'SELECT name FROM TEAM WHERE id = ?';
          $req = $bdd->prepare($q);
          $req->execute(array($res[$key]['first']));
          $res_first = $req->fetch(PDO::FETCH_ASSOC);
          ///

          //select for team second
          $q = 'SELECT name FROM TEAM WHERE id = ?';
          $req = $bdd->prepare($q);
          $req->execute(array($res[$key]['second']));
          $res_second = $req->fetch(PDO::FETCH_ASSOC);
          ///

          //verif if user have already bet on this match
          $q = 'SELECT id_usr, id_match FROM BET WHERE id_match = ? AND id_usr = ?';
          $req = $bdd->prepare($q);
          $req->execute([$res[$key]['id'], $_SESSION['id']['id']]);
          $verif_bet = $req->fetchAll(PDO::FETCH_ASSOC);
          //

          //verif if the bet is not already in Favourite
          $req = $bdd->prepare('SELECT id_user FROM FAVOURITE WHERE id_match = ? AND id_user = ?');
          $req->execute(array($res[$key]['id'], $_SESSION['id']['id']));
          $verif_fav = $req->fetchAll();

          //verif if the bet is not already share
          $req = $bdd->prepare('SELECT id_user FROM SHARE_BET WHERE id_match = ? AND id_user = ?');
          $req->execute(array($res[$key]['id'], $_SESSION['id']['id']));
          $verif_share = $req->fetchAll();

          if(!count($verif_bet) > 0){
            $base1 = winner($res_first['name']);
            $base2 = winner($res_second['name']);
            $base1 = lose($base1,$res_first['name']);
            $base2 = lose($base2,$res_second['name']);
            $base1 = exper($base1,$res_first['name']);
            $base2 = exper($base2,$res_second['name']);
            $base1 = howmany($base1,$res_first['name'],$id);
            $base2 = howmany($base2,$res_second['name'],$res[$key]['id']);
            echo '
              <div>
                <hr>
                  <table>
                    <label><u>Competition:</u><h3 id="res_compet" class="res_compet">'. $res[$key]['name'] .'</h3></label>
                     <tr>
                       <th>First team</th>
                       <th>rating</th>
                       <th>Second team</th>
                       <th>rating</th>
                       <th>Game</th>
                       <th>Date</th>
                     </tr>
                      <tr>
                       <td><b id="res_first" class="first_team">'. $res_first['name'] . '</b></td>
                       <td>' . $base1 . '</td>
                       <td><b id="res_second" class="second_team">' . $res_second['name'] . '</b></td>
                       <td>' . $base2 . '</td>
                       <td id="res_game">' . $res_game['name']. '</td>
                       <td id="res_date">' . $res[$key] ['dateH'] . '</td>
                     </tr>
                    </table><br>
                    <a class="bet_link" href="43623453452244534323443224223344é354523433355' . $res[$key]['id'] . '471535' . $base1 . '67443222' . $base2 .' 345543 ' . $res[$key]['name'] . 'ETYRGVEzSD' . $res_first['name'] . 'ZREDVFGRZD' . $res_second['name'] . 'FFGHZFREG' . $res_game['name'] . 'UBHEZERFGEFDGRE' . $res[$key] ['dateH'] .'.html">To BET</a>';
                    if(!count($verif_fav) > 0){
                      echo('<a id="add_fav" href="favourite_validate.php?id_match=' . $res[$key]['id'] . '">ADD FAVOURITE</a>');
                    }
                    if(!count($verif_share) > 0){
                      echo('<a id="share" href="to_share.php?id_user=' . $_SESSION['id']['id'] . '&id_match=' . $res[$key]['id'] . '">SHARE</a>');
                    }
                    echo'</div>';
              }
        }
        /*echo '</div>';*/
    }else{
      echo "THERE IS NO BET !";
    }
  }else{

    $q = 'SELECT id FROM TEAM WHERE name = ?';
    $req = $bdd->prepare($q);
    $req->execute(array($_GET['team']));
    $name_match = $req->fetch(PDO::FETCH_ASSOC);

    $today = date('Y-m-d');
    $q = 'SELECT id, name, game, first, second, dateH FROM MATSH WHERE dateH > ? AND (first = ? || second = ?)';
    $req = $bdd->prepare($q);
    $req->execute(array($today, $name_match['id'], $name_match['id']));
    $res = $req->fetchAll(PDO::FETCH_ASSOC);

    /*echo '<div id="scroll_div">';*/

      if(count($res) > 0){
        foreach ($res as $key => $value) {

          //select for game
          $q = 'SELECT name FROM GAME WHERE id = ?';
          $req = $bdd->prepare($q);
          $req->execute(array($res[$key]['game']));
          $res_game = $req->fetch(PDO::FETCH_ASSOC);
          //

          //select for team first
          $q = 'SELECT name FROM TEAM WHERE id = ?';
          $req = $bdd->prepare($q);
          $req->execute(array($res[$key]['first']));
          $res_first = $req->fetch(PDO::FETCH_ASSOC);
          ///

          //select for team second
          $q = 'SELECT name FROM TEAM WHERE id = ?';
          $req = $bdd->prepare($q);
          $req->execute(array($res[$key]['second']));
          $res_second = $req->fetch(PDO::FETCH_ASSOC);
          ///

          $q = 'SELECT id_usr, id_match FROM BET WHERE id_match = ? AND id_usr = ?';
          $req = $bdd->prepare($q);
          $req->execute([$res[$key]['id'], $_SESSION['id']['id']]);
          $verif_bet = $req->fetchAll(PDO::FETCH_ASSOC);

          //verif if the bet is not already in Favourite
          $req = $bdd->prepare('SELECT id_user FROM FAVOURITE WHERE id_match = ? AND id_user = ?');
          $req->execute(array($res[$key]['id'], $_SESSION['id']['id']));
          $verif_fav = $req->fetch();

          if(!count($verif_bet) > 0){
            echo '
              <div>
                <hr>
                  <table>
                    <label><u>Competition:</u><h3 id="res_compet" class="res_compet">'. $res[$key]['name'] .'</h3></label>
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
                       <td id="res_date">' . $res[$key] ['dateH'] . '</td>
                     </tr>
                    </table><br>
                    <a class="bet_link" href="43623453452244534323443224223344é354523433355' . $res[$key]['id'] . '47153567443222345543' . $res[$key]['name']  . 'ETYRGVEzSD' . $res_first['name'] . 'ZREDVFGRZD' . $res_second['name'] . 'FFGHZFREG' . $res_game['name'] . 'UBHEZERFGEFDGRE' . $res[$key] ['dateH'] .'.html">To BET</a>';
                    if(!$verif_fav > 0){
                      echo('<a id="add_fav" href="favourite_validate.php?id_match=' . $res[$key]['id'] . '">ADD FAVOURITE</a>');
                    }
                    echo'</div>';
              }
          }
          /*echo '</div>';*/
        }
      }

?>
