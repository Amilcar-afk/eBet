<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/addmoney.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <center><h1>Change your password</h1></center>
        </header>
        <main>
        <?php
        if(isset($_GET['error']) && !empty($_GET['error']) && $_GET['error'] == 'yes'){
        echo "<script>alert('mot de passe different entre les deux entrées !');</script>";
        }
        ?>
        <?php
        $mail = $_GET['mail'];
        ?>
        <form method="POST" onsubmit="return Inputs()" action=<?php echo '"verifpwd.php?mail=' . $mail . '"';?>>
            <div class="form-group">
                <label for="pwd">new password</label>
                <input type="password" onkeyup="Input_pwd()" id="pwd" class="form-control" name="pwd" placeholder="Enter new password">
            </div>
            <div class="form-group">
                <label for="pwd1">confirm your new password</label>
                <input type="password" onkeyup="Input_pwd()" id="pwd" class="form-control" name="pwd1" placeholder="confirm your new password">
            </div>
            <button>Valider</button>
        </form>
        </main>
        <script src="js/connexion.js"></script>
    </body>
</html>