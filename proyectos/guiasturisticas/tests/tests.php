<?php

require_once('../clases/Usuario.php');
include ('../config/config.php');


$usuario = new Usuario();

echo $usuario->sacarPerfilesDeUsuario(1);