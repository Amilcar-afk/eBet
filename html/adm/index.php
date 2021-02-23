<?php include('index/includes/header.php'); ?>
<?php include('index/includes/config.php'); ?>

    <?php
    $bdd = bdd();
    $resp = $bdd->prepare('SELECT id, mail, login, wallet, phoneNumber, banOrNot, ip FROM USR');
    $resp->execute([]);
    $count = 0;
    ?>
<hr>
    <main>
      <section id="panel">
        <form action="index/ban.php" method="post" id="banContainer">
          <h3>BAN</h3>
          <input class="form-control" type="text" name="banmail" value="" placeholder="EMAIL OF USR" id="banmail">
        </form>

        <form action="adding/addMoney.php" method="post" id="walletContainer">
          <h3>ADD €</h3>
          <input class="form-control" type="text" name="amount" value="" placeholder="AMOUNT" id="amount" required>
          <input class="form-control" type="text" name="mail" value="" placeholder="USR" id="usrForCash" required>
          <input class="btn btn-primary" style="margin-top: 3px" type="submit" name="" value="SEND">
        </form>

        <form action="index/export.php" id="exportContainer">
          <h3>EXPORT</h3>
          <a class="btn btn-primary" href="index/xml.php" download="client.xml">EXPORT ON HW</a>
          <input type="submit" id="export" class="btn btn-primary" value="EXPORT">
        </form>

        <form action="index/mail.php" method="post">
          <h3>SEND XML</h3>
          <input class="form-control" type="text" name="mail" value="" placeholder="MAIL">
          <input class="btn btn-primary" type="submit" name="" value="SEND">
        </form>
      </section>
<hr>
      <table class="table table-striped table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">MAIL</th>
          <th scope="col">LOGIN</th>
          <th scope="col">WALLET</th>
          <th scope="col">PHONE</th>
          <th scope="col">BAN0RN0T</th>
          <th scope="col">@IP</th>
        </tr>
        <!-- Récupération et affichage des users -->
        <?php
          while($data = $resp->fetch(PDO::FETCH_ASSOC)) {
        ?>
          <tr>
            <th scope="col"><?php echo $data['id'];?></th>
            <th scope="col"><?php echo $data['mail'];?></th>
            <th scope="col"><?php echo $data['login'];?></th>
            <th scope="col"><?php echo $data['wallet'];?></th>
            <th scope="col"><?php echo $data['phoneNumber'];?></th>
            <th scope="col"><?php if ($data['banOrNot'] == 1) { ?> <button class="btn btn-danger" type="button" name="button">BAN</button> <?php } //Affiche un boutton BAN si la valeur est à 1 ?> </th>
            <th scope="col"><?php echo $data['ip'];?></th>
          </tr>
        <?php
          $count++;
          }
        ?>
      </table>
    </main>

<?php include('index/includes/footer.php'); ?>
