<?php
  $req = $bdd->prepare('SELECT follower FROM FOLLOWER WHERE id_usr = ?');
  $req->execute([$_SESSION['id']['id']]);
  $id_follower = $req->fetchAll(PDO::FETCH_ASSOC);


  echo('<h1 id="my_fol">your followers</h1><br><br>');

  echo '<ul id="ul_follower">';
  foreach($id_follower as $key => $value){
    $req = $bdd->prepare('SELECT login, id, img FROM USR WHERE id = ?');
    $req->execute([$id_follower[$key]['follower']]);
    $login = $req->fetch(PDO::FETCH_ASSOC);

    /*echo('<li id="img_li"><img id="follower_img" src="' . 'signup/' . $login['img'] . '"></li>');*/
    echo('<li id="li_follower"><img id="follower_img" src="' . 'signup/' . $login['img'] . '"><a id="link_list" href="43452335463454534' . $login['id'] . '2534545435345343454657654342322233445456323142345432352354363254.html">');
    echo($login['login']);
    echo('</a><br><br><a id="delete_follower" href="delete_follower.php?id=' . $login['id'] . '">DELETE</a></li><br>');
  }
  echo "</ul>";
?>
<style type="text/css">
  #link_list{
    color: #17c0eb;
    font-size: 150%;
  }
  #link_list:hover{
    text-decoration: none;
    color:black;
  }
  #delete_follower{
    text-decoration: none;
    background-color:#c0392b;
    color:white;
    height:3%;
    padding:3px;
  }
  #delete_follower:hover{
    text-decoration: none;
    border:solid 2px;
    color: black;
  }
  #my_fol{
    color: #30336b;
  }
  #follower_img{
    width : 4%;
    margin:0px;
    margin-right: 0px;
    width:10%;
  }

  #ul_follower {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    width:35%;
  }
  #li_follower{
    display: flex;
    justify-content: space-around;
    flex-wrap: nowrap;
  }

</style>
