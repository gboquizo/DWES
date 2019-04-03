<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 12/03/2019
 * Time: 11:09
 */
require_once "clases/Encuesta.php";
redireccionSinoAdmin();
$gestionEncuesta = new Encuesta();
$stmt = $gestionEncuesta->getPreguntas();
$date = getdate();
$date = $date["year"]."-".$date["mon"]."-".$date["mday"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];


if(isset($_POST['enviar'])){
    for($i = 1; $i < 6; $i++){
        if(isset($_POST["votacion".$i])){
            $gestionEncuesta->crearEncuesta($i,$_POST["votacion".$i]);
        }
    }
}
?>

<div>
    <h1>Preguntas</h1>
    <?php if( $gestionEncuesta->getEncuestasActivas($date) == [] ): ?>
        <ul style="margin: 20px">
            <form action="" method="post">
                <?php
                $i = 1;
                foreach ($stmt as $row) {
                    ?>

                    <li>
                        <div>
                            <h3 style="font-size:1.2rem"><?php echo $row['pregunta'] ?></h3>
                            <div><p style="margin: 10px 10px">La valoración media de esta pregunta es:<?php echo $gestionEncuesta->getPuntuacionMedia($i)  ?></p></div>
                        </div>

                    </li>

                    <?php $i++;
                }

                ?>
            </form>
        </ul>
    <?php else: ?>
        <div> No existen encuestas válidas.</div>
    <?php endif; ?>
</div>