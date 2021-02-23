<?php
session_start();
require('adm/includes/config.php');
$bdd=bdd();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/addmoney.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
    <header>
        <h1>choice,buy and bet !</h1>
    </header>
    <main>
        <div class="container" id="container">
            <div class="card" id="card" style="width: 18rem;">
                <img class="card-img-top" src="moneyimages/money.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Starter Pack ~ 10€</h5>
                        <p class="card-text">An excellent choice of pack for small purses and for a start in the world of betting!</p>
                        <button class="btn btn-primary" onclick="addmoney()">Buy</button>
                        <div class="card-body" id="buymoney"></div>
                    </div>
            </div>
            <div class="card" id="card" style="width: 18rem;">
                <img class="card-img-top" src="moneyimages/money.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Medium pack ~ 20€</h5>
                        <p class="card-text">A great choice for getting started!</p>
                        <button class="btn btn-primary" onclick="addmoney1()">Buy</button>
                        <div class="card-body" id="buymoney1"></div>
                    </div>
            </div>
            <div class="card" id="card" style="width: 18rem;">
                <img class="card-img-top" src="moneyimages/money.jpg" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Expert pack ~ 50€</h5>
                        <p class="card-text">An excellent choice of pack to bet on several matches and prove what you are worth!</p>
                        <button class="btn btn-primary" onclick="addmoney2()">Buy</button>
                        <div class="card-body" id="buymoney2"></div>
                    </div>
            </div>
        </div>
    </main>
    <script src="add.js"></script>
    </body>
</html>