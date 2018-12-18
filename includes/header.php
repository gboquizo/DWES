<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: header.php
 * Date: 10/11/18
 * @Description: Define el header general del sitio.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
//echo "<pre>" . print_r($routes, true) . "</pre>"
?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Guillermo Boquizo Sánchez">
    <meta name="description" content="Web para el módulo de DWES del ciclo de DAW.">
    <meta name="keywords" content="HTML,CSS,JavaScript">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/~qbsagu/css/all.css">
    <link rel="stylesheet" href="/~qbsagu/css/normalize.css">
    <link rel="stylesheet" id="happenstance-elegantfont-css" href="/~qbsagu/css/elegantfont.css?ver=4.7.1"
          type="text/css"
          media="all">
    <link rel="stylesheet" href="/~qbsagu/css/estilos.css">
    <link rel="shortcut icon" href="/~qbsagu/favicon.ico" type="image/png"/>
<?php if ($routes[1] === "ejercicios" && isset($routes[3]) && $routes[3] === "agenda") : ?>
    <link rel="stylesheet" href="/~qbsagu/ejercicios/sesiones/css/estilos.css">
    <title>Agenda</title>
<?php elseif ($routes[1] === "ejercicios" && isset($routes[3]) && $routes[3] === "buscaminas") : ?>
    <script src="/~qbsagu/ejercicios/sesiones/js/script.js"></script>
    <title>Buscaminas</title>
<?php else : ?>
    <title>Desarrollo Web en Entorno Servidor</title>
<?php endif ?>