<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: calendarForm.php
 * @Date: 10/10/18
 * @Description:Pide una cantidad de números a sumar y los suma.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
?>

<section class='principal'>
    <h2>Suma de números</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <?php echo "<form method='post' action=''>";

                    $flagError = false;
                    $ocultar = "";
                    $cantidadNumeros = "";
                    $suma = 0;
                    $errorCantidad = "";
                    $errorNumeros = "";

                    if (isset($_POST["enviar"])) {
                        if ($_POST["cantidadNumeros"] <= 1) {
                            $errorCantidad = "<br>¡La cantidad no es válida!";
                            $flagError = true;
                        } else {
                            $ocultar = "none";
                            $cantidadNumeros = $_POST["cantidadNumeros"];
                            echo "<br>";
                            for ($i = 0; $i < $cantidadNumeros; $i++) {
                                echo "<br><br>Número " . ($i + 1) . " <input type='number' name='numeros[]'><span class=\"error\">* <?php echo $errorNumeros;?></span>";
                            }
                            echo "<br><br><div><input class='contenido-paises-th' type='submit' name='sumar' value='Sumar'></div>";
                        }
                    }
                    if (isset($_POST["sumar"])) {
                        $sumandos = $_POST["numeros"];

                        for ($j = 0; $j < count($sumandos); $j++) {
                            $suma = $suma + $sumandos[$j];
                        }
                        echo "El resultado de la suma es: " . $suma . "<br><br>";
                    }
                    echo "</form>";
                    ?>

                    <form action="" method="post" style="display: <?php echo $ocultar ?>">
                        Cantidad de números a sumar (mayor de 1):
                        <input type="number" name="cantidadNumeros"><span
                                class="error">* <?php echo $errorCantidad; ?></span>
                        <input type="submit" name="enviar" value="Aceptar">
                    </form>

                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/formularios/sumNumbers.php'>Ver código</a>
                    </div>
                </div>
            </div>

        </div>
    </article>
</section>