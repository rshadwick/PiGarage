<?php

    $pinStatus2 = system('gpio -g read 22');
    echo $pinStatus2;

    //returns 0 = low; 1 = high
    if ($pinStatus2 == 1) {
        echo "<img id='garageImg' src='/images/garageGreen128.png'/>";
    }
    elseif ($pinStatus2 == 0) {
        echo "<img id='garageImg' src='/images/garageRed128.png'/>";
    }
    
?>