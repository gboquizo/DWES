<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: obtenerIniciales.php
 * @Date: 10/11/18
 * @Description:Permite obtener las iniciales a partir de un nombre y apellidos dados.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

$errorNombre = "";
$flagErrorNombre = false;
$errorApellidos = "";
$flagErrorApellidos = false;
$nombre = $apellidos = "";

if (isset($_POST["enviar"])) {
    if (empty($_POST["nombre"]) or is_numeric($_POST["nombre"])) {
        $errorNombre = "<br>El nombre introducido no es válido.<br>";
        $flagErrorNombre = true;
    } else {
        $nombre = test_input($_POST["nombre"]);
    }

    if (empty($_POST["apellidos"]) or is_numeric($_POST["apellidos"])) {
        $errorApellidos = "<br>Los apellidos introducidos no son válidos<br>";
        $flagErrorApellidos = true;
    } else {
        $apellidos = test_input($_POST["apellidos"]);
    }
}

function obtenerIniciales($nombre, $apellidos)
{
    $nombre = " " . $nombre;
    $patron = '/\s\w/';
    preg_match_all($patron, $nombre, $coincidencias);
    $iniciales = implode(". ", $coincidencias[0]);

    $iniciales .= ". ";

    $apellidos = " " . $apellidos;
    $patron = '/\s\w/';
    preg_match_all($patron, $apellidos, $coincidencias);
    $iniciales .= implode(". ", $coincidencias[0]);

    return $iniciales;
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<section class='principal'>
    <h2>Obtener iniciales</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <div style="text-align: center">
                        <form method='post' action=''>
                            <?php if (!isset($_POST["enviar"]) or $flagErrorNombre or $flagErrorApellidos) :?>
                                Introduzca su nombre
                                <input type='text' name='nombre' value='<?php echo $nombre?>'><span class='error'>*
                                    <?php echo $errorNombre?></span>
                                <br><br>
                                Introduzca sus apellidos
                                <input type='text' name='apellidos' value='<?php echo $apellidos?>'><span class='error'>*
                                    <?php echo $errorApellidos?></span>
                                <br><br>
                                <input type='submit' name='enviar' value='Enviar'>
                            <?php endif ?>
                        </form>
                        <?php if (isset($_POST["enviar"]) and !$flagErrorApellidos and !$flagErrorNombre) :?>
                            <h3>Las iniciales son: <?php echo strtoupper(obtenerIniciales($_POST["nombre"], $_POST["apellidos"]))?></h3>
                        <?php endif ?>
                    </div>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/funciones/obtenerIniciales.php'>Ver código
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>