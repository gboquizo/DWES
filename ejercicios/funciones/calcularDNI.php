<?php
//include '.php';
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: calcularDNI.php
 * @Date: 10/11/18
 * @Description:
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
function calcularLetraDni($numero)
{
    $letras = array("T", "R", "W", "A", "G", "M", "Y", "F", "P", "D", "X", "B", "N", "J", "Z", "S", "Q", "V", "H", "L", "C", "K", "E");
    return $letras[$numero % 23];
}
?>
<section class='principal'>
    <h2>Calcular DNI</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <div style="text-align: center">
                        <?php
                        $errorNumero = "";
                        $flagErrorNum = false;
                        if (isset($_POST["enviarValor"])) {
                            if (empty($_POST["numeroIntroducido"]) or !is_numeric($_POST["numeroIntroducido"])) {
                                $errorNumero = "El número introducido no es válido.<br>";
                                $flagErrorNum = true;
                            } else if (strlen($_POST["numeroIntroducido"]) != 8) {
                                $errorNumero = "El número introducido no tiene una longitud de 8.<br>";
                                $flagErrorNum = true;
                            } else {
                                echo "El DNI es: " . $_POST["numeroIntroducido"] . " - " . calcularLetraDni($_POST["numeroIntroducido"]);
                            }
                        }

                        echo "<form method='post' action=''>";
                        if (!isset($_POST["enviarValor"]) or $flagErrorNum) {
                            echo "
                    Introduzca su número del DNI <br>
                    <input type='text' name='numeroIntroducido'><br><span class='error'>* $errorNumero</span>
                    <input type='submit' name='enviarValor' value='Enviar'>
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
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/funciones/calcularDNI.php'>Ver
                            código</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>