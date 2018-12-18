<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: restaurant.php
 * @Date: 07/10/18
 * @Description: Muestra la carta de un restaurante con menús.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
include 'srcrestaurant.php';
?>
<section class='principal'>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <div>
                        <h2 style="text-align: center">Restaurante</h2>
                        <?php $contador = 0; ?>
                        <table class="contenido-restaurante-tabla">
                            <tr>
                                <?php foreach ($tabla as $celda) : ?>
                                    <th class="restaurante-th">
                                        <?php echo $celda; ?>
                                    </th>
                                <?php endforeach ?>
                            </tr>
                            <?php $contador = 1; ?>
                            <?php for ($i = 0; $i < count($carta["primeros"]); $i++) : ?>
                                <?php for ($j = 0; $j < count($carta["segundos"]); $j++) : ?>
                                    <?php for ($k = 0; $k < count($carta["postres"]); $k++) : ?>
                                        <?php
                                        $precioPrimero = $carta["primeros"][$i]["precio"];
                                        $precioSegundo = $carta["segundos"][$j]["precio"];
                                        $precioPostre = $carta["postres"][$k]["precio"];

                                        $srcFotoPrimeros = $carta["primeros"][$i]["foto"];
                                        $srcFotoSegundos = $carta["segundos"][$j]["foto"];
                                        $srcFotoPostres = $carta["postres"][$k]["foto"];

                                        $total = ($precioPrimero + $precioSegundo + $precioPostre) -
                                            (($precioPrimero + $precioSegundo + $precioPostre) * 0.2);

                                        ?>
                                        <tr>
                                            <td class="restaurante-td">
                                                <?php echo $contador; ?>
                                            </td>

                                            <td class="restaurante-td">
                                                <?php echo $carta["primeros"][$i]["nombre"]; ?>
                                            </td>

                                            <td class="restaurante-td">
                                                <img class="restaurante-img" src=<?php echo $srcFotoPrimeros ?>>
                                            </td>

                                            <td class="restaurante-td">
                                                <?php echo $precioPrimero . "€"; ?>
                                            </td>

                                            <td class="restaurante-td">
                                                <?php echo $carta["segundos"][$j]["nombre"]; ?>
                                            </td>

                                            <td class="restaurante-td">
                                                <img class="restaurante-img" src=<?php echo $srcFotoSegundos ?>>
                                            </td>

                                            <td class="restaurante-td">
                                                <?php echo $precioSegundo . "€" ?>
                                            </td>

                                            <td class="restaurante-td">
                                                <?php echo $carta["postres"][$k]["nombre"] ?>
                                            </td>

                                            <td class="restaurante-td">
                                                <img class="restaurante-img" src=<?php echo $srcFotoPostres ?>>
                                            </td>

                                            <td class="restaurante-td">
                                                <?php echo $precioPostre . "€" ?>
                                            </td>

                                            <td class="restaurante-td-total">
                                                <?php echo $total . "€" ?>
                                            </td>
                                        </tr>
                                        <?php $contador++ ?>
                                    <?php endfor ?>
                                <?php endfor ?>
                            <?php endfor ?>
                        </table>
                    </div>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/arrays/restaurant.php'>Ver
                            código</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/arrays/srcrestaurant.php'>Ver
                            código src</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>