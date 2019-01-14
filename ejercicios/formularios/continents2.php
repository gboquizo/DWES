<?php
include 'ejercicios/arrays/srccountries.php';
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: continents2.php
 * @Date: 10/10/18
 * @Description:crea un script con una lista de continentes de manera que al
 *  seleccionar uno, se cargue una segunda lista con los países. Al seleccionar un
 *  país se mostrará la capital y la bandera.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
?>
<section class='principal'>
    <h2>Continentes 2</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <div style="text-align: center">
                        <?php
                        $displaySelect = "";

                        //Si le he dado al boton enviar continente
                        if (isset($_POST["enviarContinente"])) {
                            $displaySelect = "none"; //Para ocultar el select de continente
                            $continenteElegido = $_POST["continente"];  //Recibo el continente mediante POST
                            $arrayContEleg = $continentes[$continenteElegido];  //Obtengo los paises del continente elegido

                            echo "<form method='post' action=''>";
                            echo "<select name='pais'>";
                            //Muestro los paises del continente elegido
                            foreach ($arrayContEleg as $pais => $datos) {
                                echo "<option value='$pais'>" . $pais . "</option>";
                            }
                            echo "</select>";
                            echo "<input type='hidden' name='continente' value='$continenteElegido'/>"; //Para enviar al segundo select el continente elegido
                            echo "<input type='submit' name='enviarPais' value='Enviar país'>";
                            echo "</form>";
                        }

                        //Si le he dado al boton de enviar pais
                        if (isset($_POST["enviarPais"])) {
                            $continenteSeleccionado = $_POST["continente"]; //Recibo por POST el continente enviado anteriormente
                            $paisElegido = $_POST["pais"];  //Recibo por POST el pais
                            $arrayPaisEleg = $continentes[$continenteSeleccionado][$paisElegido];   //Obtengo los datos del pais elegido

                            //Muestro los datos
                            echo "<table class=\"contenido-paises-tabla\"'>
                                        <tr>
                                            <td class=\"contenido-paises-th\">País</td>
                                            <td class=\"contenido-paises-th\">Capital</td>
                                            <td class=\"contenido-paises-th\">Bandera</td>
                                        </tr>
                                    ";
                            echo "<tr>";

                            echo "<td class=\"contenido-paises-td\">" . $paisElegido . "</td>";
                            echo "<td class=\"contenido-paises-td\">" . $arrayPaisEleg['capital'] . "</td>";
                            echo "<td class=\"contenido-paises-td\"><img src='$arrayPaisEleg[bandera]' class=\"contenido-paises-img\"></td>";

                            echo "</tr>";
                            echo "</table>";

                            //Para ocultar el select
                            $displaySelect = "none";
                        }
                        ?>
                        <form action="" method="post" style="display: <?php echo $displaySelect ?>">
                            <select name="continente">
                                <option value="Europa">Europa</option>
                                <option value="Asia">Asia</option>
                                <option value="América">América</option>
                                <option value="África">África</option>
                                <option value="Oceanía">Oceanía</option>
                            </select>

                            <input type="submit" name="enviarContinente" value="Enviar continente">
                        </form>
                    </div>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/formularios/continents2.php'>Ver código</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/arrays/srccountries.php'>Ver código src</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>