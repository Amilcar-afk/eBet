<!DOCTYPE html>
<html>
    <head>
        <title>delete account</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="css/inscription.css">
    </head>
    <body>
        <?php
			  if(isset($_GET['messsage'])){
				  echo '<center><h3>' . htmlspecialchars($_GET['message']) . '</h3></center>';
			  }
        ?>
        <center><h3>delete your account</h3><center>
       <form method="POST" action=<?php echo '"delprocess.php?id=' . $_GET['iduser'] . '"';?>>
            <input class="inputcss" onkeyup="Input_pwd()" id="pwd" type="password" name="password" placeholder="PASSWORD">
       </form>
       <script src="js/connexion.js"></script>
    </body>
</html>