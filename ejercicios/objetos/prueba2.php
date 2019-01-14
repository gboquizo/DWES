<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 16/11/2018
 * Time: 8:44
 */
echo Usuario::restriccion();

$user = new Usuario(usuario);

echo"<br/>Estableciendo contraseña 1234<br>";

if($user->setPassword('admin','1234')) {
    echo "contraseña establecida correctamente";
}
else{
    echo "Error:".$user::restriccion();
}
echo"<br/>Estableciendo contraseña 123456<br>";
if($user->setPassword('admin','123456')) {
    echo "contraseña establecida correctamente";
}
else{
    echo "Error:".$user::restriccion();
}