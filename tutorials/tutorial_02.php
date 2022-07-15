<?php
    $size = 6;
    for ($i=1; $i <=$size ; $i++) { 
        for ($j=$size; $j > $i ; $j--) { 
            echo "&nbsp;&nbsp;";
        }
        for ($k=0; $k < $i*2-1 ; $k++) { 
            echo "*";
        }
        echo "<br>";
    }

    for ($i=1; $i <= $size ; $i++) { 
        for ($j=0; $j < $i ; $j++) { 
            echo "&nbsp;&nbsp;";
        }
        for ($k=($size - $i)*2-1; $k > 0 ; $k--) { 
            echo "*";
        }
        echo "<br>";
    }
?>