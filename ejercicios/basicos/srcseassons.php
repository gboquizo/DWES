<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: srcseassons.php
 * @Date: 28/09/18
 * @Description: Permite comprobar la estación actual y mostrar una imagen diferente para cada estación.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
function checkSeasson() {
	$currentMonth = date("n");
    $currentDay = date("j");
    $seasson  = "";
    
	switch($currentMonth) {
		
		case 1:
		case 2:
			$seasson = "INVIERNO";
		break;

		case 4:
		case 5:
			$seasson = "PRIMAVERA";
		break;

		case 7:
		case 8:
			$seasson = "VERANO";
		break;

		case 10:
		case 11:
			$seasson = "OTOÑO";
		break;

		case 3:
            $seasson = $currentDay < 21 ? "INVIERNO" : "PRIMAVERA";
		break;

		case 6:
            $seasson = $currentDay < 21 ? "PRIMAVERA" : "VERANO";
		break;

		case 9:
            $seasson = $currentDay < 23 ? "VERANO" : "OTOÑO";
		break;
		case 12:
            $seasson = $currentDay < 21 ? "OTOÑO" : "INVIERNO";
		break;
	}
	return $seasson;
}

function changeSeassonImage() {
    $photo = "";
	switch(checkSeasson()) {

		case "VERANO":
            $photo = "/~qbsagu/ejercicios/basicos/verano.jpeg";
		break;
		case "OTOÑO":
            $photo = "/~qbsagu/ejercicios/basicos/otonno.jpg";
		break;
		case "INVIERNO":
            $photo = "/~qbsagu/ejercicios/basicos/invierno.jpg";
		break;
		case "PRIMAVERA":
            $photo = "/~qbsagu/ejercicios/basicos/primavera.jpeg";
		break;
	}
	return $photo;
}
?>