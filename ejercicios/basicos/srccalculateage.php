<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: srccalculateage.php
 * @Date: 28/09/18
 * @Description: Permite calcular la edad actual.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
function calculateAge($day, $month, $year) {
    $currentYear = date("Y");
    $currentMonth = date("n");
    $currentDay = date("j");
    if(($month === $currentMonth) && ($day > $currentDay)) {
        $year += 1;	 
    } if($month > $currentMonth) {
        $year += 1;
    }
    return $currentYear - $year;
}
?>