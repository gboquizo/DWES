<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 08/03/2019
 * Time: 9:54
 */
require_once "clases/Valoracion.php";
$valoracion = new Valoracion();
$blogsAMostrar = $valoracion->getMejoresBlog();
