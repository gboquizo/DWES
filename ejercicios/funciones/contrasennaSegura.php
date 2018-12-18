<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: archivo.php
 * @Date: 10/11/18
 * @Description:
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
function validarContrasenna($contrasenna, &$error, &$flagError)
{
    if (strlen($contrasenna) < 8) {
        $error = "<br>La contraseña es demasiado corta. Mínimo 8 carácteres";
        $flagError = true;
        return false;
    } else if (!preg_match("/[a-z]/", $contrasenna)) {
        $error = "<br>La contraseña debe tener al menos una minúscula";
        $flagError = true;
        return false;
    } else if (!preg_match("/[A-Z]/", $contrasenna)) {
        $error = "<br>La contraseña debe tener al menos una mayúscula";
        $flagError = true;
        return false;
    } else if (!preg_match("/[0-9]/", $contrasenna)) {
        $error = "<br>La contraseña debe tener al menos un número";
        $flagError = true;
        return false;
    } else if (!preg_match('/[^\d\w]/', $contrasenna)) {
        $error = "<br>La contraseña debe tener al menos un carácter especial";
        $flagError = true;
        return false;
    }

    return true;
}

?>
<section class='principal'>
    <h2>Contraseña segura</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <div style="text-align: center">
                        <?php
                        $error = "";
                        $flagError = false;

                        if (isset($_POST["enviar"])) {
                            if (validarContrasenna($_POST["contrasenna"], $error, $flagError)) {
                                echo "Contraseña válida";
                            }
                        }

                        echo "<form method='post' action=''>";
                        if (!isset($_POST["enviar"]) or $flagError) {
                            echo "
                    Introduzca su contraseña <br>
                    <input type='text' name='contrasenna'><span class='error'>* $error</span><br><br>
                    <input type='submit' name='enviar' value='Enviar'>
                ";
                        }
                        echo "</form>";
                        ?>

                    </div>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/funciones/contrasennaSegura.php'>Ver
                            código</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>