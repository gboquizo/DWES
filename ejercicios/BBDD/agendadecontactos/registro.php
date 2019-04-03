<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: registro.php
 * @Date: 09/01/19
 * @Description: Registra contactos en la BBDD.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
require_once "clases/Database.php";

$conexion = new Database('2daw1819_bosagu', 'usuario', '2daw1819_bosagu');

$mensajeContrasenias = "";
$usuario = "";

if (isset($_POST["registro"])) {
    if (empty($_POST["usuarioReg"]) or strlen($_POST["usuarioReg"]) < 3) {
        $mensajeContrasenias = "El usuario debe tener una longitud igual o mayor a 3 carácteres.";
        $color = "red";
        $usuario = $_POST["usuarioReg"];
    } else {
        if (strlen($_POST["passReg"]) <= 3) {
            $mensajeContrasenias = "Las contraseñas deben tener una longitud mayor a 3 carácteres.";
            $color = "red";
        } else {
            if ($_POST["passReg"] != $_POST["passReg2"]) {
                $mensajeContrasenias = "Las contraseñas no coinciden";
                $color = "red";
                $usuario = $_POST["usuarioReg"];
            } else {
                $mensajeContrasenias = "Usuario registrado correctamente";
                $color = "green";

                $conexion->query('INSERT INTO Ag_usuarios (nombre, password) VALUES (:nombre, PASSWORD(:pass))');
                $conexion->bind(":nombre", $_POST["usuarioReg"]);
                $conexion->bind(":pass", $_POST["passReg"]);
                $conexion->execute();

                header("Location: testAgenda");
            }
        }
    }

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
                            <div style='text-align: center'>
                                <form method='post' action=''>
                                    <label for='usuarioReg'>Usuario:</label><br>
                                    <input type='text' name='usuarioReg' value="<?php echo $usuario ?>"><br>
                                    <label for='passReg'>Contraseña:</label><br>
                                    <input type='password' name='passReg'><br>
                                    <label for='passReg'>Repita contraseña:</label><br>
                                    <input type='password' name='passReg2'><br>
                                    <span style="background-color: <?php echo $color ?>; color: white"><?php echo $mensajeContrasenias ?></span>
                                    <br>
                                    <input type='submit' name='registro' value='Registrarse'>
                                </form>
                            </div>
                    </div>
                </div>
                    <div class="botonera">
                        <div>
                            <a href="<?php echo $basepath ?>ejercicios/<?php echo isset($routes[5]) ? "BBDD/agendadecontactos/registro" : "" ?>"
                               class="btnVolver">Volver</a>
                        </div>
                        <div>
                            <a class="btnVolver"
                               href='<?php echo $basepath ?>verCodigo?src=ejercicios/BBDD/agendadecontactos/registro.php'>Ver
                                código</a>
                        </div>
                    </div>
                </div>
            </div>
    </article>
</section>
