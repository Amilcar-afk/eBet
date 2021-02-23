<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8">
  <meta name="eBet" content="Home Page">
  <link rel="stylesheet" href="css/index.css">
  <link rel="shortcut icon" href="imgs/ebet.png">
  <link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet">
  <title>Home</title>
</head>
<body>
  <header>
    <a href="">
      <img id="logo" src="imgs/ebet.png">
    </a>
    <div class="headerContainer">
      <ul class="ulHeader">
        <?php
          if(!isset($_SESSION['id']['id']) || empty($_SESSION['id']['id'])){
            echo'<li class="liHeader"><a href="inscription.php">Sign Up</a></li>';
            echo '<li class="liHeader"><a href="connexion.php">Login</a></li>';
          }else{
            echo '<li class="liHeader"><a href="434523354634545342534545435345343454657654342322233445456323142345432352354363254.html
            ">profile</a></li>';
          }
        ?>
      </ul>
    </div>
  </header>
  <main>
    <video playsinline autoplay muted loop controls id="myVideo" src="./videos/ebet-home-video.webm" type="webm"></video>
  </main>
  <footer>
    <p>&copy; 2019 eBet-esport.space<p>
  </footer>
</body>
</html>
