<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: autentificacion.php
 * @Date: 30/11/18
 * @Description: Permite realizar una autentificación básica.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

session_start();

$errorLogin = false;

if (!isset($_SESSION["auth"])) {
    $_SESSION["auth"] = false;
}
if (isset($_POST["cerrarSesion"])) {
    session_unset();
    session_destroy();
    $_SESSION["auth"] = false;
}
?>
<section class='principal'>
    <h2>Autentificación básica</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <?php if (isset($_POST["login"])) : ?>
                        <?php if ($_POST["usuario"] === "admin" && $_POST["pass"] === "admin") :
                            $_SESSION["auth"] = true; ?>
                        <?php else :
                            $_SESSION["auth"] = false; ?>
                            <p class='error' style='text-align: center'>Las credenciales no son correctas.</p>
                            <?php $errorLogin = true; ?>
                        <?php endif ?>
                    <?php endif ?>
                    <?php if ((!isset($_POST["login"]) || $errorLogin) && !$_SESSION["auth"] || isset($_POST["cerrarSesion"])) : ?>
                        <div style='text-align: center'>
                            <form method='post' action=''>
                                <label for='usuario'>Usuario:</label><br>
                                <input type='text' name='usuario' placeholder='admin'><br>
                                <label for='pass'>Contraseña:</label><br>
                                <input type='password' name='pass' placeholder='admin'><br><br>
                                <input type='submit' name='login' value='Entrar'>
                            </form>
                        </div>
                    <?php endif ?>
                    <?php if (isset($_SESSION["auth"]) and $_SESSION["auth"] and !isset($_POST["cerrarSesion"])) : ?>
                        <form action='' method='post' style='text-align: center'>
                            <p style='text-align: center'>Acceso autorizado</p>
                            <input type='submit' name='cerrarSesion' value='Cerrar sesión'>
                        </form>
                    <?php endif ?>
                </div>
                <div class="botonera">
                    <div>
                        <a href="<?php echo $basepath ?>ejercicios/<?php echo isset($routes[4]) ? "sesiones/autentificacion" : "" ?>"
                           class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='<?php echo $basepath ?>verCodigo?src=ejercicios/sesiones/autentificacion.php'>Ver
                            código</a>
                    </div>
                </div>
            </div>
    </article>
</section>