
<link rel="stylesheet" type="text/css" href="css/style_data.css">
<?php
        foreach ($res_data[0] as $key => $value) {
          if($key === 'name'){
            $name = $value;
          }
          if ($key === 'firstName') {
            $firstName = $value;
          }
          if($key === 'login'){
            $login = $value;
          }
          if($key === 'wallet') {
            $wallet = $value;
          }
          if($key === 'city'){
            $country = $value;
          }
          if($key === 'phoneNumber'){
            $phoneNumber = $value;
          }
          if($key === 'img'){
            $img = $value;
          }
        }

        $q = 'SELECT nom_en_gb FROM COUNTRY WHERE id = ?';
        $req = $bdd->prepare($q);
        $req->execute([$country]);
        $res_country = $req->fetchAll(PDO::FETCH_ASSOC);

        $country = $res_country[0]['nom_en_gb'];
     ?>
     <br><br>


        <?php
            echo '<div id="all_block">';
              echo '<div id="div_data">';
                echo('<img id="pdp" src="signup/' . $img . '">');
                echo '<ul id="all_data">';
                  echo('<li><label><b>Name: </b></label>' . ' ' . $name  . '</li>');
                  echo('<li><label><b>Firstname: </b></label>' . ' ' . $firstName  . '</li>');
                  echo('<li><label><b>Login: </b></label><strong id="strong_log">' . ' ' . $login . '</strong></li>');
                  echo('<li><label><b>Wallet: </b></label><b id="wallet">' . ' ' . $wallet  . 'coin(s)' . '</b></li>');
                  echo('<li><label><b>Country: </b></label>' . ' ' . $country  . '</li>');
                  echo('<li><label><b>Phone number: </b></label>' . ' ' . $phoneNumber . '</li>');
                echo '</ul>';
              echo '</div>';

              echo '<div>';
                echo('<img src="imgs/handheld-console.png" id="controller">');
              echo '</div>';
              /*echo '<div id="chat"></div>';*/
            echo '</div>';

        ?>
        <!-- <div id="div_chat">
          <input type="text" name="input_chat" id="input_chat">
          <button name="button" onclick="chat()">Valider</button>
        </div> -->

      <ul class="nav nav-tabs">
        <li><a href="deconnexion.php" id="signout">Signout</a></li><p> </p>
        <?php $iduser = $_SESSION['id']['id'];?>
        <?php echo '<a href="modifydata.php?iduser=' . $iduser . '">modify your data</a>'; ?><p> </p>
        <?php echo '<a href="delaccount.php?iduser=' . $iduser . '">delete your account</a>'; ?> 
      </ul><br>
      <?php
        if(!isset($_GET['team']) || empty($_GET['team'])){

          $req = $bdd->prepare('SELECT id_match FROM SHARE_BET WHERE id_user = ?');
          $req->execute([$_SESSION['id']['id']]);
          $match = $req->fetchAll(PDO::FETCH_ASSOC);

          if(count($match) > 0){

            foreach ($match as $key => $value) {

              $today = date('Y-m-d');
              $req = $bdd->prepare('SELECT id, name, game, first, second, dateH FROM MATSH WHERE dateH > ? AND id = ?');
              $req->execute([$today, $match[$key]['id_match']]);
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

                echo '
                  <div>
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
                           <td id="res_date">' . $res['dateH'] . '</td>
                         </tr>
                        </table><br>';
                        if(!count($verif_bet) > 0){
                          echo '<a class="bet_link" href="43623453452244534323443224223344é354523433355' . $res['id'] . '47153567443222345543' . $res['name']  . 'ETYRGVEzSD' . $res_first['name'] . 'ZREDVFGRZD' . $res_second['name'] . 'FFGHZFREG' . $res_game['name'] . 'UBHEZERFGEFDGRE' . $res['dateH'] .'.html">To BET</a>';
                        }
                        if(!count($verif_fav) > 0){
                          echo('<a id="add_fav" href="favourite_validate.php?id_match=' . $res['id'] . '">ADD FAVOURITE</a>');
                        }
                        echo ('<a id="delete_share" href="delete_share.php?id_match=' . $res['id'] . '">DELETE SHARES</a>');
                        echo'</div><br><br>';
           }
        }
      }else{

          $req = $bdd->prepare('SELECT id_match FROM SHARE_BET WHERE id_user = ? ');
          $req->execute([$_SESSION['id']['id']]);
          $match = $req->fetchAll(PDO::FETCH_ASSOC);

          $q = 'SELECT id FROM TEAM WHERE name = ?';
          $req = $bdd->prepare($q);
          $req->execute(array($_GET['team']));
          $name_match = $req->fetch(PDO::FETCH_ASSOC);

          $today = date('Y-m-d');
    /*echo '<div id="scroll_div">';*/

      if(count($match) > 0){
        foreach ($match as $key => $value) {

          $q = 'SELECT id, name, game, first, second, dateH FROM MATSH WHERE dateH > ? AND id = ? AND (first = ? || second = ?)';
          $req = $bdd->prepare($q);
          $req->execute(array($today, $match[$key]['id_match'], $name_match['id'], $name_match['id']));
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

          $q = 'SELECT id_usr, id_match FROM BET WHERE id_match = ? AND id_usr = ?';
          $req = $bdd->prepare($q);
          $req->execute([$res['id'], $_SESSION['id']['id']]);
          $verif_bet = $req->fetchAll(PDO::FETCH_ASSOC);

          //verif if the bet is not already in Favourite
          $req = $bdd->prepare('SELECT id_user FROM FAVOURITE WHERE id_match = ? AND id_user = ?');
          $req->execute(array($res['id'], $_SESSION['id']['id']));
          $verif_fav = $req->fetch();

          if(!count($verif_bet) > 0 && $res > 0){
            echo '
              <div>
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
                    </table><br>
                    <a class="bet_link" href="43623453452244534323443224223344é354523433355' . $res['id'] . '47153567443222345543' . $res['name']  . 'ETYRGVEzSD' . $res_first['name'] . 'ZREDVFGRZD' . $res_second['name'] . 'FFGHZFREG' . $res_game['name'] . 'UBHEZERFGEFDGRE' . $res['dateH'] .'.html">To BET</a>';
                    if(!$verif_fav > 0){
                      echo('<a id="add_fav" href="favourite_validate.php?id_match=' . $res['id'] . '">ADD FAVOURITE</a>');
                    }
                    echo ('<a id="delete_share" href="delete_share.php?id_match=' . $res['id'] . '">DELETE SHARES</a>');
                    echo'</div><br><br>';
              }
          }
          /*echo '</div>';*/
        }
      }

?>
