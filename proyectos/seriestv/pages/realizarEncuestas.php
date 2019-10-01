<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 12/03/2019
 * Time: 11:40
 */
require_once "clases/Encuesta.php";
redireccionSinoRol1();

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
    <?php if($gestionEncuesta->getEncuestasActivas($date)!=[]): ?>
        <ul>
            <form action="" method="post">
                <?php
                $i = 1;
                foreach ($stmt as $row) { ?>

                    <li>
                        <div>
                            <h3 style="font-size:1.2rem;"><?php echo $row['pregunta'] ?></h3>
                            <input style="margin: 10px 10px" type="radio" name="votacion<?php echo $i ?>" value="1">1<br>
                            <input style="margin: 10px 10px" type="radio" name="votacion<?php echo $i ?>" value="2">2<br>
                            <input style="margin: 10px 10px" type="radio" name="votacion<?php echo $i ?>" value="3">3<br>
                            <input style="margin: 10px 10px" type="radio" name="votacion<?php echo $i ?>" value="4">4<br>
                            <input style="margin: 10px 10px" type="radio" name="votacion<?php echo $i ?>" value="5">5<br>
                        </div>

                    </li>

                    <?php $i++;
                }
                ?>
                <input class="btn btn-primary" style="margin-top: 20px" type="submit" value="Enviar encuesta" name="enviar"/>
            </form>
        </ul>
    <?php else: ?>
        <div> No existen encuestas validas</div>
    <?php endif; ?>
</div>