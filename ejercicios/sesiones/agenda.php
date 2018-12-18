<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: agenda.php
 * @Date: 30/10/18
 * @Description: Agenda que añade, modifica y borra contactos con sesiones.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
session_start();

$nameError = "";
$telephoneError = "";
$flagNameError = false;
$flagTelephoneError = false;
$table = false;
$name = "";
$telephone = "";


if (isset($_POST["crearContacto"]) || !isset($routes[4]) || !isset($_POST["modificarContacto"])) {
    if (isset($_POST["crearContacto"])) {
        if (empty($_POST["nombre"])) {
            $nameError = "* Introduzca un nombre<br>";
            $flagNameError = true;
        } else {/**/
            $name = $_POST["nombre"];
        }

        if (empty($_POST["telefono"])) {
            $telephoneError = "* Introduzca un teléfono<br>";
            $flagTelephoneError = true;
        } else {
            $telephone = $_POST["telefono"];
        }

        if (!empty($_POST["nombre"]) && !empty($_POST["telefono"])) {
            $_SESSION["contactos"][] = array("nombre" => $_POST["nombre"], "telefono" => $_POST["telefono"]);
            $table = true;
        }
    }

    if (isset($routes[4]) && $routes[4] === "borrar" && isset($routes[5])) {
        unset($_SESSION["contactos"][$routes[5]]);
        header('Location: http://cpd.iesgrancapitan.org:9119/~qbsagu/ejercicios/sesiones/agenda');
    }
    
    if (isset($routes[4]) && $routes[4] === "modificar" && isset($routes[5])) {
        $name = $_SESSION["contactos"][$routes[5]]["nombre"];
        $telephone = $_SESSION["contactos"][$routes[5]]["telefono"];
    }
    
    if (isset($_POST["modificarContacto"])) {
        $_SESSION['contactos'][$_POST["contactoModificado"]]['nombre'] = $_POST['nombre'];
        $_SESSION['contactos'][$_POST["contactoModificado"]]['telefono'] = $_POST['telefono'];
    }
}

if (isset($_POST["buscar"])) {
    $table = true;
}

if (isset($_POST["cerrarSesion"])) {
    session_unset();
    session_destroy();
}

?>
<section class='principal'>
    <h2>Agenda de contactos</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">

                    <!--Si no está establecida crear, ni modificar, ni hay errores-->
                    <?php if (!isset($_POST["create"]) && !isset($routes[4]) && !$flagNameError && !$flagTelephoneError) : ?>
                        <?php $table = true ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" method="post">
                            Contacto a buscar:
                            <input type="text" name="nombreBuscar">
                            <input type="submit" name="buscar" value="Buscar">
                            <input type="submit" name="create" value="Crear contacto">
                            <input type="submit" name="cerrarSesion" value="Cerrar sesión">
                        </form>
                    <?php endif ?>

                    <?php if (isset($_POST["create"]) || isset($routes[4]) && $routes[4] === "modificar" || $flagNameError || $flagTelephoneError) : ?>
                        <form action="http://cpd.iesgrancapitan.org:9119/~qbsagu/ejercicios/sesiones/agenda" method="post">
                            Nombre:
                            <input type="text" name="nombre" value="<?php echo $name ?>"<span
                                    class="error"><?php echo $nameError ?></span><br><br>
                            Teléfono:
                            <input type="text" name="telefono" value="<?php echo $telephone ?>"><span
                                    class="error"><?php echo $telephoneError ?></span><br><br>
                            <?php if (!isset($routes[4])) : ?>
                                <input type=submit name=crearContacto value=Crear contacto>
                            <?php else : ?>
                                <?php $indiceContacto = isset($routes[5]) ? $routes[5] : 0 ?>
                                <input type='hidden' name='contactoModificado' value='<?php echo $indiceContacto ?>'>
                                <input type="submit" name="modificarContacto" value="Modificar contacto">
                            <?php endif ?>
                        </form>
                    <?php endif ?>

                    <?php if ($table && empty($_SESSION["contactos"])) : ?>
                        <h3>La lista de contactos esta vacía</h3>
                    <?php endif ?>

                    <?php if (($table && !empty($_SESSION["contactos"])
                            || isset($_POST["borrar"])
                            || (isset($routes[4]) && $routes[4] === "borrar"))
                        && !isset($_POST["buscar"])) : ?>
                        <table class="contenido-paises-tabla">
                            <tr>
                                <th class="contenido-paises-th">Nombre</th>
                                <th class="contenido-paises-th">Teléfono</th>
                                <th class="contenido-paises-th">Opciones</th>
                            </tr>
                            <?php foreach ($_SESSION["contactos"] as $key => $valor) : ?>
                                <tr>
                                    <td class="contenido-paises-td"><?php echo $valor["nombre"] ?></td>
                                    <td class="contenido-paises-td"><?php echo $valor["telefono"] ?></td>
                                    <td class="contenido-paises-td">
                                        <a href='<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>/modificar/<?php echo $key ?>'>
                                            <img class="contenido-paises-img"
                                                 src='../../ejercicios/sesiones//images/modificar.png'
                                                 title='Modificar contacto'>
                                        </a>
                                        <a href='<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>/borrar/<?php echo $key ?>'>
                                            <img class="contenido-paises-img"
                                                 src='../../ejercicios/sesiones/images/eliminar.png'
                                                 title='Eliminar contacto'>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    <?php endif ?>

                    <?php if (isset($_POST["buscar"]) && !empty($_SESSION["contactos"])) : ?>
                        <table class="contenido-paises-tabla">
                            <tr>
                                <th class="contenido-paises-th">Nombre</th>
                                <th class="contenido-paises-th">Teléfono</th>
                                <th class="contenido-paises-th">Opciones</th>
                            </tr>
                            <?php foreach ($_SESSION["contactos"] as $key => $valor) : ?>
                                <?php if (preg_match('#^' . strtoupper(trim($_POST['nombreBuscar'])) . '.*#s', strtoupper(trim($valor["nombre"])))) : ?>
                                    <tr>
                                        <td class="contenido-paises-td"><?php echo $valor["nombre"] ?></td>
                                        <td class="contenido-paises-td"><?php echo $valor["telefono"] ?></td>
                                        <td class="contenido-paises-td">
                                            <a href='<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>/modificar/<?php echo $key ?>'>
                                                <img class="contenido-paises-img"
                                                     src='../../ejercicios/sesiones/images/modificar.png'
                                                     title='Modificar contacto'>
                                            </a>
                                            <a href='<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>/borrar/<?php echo $key ?>'>
                                                <img class="contenido-paises-img"
                                                     src='../../ejercicios/sesiones/images/eliminar.png'
                                                     title='Eliminar contacto'>
                                        </td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                        </table>
                    <?php endif ?>
                </div>
                <div class="botonera">
                    <div>
                        <a href="<?php echo $basepath ?>ejercicios/<?php echo isset($routes[4]) ? "sesiones/agenda" : "" ?>" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='<?php echo $basepath ?>verCodigo?src=ejercicios/sesiones/agenda.php'>Ver
                            código</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
