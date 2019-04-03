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
    //$_SESSION["perfil"] = "Lector";
    $_SESSION["usuarioActual"] = "";

}

if (isset($_POST["login"])) {
    $gestionUsuarios = new Usuarios();

    if ($gestionUsuarios->autenticar($_POST["nombre"],$_POST["pass"])) {
        //$_SESSION["aut"] = true;
        $_SESSION["nombreUsuario"] = $_POST["nombre"];
        $_SESSION["idUsuario"] = $gestionUsuarios->getIdUsuario($_POST["nombre"]);
        $_SESSION["perfil"] = $gestionUsuarios->getUsuariosPerfil($_SESSION["idUsuario"]);
        $_SESSION["estado"] = $gestionUsuarios->getUsuariosEstado($_SESSION["idUsuario"]);
        if ($_SESSION["perfil"] == "Administrador" and $_SESSION["estado"] === "Activo") {
            $_SESSION["aut"] = true;
            header("Location: index.php?page=administracion");
        }
        elseif ($_SESSION["perfil"] == "Redactor" and $_SESSION["estado"] === "Activo"){
            $_SESSION["aut"] = true;
            header("Location: index.php?page=redactor");
        }
        elseif ($_SESSION["perfil"] == "Lector" and $_SESSION["estado"] === "Activo"){
            $_SESSION["aut"] = true;
            header("Location: index.php?page=lector");
        }
        else {
            $_SESSION["aut"] = false;
            $_SESSION = [];
            header("Location: index.php");
        }

    } else {
        $mensaje = "¡Acceso denegado!";
        $nombre= $_POST["nombre"];
    }

}
include "includes/loginForm.php"; ?>


