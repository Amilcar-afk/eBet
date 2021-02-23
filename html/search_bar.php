<style type="text/css">
  li:hover{
    background-color:#F5F1FD;
  }
  a{
    text-decoration: none;
    color:black;
  }
  a:hover{
    text-decoration: none;
    color:black;
  }

</style>

<?php
  session_start();
    include('adm/includes/config.php');
    $bdd = bdd();
?>
<?php
  if($_POST['input'] == 'loto'){
    echo('<a href="loto/index.php">' . $_POST['input'] . '</a>' );
    exit;
  }

  $req = $bdd->prepare('SELECT name FROM TEAM WHERE name LIKE "%" ? "%"');
  $req->execute([$_POST['input']]);
  $res = $req->fetchAll(PDO::FETCH_ASSOC);

  $req = $bdd->prepare('SELECT login, id FROM USR WHERE login LIKE "%" ? "%" AND private = 0 AND id <> ?');
  $req->execute([$_POST['input'], $_SESSION['id']['id']]);
  $res_name = $req->fetchAll(PDO::FETCH_ASSOC);

  if (count($res_name) > 0 ){
    echo('<strong>Users</strong>');
    echo '<ul>';
    foreach ($res_name as $key => $value) {
      echo('<li><a href="43452335463454534' . $res_name[$key]['id'] . '2534545435345343454657654342322233445456323142345432352354363254' .'.html">' . $res_name[$key]['login'] . '</a></li>' );
    }
    echo '</ul>';
  }

  if (count($res) > 0 ) {
    echo('<strong>Teams</strong>');
    echo '<ul>';
    foreach ($res as $key => $value) {
      echo('<li><a href="434523354634545342534545435345343454657654342322233445456323142345432352354363254' . $res[$key]['name'] . '.html">' . $res[$key]['name'] . '</a></li>' );
    }
    echo '</ul>';
  }

  if(!count($res) > 0 && !count($res_name) > 0 ){
    echo('<i>No result</i>');
  }
?>
