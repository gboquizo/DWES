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

/*if ($routes[1] === "") {
    include(__DIR__ . "/pages/principal.php");
}
if ($routes[0] === "" && $routes[1] === "index.php") {
    include(__DIR__ . "/pages/principal.php");
}
if ($routes[1] !== "" && count($routes) === 2 && $routes[1] !== "index.php") {
    include(__DIR__ . "/pages/" . $routes[1] . ".php");
}
/*if (($routes[1] === "proyectos" || $routes[1] === "ejercicios")  && count($routes) === 4 || isset($routes[4]) && isset($routes[5]) && !(isset($routes[6]))) {
    include(__DIR__ ."/". $routes[1] . "/" . $routes[2] . "/" . $routes[3] . ".php");
}

if (($routes[1] === "proyectos" || $routes[1] === "ejercicios")  && count($routes) === 5 || isset($routes[5]) && isset($routes[6])) {
    include(__DIR__ ."/". $routes[1] . "/" . $routes[2] . "/" . $routes[3] . "/" . $routes[4] . ".php");
}*/