<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: alumnos.php
 * Date: 11/12/18
 * @Description: Página de gestión de los alumnos del sitio.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */


redireccionSinoRol1();
if (isset($_POST['top'])) {
    $seriesAmostrar = $gestionSeries->getSeriesRecomendadas();
    header("Location: index.php?page=recomendaciones");
}

if (isset($_POST['encuesta'])) {
    header("Location: index.php?page=realizarEncuestas");
}
?>
<h2 style="margin-bottom: 10px">Panel de usuarios, hola <?php echo $_SESSION["nombreUsuario"] ?></h2>
<form name="formulario" action="" method="POST" class="form-inline my-2 my-lg-0">
    <button style="margin-left:10px" class="btn btn-outline-success my-3 my-sm-3" name="top" type="submit">Series recomendadas</button>
    <button style="margin-left:10px" class="btn btn-outline-success my-3 my-sm-3" name="encuesta" type="submit">Realizar encuesta</button>
</form>
