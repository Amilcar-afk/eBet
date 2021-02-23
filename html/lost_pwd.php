<!DOCTYPE html>
<html>
<head>
  <title>Lost_pwd</title>
  <meta charset="utf-8">
  <meta name="lost_pwd" content="recovery_pwd">
  <link rel="stylesheet" type="text/css" href="css/style_lost_pwd.css">
  <style type="text/css">
    .div_main{
      margin-left:400px;
      background-color: #70798C;
      height: 300px;
      width:790px;
    }
    .form_mail{
      text-align: center;
      padding-right: 40px;
    }
    .list > li{
      list-style: none;
      display: inline-block;
    }
    h1{
      text-align: center;
      color:white;
    }

  </style>
</head>
<body>

  <header >
      <a href="Accueil.php">
        <img class="logo" src="imgs/logo.png" href="Accueil.php">
      </a>
      <nav>
        <ul class="ul_header">
          <li class="li1"><a href="inscription.php">Inscription</a></li>
          <li class="li1"><a href="connexion.php">Connexion</a></li>
        </ul>
      </nav>
  </header>


  <main>
    <div class="div_main">
      <h1>Recovery the password</h1><br>
      <form class="form_mail" action="verif_lost_pwd.php" method="POST">
        <ul class="list">
          <li><input type="mail" name="mail" placeholder="Enter you're mail*"></li>
          <li><input type="submit" name="submit" value="Validate"></li>
        </ul>
      </form>
    </div>
  </main>

  <footer>
    <p>&copy; 2019 eBet-esport.space<p>
</footer>

</body>
</html>
