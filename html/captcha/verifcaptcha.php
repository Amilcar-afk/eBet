<?php
$image1 = $_POST['imag1'];
echo $image1;
$image2 = $_POST['imag2'];
echo $image2;
$image3 = $_POST['imag3'];
echo $image3;
$counter = 0;
print_r($_POST);
    foreach($_POST as $imag){
        if($_POST['imag1']== 'on' || $_POST['imag2']== 'on' || $_POST['imag3']== 'on'){
            $counter++;
        }
    }
    if($counter == 3){
        return true;
    }
    else{
        return false;
    }
?>