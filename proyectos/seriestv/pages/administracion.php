<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: administracion.php
 * Date: 11/12/18
 * @Description: Página de administración para el administrador del sitio.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

require_once "clases/Usuarios.php";
require_once "clases/Encuesta.php";

$gestionEncuesta = new Encuesta();
$date = getdate();
$date = $date["year"]."-".$date["mon"]."-".$date["mday"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];

redireccionSinoAdmin();
if (isset($_POST['pago'])) {
    header("Location: index.php?page=pagos");
}
if (isset($_POST['encuesta'])) {
    header("Location: index.php?page=encuestas");
}

if (isset($_POST['close'])) {
    $gestionEncuesta->cerrarEncuesta($date);
}

if (isset($_POST['reset'])) {
    $gestionEncuesta->resetearEncuesta($date);
}
if (isset($_POST["cerrarSesion"])) :
    session_unset();
    session_destroy();
    session_regenerate_id(true);
    session_start();
    header("Location:index.php"); ?>
<?php endif ?>

<h2 style="margin-bottom: 10px">Panel de usuarios, hola <?php echo $_SESSION["nombreUsuario"] ?></h2>
<form name="formulario" action="" method="POST" class="form-inline my-2 my-lg-0">
    <button style="margin-left:10px" class="btn btn-outline-success my-3 my-sm-3" name="pago" type="submit">Ir a cartas de pago</button>
    <button style="margin-left:10px" class="btn btn-outline-success my-3 my-sm-3" name="encuesta" type="submit">Ver encuestas</button>
    <button style="margin-left:10px" class="btn btn-outline-danger my-3 my-sm-3" name="reset" type="submit">Abrir encuestas</button>
    <button style="margin-left:10px" class="btn btn-outline-danger my-3 my-sm-3" name="close" type="submit">Cerrar encuestas</button>
</form>