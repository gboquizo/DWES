<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: srccalculatethebignumber.php
 * @Date: 28/09/18
 * @Description: Permite calcular el mayor de dos números.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
function calculateTheBigger($firstNum, $secondNum){
	if ($firstNum > $secondNum) {
        return $firstNum;
    }	
	elseif ($firstNum < $secondNum) {
        return $secondNum;
    } 	
	else {
        return $firstNum;
    }	 	 
}
?>