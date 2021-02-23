<?php
   $q = 'SELECT id, name, game, first, second, dateH FROM MATSH WHERE id = ?';

        $req = $bdd->prepare($q);
        $req->execute([$check[$key]['id_match']]);
        $res_match = $req->fetchAll(PDO::FETCH_ASSOC);

        //select for game
        $q = 'SELECT name FROM GAME WHERE id = ?';
        $req = $bdd->prepare($q);
        $req->execute(array($res_match[0]['game']));
        $res_game = $req->fetch(PDO::FETCH_ASSOC);
        //

        //select for team first
        $q = 'SELECT name FROM TEAM WHERE id = ?';
        $req = $bdd->prepare($q);
        $req->execute(array($res_match[0]['first']));
        $res_first = $req->fetch(PDO::FETCH_ASSOC);
        ///

        //select for team second
        $q = 'SELECT name FROM TEAM WHERE id = ?';
        $req = $bdd->prepare($q);
        $req->execute(array($res_match[0]['second']));
        $res_second = $req->fetch(PDO::FETCH_ASSOC);
        ///

        //select for amount and team of bet
        $q = 'SELECT team, amount, result FROM BET WHERE id_match = ? AND id_usr = ?';
        $req = $bdd->prepare($q);
        $req->execute([$res_match[0]['id'], $_SESSION['id']['id']]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        ///

        $req = $bdd->prepare('SELECT name FROM TEAM WHERE id = ?');
        $req->execute([$result['team']]);
        $res_choice = $req->fetch(PDO::FETCH_ASSOC);

        $req = $bdd->prepare('SELECT name FROM TEAM WHERE id = ?');
        $req->execute([$result['result']]);
        $res_winner = $req->fetch(PDO::FETCH_ASSOC);

        $q = 'SELECT id_match, id_usr,rating FROM BET WHERE id_match = ? AND id_usr = ?';
        $req = $bdd->prepare($q);
        $req->execute([$check[$key]['id_match'], $_SESSION['id']['id']]);
        $res_bet = $req->fetchAll(PDO::FETCH_ASSOC);

        $win_amount = $result['amount'] * $res_bet[0]['rating'];



        echo '
          <div>
              <table>
                <label><u>Competition:</u><h3>'. $res_match[0]['name'] .'</h3></label>
                 <tr>
                   <th>First team</th>
                   <th>Second team</th>
                   <th>Game</th>
                   <th>rating</th>
                   <th>Date</th>
                 </tr>
                  <tr>
                   <td><b class="first_team">'. $res_first['name'] . '</b></td>
                   <td><b class="second_team">' . $res_second['name'] . '</b></td>
                   <td>' . $res_game['name']. '</td>
                   <td>' . $res_bet[0]['rating'] . '</td>
                   <td>' . $res_match[0] ['dateH'] . '</td>
                 </tr>
                </table><br>

                <ul class="ul_mybets">
                  <li>You bet on : <b class="">' . $res_choice['name'] . '</b></li>
                  <li>Amount wagered : <b id="coin">' . $result['amount'] . ' coin(s)</b></li>
                  <li>Amount to be won/lose : <b id="coin">' . $win_amount . ' coin(s)</b></li>
                  <li>winner : <b>' . $res_winner['name'] . '</b></li>
                </ul>
                <br><hr><br>
          </div>';
?>
