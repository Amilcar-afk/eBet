<?php

function numberday(){
    $date = date('Y-m-j');
    $split = explode("-",$date);
    $month = $split[1];
    $numberday = cal_days_in_month(CAL_GREGORIAN, $month , $split[0]);
    return ($numberday);
}
function days(){
    $date = date('Y-m-j');
    $split = explode("-",$date);
    $month = $split[1];
    $numberday = cal_days_in_month (CAL_GREGORIAN, $month , $split[0]);

    $arraydays = [];
    for($i = 1; $i <= $numberday; $i++){
        $arraydays[$i] = $split[0] . '-' . $month . '-' . $i;
    }

    return($arraydays);
}
function month(){
    $date = date('Y-m-j');
    $split = explode("-",$date);
    $month = $split[1];
    $arraymonth = [
        'Janvier' => 1,
        'Fevrier' => 2,
        'Mars' => 3,
        'Avril' => 4,
        'Mai' => 5,
        'Juin' => 6,
        'Juillet' => 7,
        'Aout' => 8,
        'Septembre' => 9,
        'Octobre' => 10,
        'Novembre' => 11,
        'Decembre' => 12
    ];
    foreach($arraymonth as $key => $value){
        if($value == $month){
            return $key;
        }
    }
}

?>