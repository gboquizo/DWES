<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: srcusertype.php
 * @Date: 28/09/18
 * @Description: Permite comprobar el tipo de usuario y devolver el tipo adecuado.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
function checkUser($userType) {

    $users = ["user", "admin", "guest"];

    $user = ["Inicio", "Ver perfil", "Ver tareas", "Calendario", "Matriculación", "Desconectarse"];
    $admin = ["Inicio", "Ver perfil", "Asignación tareas", "Gestión de grupos", "Modificar usuarios", "Asignación de roles", "Desconectarse"];
    $guest = ["Inicio", "Login", "Registro"];
    $error = ["Tipo de usuario no válido"];

    if(!in_array($userType,$users)) {
        return $error;
    }
    if($userType === "user" ) {
        return $user;
    } else if($userType === "admin" ) {
        return $admin;
	} else if($userType === "guest") {
		return $guest;
	}
}
?>