<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: sumarDigitos.php
 * @Date: 10/11/18
 * @Description: Permite sumar de manera acumulada los dígitos de un número.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

$error = "";
$flagError = false;
$sumatorio = 0;

function sumarDigitos($numero, $sumatorio)
{
    if (strlen($numero) < 2) {
        $sumatorio += $numero;
        return $sumatorio;
    } else {
        $sumatorio += $numero % 10;
        $nuevoNumero = floor($numero / 10);
        return sumarDigitos($nuevoNumero, $sumatorio);
    }
}

?>
<section class='principal'>
    <h2>Sumar dígitos de un número</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <div style="text-align: center">
                        <form method='post' action=''>
                            <?php if (!isset($_POST["enviar"]) or $flagError) : ?>
                                <?php echo "Introduzca un número" ?>
                                <br>
                                <input type='text' name='numero'><span class='error'>*<?php echo $error ?></span><br>
                                <br>
                                <input type='submit' name='enviar' value='Enviar'>
                            <?php endif ?>
                            <?php if (isset($_POST["enviar"])) : ?>
                                <?php if (empty($_POST["numero"]) or !is_numeric($_POST["numero"])) :
                                    $error = "<br>El número no es correcto";
                                    $flagError = true; ?>
                                <?php else : ?>
                                    <h3>La suma de sus dígitos es: <?php echo sumarDigitos($_POST["numero"], $sumatorio)?></h3>
                                <?php endif ?>
                            <?php endif ?>
                        </form>
                    </div>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/funciones/sumarDigitos.php'>Ver
                            código</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>