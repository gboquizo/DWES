<?php
include 'ejercicios/arrays/srccountries.php';
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: calendarForm.php
 * @Date: 10/10/18
 * @Description:Lee en un formulario un continente y nos muestra sus países con sus capitales y banderas.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

?>
<section class='principal'>
    <h2>Continentes</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <div style="text-align: center">
                        <form action="" method="post">
                            <select name="continente">
                                <option value="Europa">Europa</option>
                                <option value="Asia">Asia</option>
                                <option value="América">América</option>
                                <option value="África">África</option>
                                <option value="Oceanía">Oceanía</option>
                            </select>
                            <input type="submit" name="enviar" value="Aceptar">
                        </form>
                        <?php

                        if (isset($_POST["enviar"])) {
                            $nombreContinenteElegido = $_POST["continente"];
                            $continenteElegido = $continentes[$nombreContinenteElegido];

                            echo "
                                    <table style='margin: 10px auto'>
                                    <tr>
                                        <td class=\"contenido-paises-th\">Pais</td>
                                        <td class=\"contenido-paises-th\">Capital</td>
                                        <td class=\"contenido-paises-th\">Bandera</td>
                                    </tr>
                                ";

                            foreach ($continenteElegido as $nombrePais => $pais) {
                                echo "<tr>";
                                echo "<td class=\"contenido-paises-td\">" . $nombrePais . "</td>";
                                echo "<td class=\"contenido-paises-td\">" . $pais["capital"] . "</td>";
                                echo "<td class=\"contenido-paises-td\">
                                                <img src='$pais[bandera]' class=\"contenido-paises-img\"></td>";
                                echo "</tr>";
                            }

                            echo "</table>";
                        }
                        ?>
                    </div>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/formularios/continents1.php'>Ver código</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/arrays/srccountries.php'>Ver código src</a>
                    </div>
                </div>
            </div>
    </article>
</section>
