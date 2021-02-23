<?php
require('adm/includes/config.php');
$bdd=bdd();
$playerC = $bdd->query('SELECT id, nom_en_gb FROM COUNTRY');
$q = 'SELECT id_captcha, linkfolder, name FROM captcha';
$req = $bdd -> query($q);
$results = $req->fetchAll(PDO::FETCH_ASSOC);
$name = [];
for($i = 0; $i < count($results); $i++){
    $name[$i] = $results[$i]['name'];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>inscription</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/inscription.css">
        <link rel="stylesheet" href="captcha/captcha.css">
        <link rel="shortcut icon" href="imgs/ebet.png">
    </head>
    <body>
        <header>
          <a href="../index.php">
            <img id="ebetlogo" src="imgs/ebet.png">
          </a>
          <ul id="ulcss">
            <li class="licss">
              <a class="acss" href="connexion.php">login</a>
            </li>
          </ul>
        </header>

        <main>
        <?php
			  if(isset($_GET['msg'])){
				  echo '<center><h3>' . htmlspecialchars($_GET['msg']) . '</h3></center>';
			  }
        ?>
        <?php
        $i = mt_rand(0,2);
        $lasti = $i;
        while($i == $lasti){
            $i = mt_rand(0,2);
        }
        ?>
            <h1>inscription</h1>
              <form method="POST" action="signup.php" onsubmit="return Inputs()" enctype="multipart/form-data">
                <input class="inputcss" type="text" name="lastname" placeholder="LAST NAME" required>
                <input class="inputcss" type="text" name="firstname" placeholder="FIRST NAME" required>
                <input class="inputcss" type="text" name="login" placeholder="LOGIN" required>
                <input class="inputcss" type="mail" onkeyup="Input_email()" id="email" name="mail" placeholder="MAIL" required>
                <input class="inputcss" type="text"  id="mobile" name="mobile" placeholder="MOBILE PHONE" required>
                <label>Private account<input type="radio" name="private" value="private" required></label>
                <label>Public account<input type="radio" name="private" value="public" required></label>
                <select class="form-control" name="country">
                  <?php while($data = $playerC->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $data['id']; ?>"><?php echo $data['nom_en_gb']; ?></option>
                  <?php } ?>
                </select>
                <input class="inputcss" onkeyup="Input_pwd()" id="pwd" type="password" name="password" placeholder="PASSWORD" required>
                <input class="inputcss" onkeyup="Input_pwd()" id="pwd" type="password" name="cpassword" placeholder="CONFIRM PASSWORD" required>
                <label>Profile picture:</label><input type="file" name="image" value="photo de profil" required>
                <div id="divcss">
                  <h1>select the <?php echo $name[$i];?><h1>
                  <?php
                      for($j = 1; $j < 10; $j++){
                  ?>
                  <input type="checkbox" name="imag<?php echo $j;?>" id="img<?php echo $j;?>" />
                  <label for="img<?php echo $i;?>"><img src="captcha/captchaimg/<?php echo $name[$i]?>/<?php echo $j;?>.jpg" /></label>
                  <?php } ?>
                  <input type="button" onclick='window.location.reload(false)' value="Rafraichir"/><br>
                  </div>
                  <input id="button" type="submit" name="submit" value="CREATE ACCOUNT">
              </form>
        </main>
	      <script src="js/connexion.js"></script>
    </body>
</html>
