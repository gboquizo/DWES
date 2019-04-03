<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: alumnos.php
 * Date: 11/12/18
 * @Description: Página de gestión de los alumnos del sitio.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

redireccionSinoRedactor();
?>
<?php if (isset($_POST["cerrarSesion"])) :
    session_unset();
    session_destroy();
    session_regenerate_id(true);
    session_start();
    header("Location:index.php"); ?>
<?php endif ?>
<h2>Panel de redactores, hola <?php echo $_SESSION["nombreUsuario"] ?></h2>
