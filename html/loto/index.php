<?php session_start(); ?>
<?php
  if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css">
        <title>DEATH OR LIFE, YOU SHOULD CHOICE</title>
      </head>
      <body>
        <main>
          <img src="img/croix-rouge.png" alt="" id="case1">
          <img src="img/croix-rouge.png" alt="" id="case2">
          <img src="img/croix-rouge.png" alt="" id="case3">
          <button type="button" name="button" onclick="play()">PLAY</button>
          <p id="response"></p>
        </main>
        <script type="text/javascript" src="index.js"></script>
      </body>
    </html>
<?php
} else {
  echo "You should connect to access";
}
?>
