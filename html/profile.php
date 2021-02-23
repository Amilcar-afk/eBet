<?php session_start(); ?>
<?php
      include('adm/includes/config.php');
      $bdd = bdd();
  if(isset($_SESSION['id']) && !empty($_SESSION['id'])){

    foreach ($_SESSION['id'] as $key => $value) {
      $id = $value;
    }
    $q = 'SELECT name, firstName, login, wallet, city, phoneNumber, img FROM USR WHERE id = ?';
    $req = $bdd->prepare($q);
    $req->execute(array($id));
    $res_data = $req->fetchAll(PDO::FETCH_ASSOC);
  }

?>
<!DOCTYPE html>
<html>
<head>
	<title>My Account</title>
	<meta charset="utf-8">
	<meta name="Profile" content="MyProfile">
	<link rel="stylesheet" type="text/css" href="css/style_profile.css">
    <link href="https://fonts.googleapis.com/css?family=Oxygen&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/master.css">
</head>
<body onload="starthegame(),insert_notif()">
	<header>

    <div id="div_header">
      <ul>
        <li><a href="index.php"><img src="imgs/logo.png" class="logo"></a></li>
        <li><a onclick="notif()"><img src="imgs/bell.png" class="notification"></a><section id="notif"></section></li>
        <li><a href="#search">
          <!-- <img src="imgs/search-loop.png" class="loop"> -->
        </a></li>
        <li><input type="text" name="search" onkeyup="search()" placeholder=" User, Teams..." id="search"></li>
    </div>
    <section id="result_search"></section>


	     <!-- <section class="section1">
	       <ul class="nav nav-tabs" id="menu-vertical">
	           <li><a href="#menu1" data-toggle="tab"><img id="boy" class="nav-item" class="nav-link" data-toggle="tab"src="imgs/boy.png"></a></li>
             <li id="menu"><a data-toggle="tab" href="#menu3">TO BET</a><br>
               <a href="#menu3" data-toggle="tab"><img data-toggle="tab" href="#menu3" src="imgs/more.png"></a>
             </li>
	           <li class="nav-item" id="menu"><hr><a  href="addmoney.php">ADD FUNDS</a><br>
		          <a data-toggle="tab" href="addmoney.php"><img src="imgs/panier.png"></a>
	           </li>
                <li class="nav-item" id="menu"><hr><a data-toggle="tab" href="#menu5">MY BETS</a><br>
                    <a  data-toggle="tab" href="#menu5"><img src="imgs/my-bets.png"></a>
                </li>
	           <li class="nav-item" id="menu"><hr><a href="agenda.php">AGENDA</a><br>
		          <a  data-toggle="tab" href="agenda.php"><img class="calendar" src="imgs/calendar.png"></a>
	           </li>
	           <li class="nav-item" id="menu"><hr><a data-toggle="tab" href="#menu7">FAVOURITE</a><br>
		          <a data-toggle="tab" href="#menu7"><img class="star" src="imgs/star.png"></a>
	           </li>
	           <li class="nav-item" id="menu"><hr><a data-toggle="tab" href="#">NEWS</a><br>
		          <a data-toggle="tab" href="#"><img class="timeline" src="imgs/timeline.png"></a>
	           </li>
	           <li class="nav-item" id="menu"><hr><a data-toggle="tab" href="#">REPLAY</a><br>
		          <a data-toggle="tab" href="#"><img class="replay" src="imgs/replay.png"></a>
	           </li>
            </ul>
        </section> -->
        <!-- <section>
        <img class="logo" src="imgs/logo.png">
      </section> -->
    </header>
    <section class="section1">
      <div id="scroll_div">
         <ul class="nav nav-tabs" id="menu-vertical"><br><br>
             <li id="li_boy"><a href="#menu1" data-toggle="tab"><img id="boy" class="nav-item" class="nav-link" data-toggle="tab"src="imgs/boy.png"></a></li>
             <li id="li_login"><strong><a data-toggle="tab" href="#menu1"><?php echo($res_data[0]['login']); ?></a></strong></li>
             <li id="menu"><a  href="#menu3" data-toggle="tab">TO BET</a><br>
               <a href="#menu3" data-toggle="tab"><img id="plus" data-toggle="tab" href="#menu3" src="imgs/plus.png"></a>
             </li>
             <li class="nav-item" id="menu"><hr><a  href="addmoney.php">ADD FUNDS</a><br>
              <a data-toggle="tab" href="addmoney.php"><img id="img_funds" href="addmoney.php" src="imgs/coin.png"></a>
             </li>
              <li class="nav-item" id="menu"><hr><a data-toggle="tab" href="#menu5">MY BETS</a><br>
                <a  data-toggle="tab" href="#menu5"><img id="my_bets" src="imgs/earnings.png"></a>
              </li>
             <li class="nav-item" id="menu"><hr><a href="agenda.php">AGENDA</a><br>
              <a  data-toggle="tab" href="agenda.php"><img class="calendar" src="imgs/calendar2.png"></a>
             </li>
             <li class="nav-item" id="menu"><hr><a data-toggle="tab" href="#menu7">FAVOURITE</a><br>
              <a data-toggle="tab" href="#menu7"><img class="star" src="imgs/star2.png"></a>
             </li>
             <li class="nav-item" id="menu"><hr><a data-toggle="tab" href="#menu8">RESULT BET</a><br>
              <a data-toggle="tab" href="#menu8"><img id="players" src="imgs/trophy.png"></a>
             </li>
             <li class="nav-item" id="menu"><hr><a data-toggle="tab" href="#menu9">FOLLOWERS</a><br>
              <a data-toggle="tab" href="#menu9"><img id="followers" src="imgs/followers.png"></a>
             </li>
              <li class="nav-item" id="menu"><hr><a data-toggle="tab" href="#menu10">MVP</a><br>
              <a data-toggle="tab" href="#menu10"><img id="mvp" src="imgs/mvp.png"></a>
             </li>
            </ul>
          </div>
        </section>
<main>
  <div class="tab-content">
    <div class="tab-pane container fade" id="menu1">
      <?php include('data_user.php'); ?>
    </div>

    <div class="tab-pane container fade" id="menu2">
	   <?php include('input_profile.php'); ?>
    </div>


    <div class="tab-pane container active" id="menu3">
      <form action="434523354634545342534545435345343454657654342322233445456323142345432352354363254.html" method="POST">
        <select name="filter" value="filter">
          <option value="all">All bets</option>
          <option value="popular">Popularity</option>
          <option value="date">Final date</option>
        </select>
        <input type="submit" name="button" value="Validate">
      </form>

      <?php
          include('Bet.php');
       ?>
    </div>

    <div class="tab-pane container fade" id="menu4">
      <?php include('agenda1.php'); ?>
    </div>

    <div class="tab-pane container fade" id="menu5">
      <h1>My bets</h1>
      <?php
        include('mybets.php');
      ?>
    </div>

    <div class="tab-pane container fade" id="menu9">
      <?php include('list_followers.php'); ?>
    </div>

    <div class="tab-pane container fade" id="menu7">
      <section id="fav_imgs">
        <img src="imgs/favourite.png" class="favourite_stars" id="favourite_stars">
        <h1 class="favourite_stars" id="h1_favourite">Favourite</h1>
        <img src="fav_imgs/favourite.png" class="favourite_stars" id="favourite_stars">
      </section>
      <?php
        include('favourite.php');
       ?>
    </div>

    <div class="tab-pane container fade" id="menu8">
      <?php include('result.php'); ?>
    </div>

    <div class="tab-pane container fade" id="menu10">
      <section id="mvp_bloc">
        <h1 id="mvp">MVP</h1><img src="imgs/podium.png" id="podium">
      </section>
      <?php
        include('displaymvp.php');
      ?>
    </div>

  </div>

</main>

      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
      <script type="text/javascript" src="js/favourite.js"></script>
      <script type="text/javascript" src="js/search_bar.js"></script>
      <script type="text/javascript" src="index.js"></script>
      <script type="text/javascript" src="js/notif.js"></script>
</body>
</html>


