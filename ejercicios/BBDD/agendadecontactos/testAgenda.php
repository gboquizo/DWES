<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: testAgenda.php
 * @Date: 09/01/19
 * @Description: Testea la agenda con BBDD.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
require_once "clases/Database.php";

session_start();

$conexion = new Database('2daw1819_bosagu', 'usuario', '2daw1819_bosagu');

$mensaje = "";
$usuario = "";

if (!isset($_SESSION["aut"])) {
    $_SESSION["aut"] = false;
    $_SESSION["perfil"] = "invitado";
    $_SESSION["usuarioActual"] = "";
} else if ($_SESSION["aut"]) {
    header("Location:agenda");
}

if (isset($_POST["login"])) {
    $conexion->query("SELECT id, nombre FROM Ag_usuarios WHERE nombre=:nombre AND password=PASSWORD(:pass)");
    $conexion->bind(":nombre", $_POST["usuario"]);
    $conexion->bind(":pass", $_POST["pass"]);
    $conexion->execute();

    if ($conexion->numeroFilas() <= 0) {
        $mensaje = "Acceso denegado!";
        $usuario = $_POST["usuario"];
    } else {
        $_SESSION["aut"] = true;
        $_SESSION["perfil"] = "usuario";
        $_SESSION["usuario"] = $conexion->obtenerFila();
        header("Location: agenda");
    }
} else if (isset($_POST["registro"])) {
    header("Location: registro");
}
?>

<section class='principal'>
    <h2>Agenda de contactos con BBDD</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <div style='text-align: center'>
                        <form method='post' action=''>
                            <label for='usuario'>Usuario:</label><br>
                            <input type='text' name='usuario' value="<?php echo $usuario ?>"><br>
                            <label for='pass'>Contraseña:</label><br>
                            <input type='password' name='pass'><br>
                            <span style="background-color: red; color: white"><?php echo $mensaje ?></span>
                            <br>
                            <input type='submit' name='login' value='Login'>
                            <input type='submit' name='registro' value='Registro'>
                        </form>
                    </div>
                </div>
                <div class="botonera">
                    <div>
                        <a href="<?php echo $basepath ?>ejercicios/<?php echo isset($routes[5]) ? "BBDD/agendadecontactos/agenda" : "" ?>"
                           class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='<?php echo $basepath ?>verCodigo?src=ejercicios/BBDD/agendadecontactos/testAgenda.php'>Ver
                            código</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>