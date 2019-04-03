<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: pages.php
 * @Date: 11/12/18
 * @Description: Se encarga de la redirección por página.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
if (!isset($_GET['page'])) {
    include("pages/principal.php");
} else if (isset($_GET['page'])) {
    include("pages/" . $_GET['page'] . ".php");
}
