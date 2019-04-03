<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: login.php
 * Date: 11/12/18
 * @Description: Página de login del sitio.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

require_once "clases/Usuarios.php";
require_once "clases/Blogs.php";

$mensaje = "";
$nombre = "";
$gestionBlogs = new Blogs();
$blogsAMostrar = $gestionBlogs->getBlogsActivos();

if (!isset($_SESSION["aut"])) {
    $_SESSION["aut"] = false;
    $_SESSION["perfil"] = "Lector";
    $_SESSION["usuarioActual"] = "";

}
if (!isset($_POST["login"])) {

}


if (isset($_POST["login"])) {
    $gestionUsuarios = new Usuarios();

    if ($gestionUsuarios->autenticar($_POST["nombre"],$_POST["pass"])) {
        $_SESSION["aut"] = true;
        $_SESSION["nombreUsuario"] = $_POST["nombre"];
        $_SESSION["idUsuario"] = $gestionUsuarios->getIdUsuario($_POST["nombre"]);
        $_SESSION["perfil"] = $gestionUsuarios->getUsuariosPerfil($_SESSION["idUsuario"]);
        if ($_SESSION["perfil"] == "Administrador") {
            $_SESSION["aut"] = true;
            header("Location: index.php?page=administracion");
        }
        elseif ($_SESSION["perfil"] == "Redactor"){
            $_SESSION["aut"] = true;
            header("Location: index.php?page=redactor");
        }
        else {
            $_SESSION["perfil"] = "Lector";

            //header("Location: index.php");
            $_SESSION["aut"] = false;

        }

    } else {
        $mensaje = "¡Acceso denegado!";
        $nombre= $_POST["nombre"];
    }

}
include "includes/loginForm.php"; ?>