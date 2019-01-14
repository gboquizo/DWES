<?php

function calculateDaysOfMonth($month, $year){
	$leaperYear = false;
	if (($year % 4 == 0 && $year % 100 != 0 )|| $year % 400 == 0) {
        $leaperYear = true;
    }

	switch($month) {
		case "Enero":
		case "Marzo":
		case "Mayo":
		case "Julio":
		case "Agosto":
		case "Octubre":
		case "Diciembre":
			return 31;
		break;

		case "Febrero":
		if($leaperYear)
			return 29;
		else
			return 28;
		break;
		case "Abril":
		case "Junio":
		case "Septiembre":
		case "Noviembre":
			return 30;
		break;
		default:
			echo "Mes inválido";
	}
}
?>