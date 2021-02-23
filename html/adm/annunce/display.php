<?php
  include('includes/config.php');
  $bdd = bdd();

  $reqN = 'SELECT first, second, MATSH.id, MATSH.name AS mn, GAME.name AS gn FROM MATSH LEFT JOIN GAME ON GAME.id = MATSH.game WHERE dateH < NOW() AND valid = 0';
  $request = $bdd->query($reqN);

  $reqF = 'SELECT first, TEAM.name AS fn FROM MATSH LEFT JOIN TEAM ON TEAM.id = MATSH.first WHERE dateH < NOW() AND valid = 0';
  $requestF = $bdd->query($reqF);

  $reqS = 'SELECT second, TEAM.name AS sn FROM MATSH LEFT JOIN TEAM ON TEAM.id = MATSH.second WHERE dateH < NOW() AND valid = 0';
  $requestS = $bdd->query($reqS);

  echo "<table class='table table-striped table-dark'>
    <th>1D</th>
    <th>NAM3</th>
    <th>G@ME</th>
    <th>TEAMS</th>";

    while(($data = $request->fetch(PDO::FETCH_ASSOC)) && ($dataF = $requestF->fetch(PDO::FETCH_ASSOC)) && ($dataS = $requestS->fetch(PDO::FETCH_ASSOC))) {
      echo "<tr>";
       echo "<th>" . $data['id'] . "</th>";
       echo "<th>" . $data['mn'] . "</th>";
       echo "<th>" . $data['gn'] . "</th>";
       echo "<th>";
              echo"<select class='form-control' name='winner' id=" . $data['id'] . ">";
                echo "<option value=" . $data['first'] . ">" . $dataF['fn'] . "</option>";
                echo "<option value=" . $data['second'] . ">" . $dataS['sn'] . "</option>";
              echo "</select>";
              echo "<button class='btn btn-primary' type='button' name='button' onclick='validWinner(" . $data['id']. ")'>W1N</button>
             </th>";
      echo "</tr>";
    }
    echo "</table>";
?>
