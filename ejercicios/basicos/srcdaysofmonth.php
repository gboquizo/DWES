<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: srcdaysofmonths.php
 * @Date: 28/09/18
 * @Description: Calcula los días para un mes dado.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
function calculateDaysOfMonth($month, $year) {
	$leapYear = false;
	if (($year % 4 == 0 && $year % 100 != 0 ) || $year % 400 == 0) {
        $leapYear= true;
    }
	switch($month) {
		case "Enero":
		case "Marzo":
		case "Mayo":
		case "Julio":
		case "Agosto":
		case "Octubre":
		case "Diciembre":
		case 1:
		case 3:
		case 5:
		case 7:
		case 8:
		case 10:
		case 12:
			return 31;
		break;
		case "Febrero":
		if($leapYear) {
            return 29;
        }
		else {
            return 28;
        }	
		break;
		case "Abril":
		case "Junio":
		case "Septiembre":
		case "Noviembre":
		case 4:
		case 6:
		case 9:
		case 11:
			return 30;
		break;
		default:
			echo "Mes inválido";
	} 	 
}
?>    						