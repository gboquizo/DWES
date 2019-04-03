<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: cierreSesion.php
 * Date: 11/12/18
 * @Description: Página encargada de cerrar la sesión.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
session_start();
session_unset();
session_destroy();
session_regenerate_id(true);
$_SESSION = [];
header("Location:index.php");