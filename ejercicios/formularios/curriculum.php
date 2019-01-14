<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: curriculum.php
 * @Date: 10/10/18
 * @Description:Muestra un formulario para un currículum vitae.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
error_reporting(5);
?>
<section class='principal'>
    <h2>Curriculum vitae</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <?php
                    if (isset($_POST["enviar"])) {
                        $nombre = "";
                        $apellidos = "";
                        $diaNacimiento = "";
                        $mesNacimiento = $_POST["mes"];
                        $anioNacimiento = "";
                        $sexo = "";
                        $titulos = $_POST["titulos"];
                        $ingles = $_POST["inglés"];
                        $frances = $_POST["francés"];
                        $ciudad = $_POST["ciudad"];
                        $carnet = "";
                        $flagCoche = "";
                        $flagMoto = "";
                        $flagOtros = "";

                        $errorNombre = "";
                        $errorApellidos = "";
                        $errorDia = "";
                        $errorAnio = "";
                        $errorCarnet = "";
                        $errorSexo = "";

                        $flagError = false;

                        if (empty($_POST["nombre"])) {
                            $errorNombre = "El nombre es requerido";
                            $flagError = true;
                        } else {
                            $nombre = clearData($_POST["nombre"]);
                        }

                        if (empty($_POST["apellidos"])) {
                            $errorApellidos = "Los apellidos son requeridos";
                            $flagError = true;
                        } else {
                            $apellidos = clearData($_POST["apellidos"]);
                        }

                        if (empty($_POST["dia"])) {
                            $errorDia = "El día es requerido";
                            $flagError = true;
                        } else {
                            if ($_POST["dia"] <= 0 or $_POST["dia"] > 31) {
                                $errorDia = "El día no es válido";
                                $flagError = true;
                            }
                            $diaNacimiento = clearData($_POST["dia"]);
                        }

                        if (empty($_POST["anio"])) {
                            $errorAnio = "El año es requerido";
                            $flagError = true;
                        } else {
                            if ($_POST["anio"] <= 1936 || $_POST["anio"] > date("Y")) {
                                $errorAnio = "El año no es válido";
                                $flagError = true;
                            }
                            $anioNacimiento = clearData($_POST["anio"]);
                        }

                        if (empty($_POST["sexo"])) {
                            $errorSexo = "El sexo es requerido";
                            $flagError = true;
                        } else {
                            $sexo = clearData($_POST["sexo"]);
                        }

                        if (isset($_POST['inglés']) && $_POST['inglés'] == 'Yes') {
                            $ingles = "Tengo título de inglés.";
                        } else {
                            $ingles = "No tengo título de inglés.";
                        }

                        if (isset($_POST['francés']) && $_POST['francés'] == 'Yes') {
                            $frances = "Tengo título de francés.";
                        } else {
                            $frances = "No tengo título de francés.";
                        }

                        if (empty($_POST["carnet"])) {
                            $errorCarnet = "El carnet es requerido";
                            $flagError = true;
                        } else {
                            $carnet = $_POST["carnet"];

                            if ($carnet[0] === "coche" || $carnet[1] == "coche") {
                                $flagCoche = "selected";
                            }

                            if ($carnet[0] === "moto" || $carnet[1] == "moto") {
                                $flagMoto = "selected";
                            }

                            if ($carnet[0] === "otro" || $carnet[1] == "otro") {
                                $flagOtros = "selected";
                            }
                        }
                    }

                    if (!isset($_POST["enviar"]) || $flagError) {
                        ?>
                        <form action="" method="post">
                            Nombre:
                            <input type="text" name="nombre" value="<?php echo $nombre ?>"><span
                                    class="error">* <?php echo $errorNombre ?></span><br><br>
                            Apellidos:
                            <input type="text" name="apellidos" value="<?php echo $apellidos ?>"><span
                                    class="error">* <?php echo $errorApellidos ?></span><br><br>
                            Fecha de nacimiento:<br>
                            Día:
                            <input type="number" name="dia" value="<?php echo $diaNacimiento ?>"><span
                                    class="error">* <?php echo $errorDia ?></span><br>
                            Mes:
                            <select name="mes">
                                <option value="Enero">Enero</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Septiembre">Septiembre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Diciembre">Diciembre</option>
                            </select><br>
                            Año:
                            <input type="number" name="anio" value="<?php echo $anioNacimiento ?>"
                                   min="1940"
                                   max="<?php echo date("Y") ?>"><span
                                    class="error">* <?php echo $errorAnio ?></span><br><br>
                            Sexo:
                            <input type="radio" name="sexo"
                                   value="Hombre" <?php echo $sexo == "Hombre" ? "checked" : ""; ?>>Hombre
                            <input type="radio" name="sexo"
                                   value="Mujer" <?php echo $sexo == "Mujer" ? "checked" : ""; ?>>Mujer
                            <input type="radio" name="sexo"
                                   value="Otro" <?php echo $sexo == "Otro" ? "checked" : ""; ?>>Otro
                            <span class="error">* <?php echo $errorSexo ?></span><br><br>
                            Inglés:
                            <input type="checkbox" name="inglés"
                                   value="Inglés"<?php echo $ingles == "inglés" ? "checked" : ""; ?>><br><br>
                            Francés:
                            <input type="checkbox" name="francés"
                                   value="Francés"<?php echo $frances == "francés" ? "checked" : ""; ?>><br><br>
                            Ciudad:
                            <select name="ciudad">
                                <option value="Almería">Almería</option>
                                <option value="Cádiz">Cádiz</option>
                                <option value="Córdoba">Córdoba</option>
                                <option value="Granada">Granada</option>
                                <option value="Huelva">Huelva</option>
                                <option value="Jaén">Jaén</option>
                                <option value="Málaga">Málaga</option>
                                <option value="Sevilla">Sevilla</option>
                            </select><br><br>
                            Títulos y experiencias: <br>
                            <textarea name="titulos" cols="30" rows="5"></textarea><br><br>
                            Carnet:
                            <select multiple name="carnet[]" style="height: 70px">
                                <option value="coche" <?php echo $flagCoche ?>>coche</option>
                                <option value="moto" <?php echo $flagMoto ?>>moto</option>
                                <option value="otros vehículos" <?php echo $flagOtros ?>>otros vehículos</option>
                            </select><span class="error">* <?php echo $errorCarnet ?></span><br><br>

                            <input type="submit" name="enviar" value="Enviar">
                            <input type="reset" name="reset" value="Limpiar">
                        </form>
                        <?php
                    } else {
                        echo "<div style='text-align: left; margin: 0 auto;'>";
                        echo "Nombre: " . $nombre . "<br>";
                        echo "Apellidos: " . $apellidos . "<br>";
                        echo "Fecha de nacimiento: " . $diaNacimiento . " de " . $mesNacimiento . " de " . $anioNacimiento . "<br>";
                        echo "Sexo: " . $sexo . "<br>";
                        echo "Ciudad: " . $ciudad . "<br>";
                        echo $ingles . "<br>";
                        echo $frances . "<br>";
                        echo "Títulos y experiencias: " . $titulos . "<br>";
                        echo "Tengo carnet de: " . verCarnet($carnet) . "<br>";
                        echo "</div>";
                    }

                    function verCarnet($a)
                    {
                        $mensaje = "";
                        for ($i = 0; $i < count($a); $i++) {
                            $mensaje = $mensaje . " " . $a[$i];
                        }
                        return $mensaje;
                    }

                    function clearData($data)
                    {
                        $data = trim($data);
                        $data = stripslashes($data);
                        $data = htmlspecialchars($data);
                        return $data;
                    }

                    ?>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/formularios/curriculum.php'>Ver código</a>
                    </div>
                </div>
            </div>

        </div>
    </article>
</section>