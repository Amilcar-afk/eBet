<?php session_start();?>
<?php
  include('adm/includes/config.php');
  $bdd = bdd();
?>
<!DOCTYPE html>
<html>
<head>
  <title>ToBet</title>
  <meta charset="utf-8">
  <meta name="ToBet" content="Bet">
  <link rel="stylesheet" type="text/css" href="css/style_to_bet.css">
</head>
<body>

  <header>
    <img src="imgs/logo.png" class="logo">
  </header>

  <main>
    <?php

    echo($_GET['cote1'] .',' . $_GET['cote2']);

      //select pour recup le portefeuille
      $q = 'SELECT wallet FROM USR WHERE id = ?';
      $req = $bdd->prepare($q);
      $req->execute(array($_SESSION['id']['id']));
      $res_wallet = $req->fetchAll(PDO::FETCH_ASSOC);
      //
     ?>
    <ul><br>
      <li><?php echo('<b class="team_first">' . $_GET['first'] . '</b>'); ?><b>|</b><?php echo('<b class="team_second">' . $_GET['second'] . '</b>'); ?></li>
      <li><h2><?php echo($_GET['game']); ?></h2></li>
      <li><b>Final date: <?php echo($_GET['date']); ?></b></li><br>
    </ul><br><br>


    <?php echo('<form action="verif_bet.php?id_bet=' . $_GET['id_bet'] . '&cote1=' . $_GET['cote1'] . '&cote2=' . $_GET['cote2'] . '"' . 'method="post">'); ?> <br>

      <?php
      if(isset($_GET['msg']) && !empty($_GET['msg'])){
        echo('<p><i>' . $_GET['msg'] . '</i></p>');
      }
      ?>

      <label>Your wallet: <b><?php echo($res_wallet[0]['wallet']); ?></b></label><br><br>
      <label>Amount: </label><input type="text" name="amount"id="amount" required><br><br>
      <input type="radio" name="check" <?php echo('value="' . $_GET['first'] . '"'); ?> id="team1" required><?php echo('<b class="team_first">' . $_GET['first'] . '</b>'); ?>
      <input type="radio" name="check" <?php echo('value="' . $_GET['second'] . '"'); ?> id="team2" required><?php echo('<b class="team_second">' . $_GET['second'] . '</b>'); ?><br><br>
      <input type="submit" name="button" value="Validate" id="button" required=""><br><br>
    </form>
  </main>

  <footer><p>&copy; 2019 eBet-esport.space<p></footer>
</body>
</html>
