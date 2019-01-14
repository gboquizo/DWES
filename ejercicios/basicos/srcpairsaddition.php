<?php
/**
 * Created by PhpStorm.
 * User: guillermo
 * Date: 1/10/18
 */
function pairsAddition(){
    $counter = 0;
    for ($i = 0; $i <= 6; $i+=2) {
        $counter += $i;
    }
    echo "La suma de los tres primeros números pares, 2 + 4 + 6 es " . $counter;
}
?>