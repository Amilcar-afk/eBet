<?php
  session_start();
  if(isset($_SESSION['id']['id']) && !empty($_SESSION['id']['id'])){
    header('location:434523354634545342534545435345343454657654342322233445456323142345432352354363254.html');
    exit;
  }

	if(isset($_GET['error']) && !empty($_GET['error']) && $_GET['error'] == 'yes'){
		echo "<script>alert('Error on email or password !');</script>";
	}
	if(isset($_GET['error1']) && !empty($_GET['error1']) && $_GET['error1'] == 'yes'){
		echo "<script>alert('confirm your mail address !');</script>";
	}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<title>Sign-in</title>
	<meta charset="utf-8">
	<meta name="Connexion" content="eBet_connnexion">
	<link rel="stylesheet" type="text/css" href="css/style_connexion.css">
	<link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet">
</head>
<body>

	<header >
      <a href="index.php">
        <img class="logo" src="imgs/logo.png" href="Accueil.php">
      </a>
      <nav>
        <ul class="ul_header">
          <li class="li1"><a href="inscription.php">Sign in</a></li>
        </ul>
      </nav>
  </header>

	<main>
		<div class="bloc">
			<img class = "cup" src="imgs/cup.jpg">
		</div>
		<div class="bloc2">
			<form action="verif_connexion.php" onsubmit="return Inputs()" method="post">
			<ul class="ul_main">
				<br>
				<h2>Please identify yourself</h2><br><br>
				<li><input  onkeyup="Input_email()" name="mail" type="email" id="email" placeholder="your email*"></li><br>
				<li><input onkeyup="Input_pwd()"  name="password" type="password" id="pwd" placeholder="your password*"></li><br>
				<il><input class="button" type="submit" value="validate"></il><br><br>
				<li><a href="lost_pwd.php" class="reset_pwd">Forgotten password ? Reset</a></li>
			</ul>
		</form>
		</div>
	</main>

	<footer>
    <p>&copy; 2019 eBet-esport.space<p>
</footer>

<script type="text/javascript" src="js/connexion.js" charset="utf-8"></script>
</body>
</html>
