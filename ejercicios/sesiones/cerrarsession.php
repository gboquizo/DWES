<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: cerrarsession.php
 * @Date: 31/10/18
 * @Description: Se encarga de cerrar una sesión.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
if(!isset($_POST["cierre"])) {
    header("Location: http://cpd.iesgrancapitan.org:9119/~qbsagu/ejercicios/sesiones/buscaminas");
}else {
    session_start();
    session_unset();
    session_destroy();
    session_start();
    session_regenerate_id(true);
    header("Location: http://cpd.iesgrancapitan.org:9119/~qbsagu/ejercicios/sesiones/buscaminas");
}
?>