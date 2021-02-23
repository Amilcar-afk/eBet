<?php 
require('adm/includes/config.php');
$bdd=bdd();
$playerC = $bdd->query('SELECT id, nom_en_gb FROM COUNTRY');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>modify profil</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/inscription.css">
    </head>
    <body>
        <?php
			  if(isset($_GET['msg'])){
				  echo '<center><h3>' . htmlspecialchars($_GET['msg']) . '</h3></center>';
			  }
        ?>
        <?php
        $iduser = $_GET['iduser'];
        ?>
        <center><h3>modify profil</h3><center>
        <form method="POST" action=<?php echo '"updateprocess.php?id=' . $iduser . '"';?>  enctype="multipart/form-data">
            <input class="inputcss" type="text" name="lastname" placeholder="LAST NAME">
            <input class="inputcss" type="text" name="firstname" placeholder="FIRST NAME">
            <input class="inputcss" type="text" name="login" placeholder="LOGIN">
            <input class="inputcss" type="mail" onkeyup="Input_email()" id="email" name="mail" placeholder="MAIL">
            <input class="inputcss" type="text"  id="mobile" name="mobile" placeholder="MOBILE PHONE">
            <label>Private account<input type="radio" name="private" value="private"></label>
            <label>Public account<input type="radio" name="private" value="public"></label>
            <select class="form-control" name="country">
                <?php while($data = $playerC->fetch(PDO::FETCH_ASSOC)) { ?>
                    <option value="<?php echo $data['id']; ?>"><?php echo $data['nom_en_gb']; ?></option>
                <?php } ?>
            </select>
            <input class="inputcss" onkeyup="Input_pwd()" id="pwd" type="password" name="password" placeholder="PASSWORD">
            <input class="inputcss" onkeyup="Input_pwd()" id="pwd" type="password" name="cpassword" placeholder="CONFIRM PASSWORD">
            <label>Profile picture:</label><input type="file" name="image" value="photo de profil">
            <input id="button" type="submit" name="submit" value="modify your data">
        </form>
        <script src="js/connexion.js"></script>
    </body>
</html>