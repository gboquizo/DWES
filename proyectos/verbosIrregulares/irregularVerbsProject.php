<?php
include 'includes/srcirregularverbs.php';
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: irregularVerbsProject.php
 * @Date: 10/10/18
 * @Description:Test de verbos irregulares en inglés.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
// Bandera para detectar errores
$flagErrors = false;

$nVerbos = "";
$nVerbosError = "";

// Validamos tipo de action en el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Validamos cada uno de los campos enviados.
    if (empty($_POST["nVerbos"])) {
        $nVerbosError = "Campo requerido *";
        $flagErrors = true;

    } else {
        $nVerbos = clear_data($_POST['nVerbos']);
    }

// Asignamos la dificultad
    if (isset($_POST['enviar'])) {
        if ($_POST['dificultad'] == "facil") {
            $dificultad = "facil";
            $nHuecos = 3;
        } else if ($_POST['dificultad'] == "normal") {
            $dificultad = "normal";
            $nHuecos = 2;
        } else {
            $dificultad = "dificil";
            $nHuecos = 1;
        }
        $nVerbos = $_POST['nVerbos'];
    }
}

// Declaramos funcion para limpiar codigo
function clear_data($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

/**
 * @param $random
 * @param $nHuecos
 */
function controlarHuecos($random, $nHuecos)
{
    do {
        $posicion = rand(0, 3);
        // Comprobamos que no esta en el array de posiciones aleatorias
        if (!in_array($posicion, $random)) {
            $random[] = $posicion;
            break;
        }
    } while (count($random) != $nHuecos);
}

/**
 * @param $random
 * @param $verbos
 * @param $indiceVerboAleatorio
 * @param $arrayAleatorio
 * @return mixed
 */
function rellenarArrayVerbos($random, $verbos, $indiceVerboAleatorio, $arrayAleatorio)
{
// Rellenamos el array aleatorio con el verbo aleatorio o espacios en blanco
    for ($p = 0; $p < 4; $p++) {
        // Comprobamos que esta en el array
        if (in_array($p, $random)) {
            $arrayAleatorio[$indiceVerboAleatorio][$p] = $verbos[$indiceVerboAleatorio][$p];
        } else
            $arrayAleatorio[$indiceVerboAleatorio][$p] = "";
    }
    return $arrayAleatorio;
}

?>
<section class='principal'>
    <h2>Proyecto de verbos irregulares</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <div style='display:flex; text-align: center;'>
                        <!--Si clicamos enviar, o hay algún error, y además no se ha clicado en comprobar-->
                        <?php if ((!isset($_POST['enviar']) || $flagErrors) && !isset($_POST['comprobar'])) : ?>
                            <form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" method="post">
                                <label for="Dificultad">Dificultad</label>
                                <select name="dificultad">
                                    <option value="facil">Fácil</option>
                                    <option value="normal">Normal</option>
                                    <option value="dificil">Difícil</option>
                                </select>
                                <br/><br/>
                                <label for="Numero de verbos">Número de verbos elegido</label>
                                <input type="number" min="1" max="<?php echo count($verbos); ?>" name="nVerbos">
                                <span class="error"><?php echo $nVerbosError; ?></span><br><br>
                                <br/><br/>
                                <input type="submit" name="enviar" value="Enviar">
                                <input type="reset" value="Resetear">
                            </form>
                        <?php endif ?>

                        <?php
                        if (isset($_POST['enviar']) && !$flagErrors && !isset($_POST['comprobar'])) : ?>
                            <form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" method="post">
                                <table style='border: 1px solid; margin: 0 auto;'>
                                    <tr>
                                        <?php foreach ($tabla as $celda) : ?>
                                            <th class="contenido-paises-th">
                                                <?php echo $celda; ?>
                                            </th>
                                        <?php endforeach ?>
                                    </tr>
                                    <?php
                                    // Array aleatorio a partir del array de verbos
                                    $arrayAleatorio = [];
                                    // Sacamos el numero de verbos pedido por el usuario
                                    for ($i = 0; $i < $nVerbos; $i++) {
                                        // Sacamos los verbos aleatoriamente comprobando que se encuentran en el array de verbos
                                        do {
                                            $indiceVerboAleatorio = rand(0, count($verbos) - 1); // Primer indice del verbo aleatorio
                                            if (!in_array($verbos[$indiceVerboAleatorio], $arrayAleatorio)) { // Si no esta en el array, repetimos
                                                $random = []; // Array de aleatorios entre 0 y 3
                                                for ($j = 0; $j < $nHuecos; $j++) {
                                                    $posicion = 0;
                                                    do {
                                                        $posicion = rand(0, 3);
                                                        // Si esta en el array de aleatorios del 0 al 3
                                                        if (!in_array($posicion, $random)) {
                                                            $random[] = $posicion;
                                                            break;
                                                        }
                                                    } while (count($random) != $nHuecos); // Mientras los huecos no sean igual a la dificultad asignada
                                                    $arrayAleatorio = rellenarArrayVerbos($random, $verbos, $indiceVerboAleatorio, $arrayAleatorio);
                                                }
                                                break;
                                            }
                                        } while (count($arrayAleatorio) < $nVerbos);
                                    }

                                    // Recorremos el array de verbos
                                    foreach ($arrayAleatorio as $key => $value) {
                                        for ($j = 0; $j < $nHuecos; $j++) {
                                            // Array de posiciones aleatorias
                                            $random = [];
                                            $posicion = 0;
                                            // Sacamos una posicion aleatoria
                                            controlarHuecos($random, $nHuecos);
                                        }

                                        echo "<tr>";
                                        foreach ($value as $indice => $val) {
                                            if (strtolower($val) == strtolower($verbos[$key][$indice])) {
                                                echo "
                                                    <td>
                                                        <input 
                                                            type=\"text\" name=\"valores[" . $key . "][" . $indice . "]\" 
                                                            readonly=\"readonly\" 
                                                            style='margin:0 auto;text-align:center; color:green' 
                                                            value=" . strtolower($val) . ">
                                                    </td>";
                                            } else {
                                                echo "
                                                    <td>
                                                        <input 
                                                        type=\"text\" name=\"valores[" . $key . "][" . $indice . "]\" 
                                                        style='margin:0 auto;text-align:center; color:blue' 
                                                        value=" . strtolower($val) . " >
                                                    </td>";
                                            }
                                        }
                                        echo "</tr>";
                                    }
                                    ?>
                                </table>
                                <br/><br/>
                                <input type="submit" name="comprobar" value="Comprobar">
                            </form>
                        <?php endif ?>
                        <?php if (isset($_POST['comprobar'])) : ?>
                            <form action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>" method="post">
                                <table border="2">
                                    <tr>
                                        <?php foreach ($tabla as $celda) : ?>
                                            <th class="restaurante-th">
                                                <?php echo $celda; ?>
                                            </th>
                                        <?php endforeach ?>
                                    </tr>
                                    <?php foreach ($_POST['valores'] as $key => $value) : ?>
                                        <tr>
                                            <?php foreach ($value as $indice => $val) : ?>
                                                <?php if (strtolower($val) == strtolower($verbos[$key][$indice])) : ?>
                                                    <td style='border: 1px solid; font-weight: lighter; padding:12px; background-color:rgba(19,255,20,0.69)'>
                                                        <input style='margin:0 auto;text-align:center; color:green; font-weight: lighter; padding:8px;'
                                                               type="text"
                                                               name="valores[<?php echo $key ?>][<?php echo $indice ?>]"
                                                               readonly=readonly
                                                               value="<?php echo strtolower($val) ?>"
                                                        </input>
                                                    </td>
                                                <?php else : ?>
                                                    <td style='border: 1px solid; font-weight: lighter; padding:12px; background-color:rgba(255,9,3,0.61)'>
                                                        <input type="text"
                                                               name="valores[<?php echo $key ?>][<?php echo $indice ?>]"
                                                               style='margin:0 auto;text-align:center; color:red'
                                                               value="<?php echo strtolower($val) ?>"
                                                        </input>
                                                    </td>
                                                <?php endif ?>
                                            <?php endforeach ?>
                                        </tr>
                                    <?php endforeach ?>
                                </table>
                                <br/><br/>
                                <input type="submit" name="comprobar" value="Comprobar">
                            </form>
                        <?php endif ?>
                    </div>
                </div>
                <div class="botonera">
                    <div>
                        <a href="<?php echo $basepath ?>proyectos/<?php echo isset($routes[4]) ? "verbosIrregulares/irregularVerbsProject" : "" ?>" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='<?php echo $basepath ?>verCodigo?src=proyectos/verbosIrregulares/irregularVerbsProject.php'>Ver
                            código</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='<?php echo $basepath ?>verCodigo?src=proyectos/verbosIrregulares/includes/srcirregularverbs.php'>Ver
                            código src</a>
                    </div>
                </div>
            </div>
    </article>
</section>