<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="captcha.css">
    </head>
    <body>
        <main>
            <div class="box">
                <div>
                    <form method="POST" action="verifcaptcha.php">
                        <?php
                            for($i = 1; $i < 10; $i++){
                        ?>
                        <input type="checkbox" name="imag<?php echo $i;?>" id="img<?php echo $i;?>" />
                        <label for="img<?php echo $i;?>"><img src="captchaimg/<?php echo $i;?>.jpg" /></label>
                        <?php } ?>
                        <input type="submit" value="Validate">
                </div>
            </div>
            </form>
        </main>
    </body>
</html>