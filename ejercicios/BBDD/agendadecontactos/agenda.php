<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: agenda.php
 * @Date: 09/01/19
 * @Description: Agenda que añade, modifica y borra contactos con BBDD.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
session_start();

$nameError = "";
$telephoneError = "";
$firstSurnameError = "";
$secondSurnameError = "";
$emailError = "";
$flagNameError = false;
$flagFirstSurnameError = false;
$flagSecondSurnameError = false;
$flagEmailError = false;
$flagTelephoneError = false;
$table = false;
$name = "";
$telephone = "";
$firstSurname = "";
$secondSurname = "";
$email = "";


if (isset($_POST["crearContacto"]) || !isset($routes[4]) || !isset($_POST["modificarContacto"])) {
    if (isset($_POST["crearContacto"])) {

        if (empty($_POST["nombre"])) {
            $nameError = "* Introduzca un nombre<br>";
            $flagNameError = true;
        } else {/**/
            $name = $_POST["nombre"];
        }

        if (empty($_POST["apellido1"])) {
            $firstSurnameError = "* Introduzca el primer apellido<br>";
            $flagFirstSurnameError = true;
        } else {/**/
            $firstSurname = $_POST["apellido1"];
        }

        if (empty($_POST["apellido2"])) {
            $secondSurnameError = "* Introduzca el segundo apellido<br>";
            $flagSecondSurnameError = true;
        } else {/**/
            $secondSurname = $_POST["apellido2"];
        }

        if (empty($_POST["email"])) {
            $emailError = "* Introduzca el email<br>";
            $flagEmailError = true;
        } else {/**/
            $email = $_POST["email"];
        }

        if (empty($_POST["telefono"])) {
            $telephoneError = "* Introduzca un teléfono<br>";
            $flagTelephoneError = true;
        } else {
            $telephone = $_POST["telefono"];
        }

        if (!empty($_POST["nombre"])
            && !empty($_POST["apellido1"])
            && !empty($_POST["apellido2"])
            && !empty($_POST["email"])
            && !empty($_POST["telefono"])) {
            $_SESSION["contactos"][] = array(
                "nombre" => $_POST["nombre"],
                "apellido1" => $_POST["apellido1"],
                "apellido2" => $_POST["apellido2"],
                "email" => $_POST["email"],
                "telefono" => $_POST["telefono"]);
            $table = true;
        }
    }

    if (isset($routes[5]) && $routes[5] === "borrar" && isset($routes[6])) {
        unset($_SESSION["contactos"][$routes[6]]);
        header('Location: http://cpd.iesgrancapitan.org:9119/~qbsagu/ejercicios/BBDD/agendadecontactos/agenda');
    }

    if (isset($routes[5]) && $routes[5] === "modificar" && isset($routes[6])) {
        $name = $_SESSION["contactos"][$routes[6]]["nombre"];
        $firstSurname = $_SESSION["contactos"][$routes[6]]["apellido1"];
        $secondSurname = $_SESSION["contactos"][$routes[6]]["apellido2"];
        $email = $_SESSION["contactos"][$routes[6]]["email"];
        $telephone = $_SESSION["contactos"][$routes[6]]["telefono"];
    }

    if (isset($_POST["modificarContacto"])) {
        $_SESSION['contactos'][$_POST["contactoModificado"]]['nombre'] = $_POST['nombre'];
        $_SESSION['contactos'][$_POST["contactoModificado"]]['apellido1'] = $_POST['apellido1'];
        $_SESSION['contactos'][$_POST["contactoModificado"]]['apellido2'] = $_POST['apellido2'];
        $_SESSION['contactos'][$_POST["contactoModificado"]]['email'] = $_POST['email'];
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
    <h2>Agenda de contactos con BBDD</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">

                    <!--Si no está establecida crear, ni modificar, ni hay errores-->
                    <?php if (!isset($_POST["create"]) && !isset($routes[5])
                        && !$flagNameError
                        && !$flagFirstSurnameError
                        && !$flagSecondSurnameError
                        && !$flagEmailError
                        && !$flagTelephoneError) : ?>
                        <?php $table = true ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" method="post">
                            Contacto a buscar:
                            <input type="text" name="nombreBuscar">
                            <input type="submit" name="buscar" value="Buscar">
                            <input type="submit" name="create" value="Crear contacto">
                            <input type="submit" name="cerrarSesion" value="Cerrar sesión">
                        </form>
                    <?php endif ?>

                    <?php if (isset($_POST["create"]) || isset($routes[5]) && $routes[5] === "modificar"
                        || $flagNameError
                        || $flagFirstSurnameError
                        || $flagSecondSurnameError
                        || $flagEmailError
                        || $flagTelephoneError) : ?>
                        <form action="http://cpd.iesgrancapitan.org:9119/~qbsagu/ejercicios/BBDD/agendadecontactos/agenda"
                              method="post">
                            <label for="nombre">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" value="<?php echo $name ?>"><span
                                    class="error"><?php echo $nameError ?></span><br><br>
                            <label for="apellido1">Primer apellido:</label>
                            <input type="text" id="apellido1" name="apellido1" value="<?php echo $firstSurname ?>"><span
                                    class="error"><?php echo $firstSurnameError ?></span><br><br>
                            <label for="apellido2">Segundo apellido:</label>
                            <input type="text" id="apellido2" name="apellido2"
                                   value="<?php echo $secondSurname ?>"><span
                                    class="error"><?php echo $secondSurnameError ?></span><br><br>
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" value="<?php echo $email ?>"><span
                                    class="error"><?php echo $emailError ?></span><br><br>
                            <label for="telefono">Teléfono:</label>
                            <input type="text" id="telefono" name="telefono" value="<?php echo $telephone ?>"><span
                                    class="error"><?php echo $telephoneError ?></span><br><br>
                            <?php if (!isset($routes[5])) : ?>
                                <input type=submit name=crearContacto value=Crear contacto>
                            <?php else : ?>
                                <?php $indiceContacto = isset($routes[6]) ? $routes[6] : 0 ?>
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
                            || (isset($routes[5]) && $routes[5] === "borrar"))
                            && !isset($_POST["buscar"])) : ?>
                        <table class="contenido-paises-tabla">
                            <tr>
                                <th class="contenido-paises-th">Nombre</th>
                                <th class="contenido-paises-th">Primer apellido</th>
                                <th class="contenido-paises-th">Segundo apellido</th>
                                <th class="contenido-paises-th">Email</th>
                                <th class="contenido-paises-th">Teléfono</th>
                                <th class="contenido-paises-th">Opciones</th>
                            </tr>
                            <?php foreach ($_SESSION["contactos"] as $key => $valor) : ?>
                                <tr>
                                    <td class="contenido-paises-td"><?php echo $valor["nombre"] ?></td>
                                    <td class="contenido-paises-td"><?php echo $valor["apellido1"] ?></td>
                                    <td class="contenido-paises-td"><?php echo $valor["apellido2"] ?></td>
                                    <td class="contenido-paises-td"><?php echo $valor["email"] ?></td>
                                    <td class="contenido-paises-td"><?php echo $valor["telefono"] ?></td>
                                    <td class="contenido-paises-td">
                                        <a href='<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>/modificar/<?php echo $key ?>'>
                                            <img class="contenido-paises-img"
                                                 src='../../../ejercicios/BBDD/agendadecontactos/images/modificar.png'
                                                 title='Modificar contacto'>
                                        </a>
                                        <a href='<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>/borrar/<?php echo $key ?>'>
                                            <img class="contenido-paises-img"
                                                 src='../../../ejercicios/BBDD/agendadecontactos/images/eliminar.png'
                                                 title='Eliminar contacto'>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    <?php endif ?>


                    <!--Necesita filtrar en caso de ausencia de contacto -->
                    <?php if (isset($_POST["buscar"]) && !empty($_SESSION["contactos"])) : ?>
                        <table class="contenido-paises-tabla">
                            <tr>
                                <th class="contenido-paises-th">Nombre</th>
                                <th class="contenido-paises-th">Primer apellido</th>
                                <th class="contenido-paises-th">Segundo apellido</th>
                                <th class="contenido-paises-th">Email</th>
                                <th class="contenido-paises-th">Teléfono</th>
                                <th class="contenido-paises-th">Opciones</th>
                            </tr>
                            <?php foreach ($_SESSION["contactos"] as $key => $valor) : ?>
                                <?php if (preg_match('#^' . strtoupper(trim($_POST['nombreBuscar'])) . '.*#s', strtoupper(trim($valor["nombre"])))) : ?>
                                    <tr>
                                        <td class="contenido-paises-td"><?php echo $valor["nombre"] ?></td>
                                        <td class="contenido-paises-td"><?php echo $valor["apellido1"] ?></td>
                                        <td class="contenido-paises-td"><?php echo $valor["apellido2"] ?></td>
                                        <td class="contenido-paises-td"><?php echo $valor["email"] ?></td>
                                        <td class="contenido-paises-td"><?php echo $valor["telefono"] ?></td>
                                        <td class="contenido-paises-td">
                                            <a href='<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>/modificar/<?php echo $key ?>'>
                                                <img class="contenido-paises-img"
                                                     src='../../../ejercicios/BBDD/agendadecontactos/images/modificar.png'
                                                     title='Modificar contacto'>
                                            </a>
                                            <a href='<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>/borrar/<?php echo $key ?>'>
                                                <img class="contenido-paises-img"
                                                     src='../../../ejercicios/BBDD/agendadecontactos/images/eliminar.png'
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
                        <a href="<?php echo $basepath ?>ejercicios/<?php echo isset($routes[5]) ? "BBDD/agendadecontactos/agenda" : "" ?>"
                           class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='<?php echo $basepath ?>verCodigo?src=ejercicios/BBDD/agendadecontactos/agenda.php'>Ver
                            código</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
