<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: pages.php
 * @Date: 31/10/18
 * @Description: Se encarga de establecer las condiciones de acceso a cada página, por ruta.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
if ($routes[1] === "") {
    include(__DIR__ . "/pages/principal.php");
}
if ($routes[0] === "" && $routes[1] === "index.php") {
    include(__DIR__ . "/pages/principal.php");
}
if ($routes[1] !== "" && count($routes) === 2 && $routes[1] !== "agenda.php" && $routes[1] !== "index.php") {
    include(__DIR__ . "/pages/" . $routes[1] . ".php");
}
if (($routes[1] === "proyectos" || $routes[1] === "ejercicios")  && count($routes) === 4 || isset($routes[4]) && isset($routes[5]) && !(isset($routes[6]))) {
    include(__DIR__ ."/". $routes[1] . "/" . $routes[2] . "/" . $routes[3] . ".php");
}

if (($routes[1] === "proyectos" || $routes[1] === "ejercicios")  && count($routes) === 5 || isset($routes[5]) && isset($routes[6])) {
    include(__DIR__ ."/". $routes[1] . "/" . $routes[2] . "/" . $routes[3] . "/" . $routes[4] . ".php");
}

?>