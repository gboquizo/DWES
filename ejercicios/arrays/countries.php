<?php
include 'srccountries.php';
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: countries.php
 * @Date: 07/10/18
 * @Description: Muestra los 5 continentes, sus países, las capitales y banderas de éstos.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
?>
<section class='principal'>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <h2 style='text-align: center'>Continentes, países, capitales y banderas</h2>
                    <div class="contenido-paises">
                        <table class="contenido-paises-tabla">
                            <tr>
                                <?php foreach ($tabla as $celda) : ?>
                                    <th class="contenido-paises-th">
                                        <?php echo $celda; ?>
                                    </th>
                                <?php endforeach ?>
                            </tr>
                            <?php foreach ($continentes as $nombreContinente => $continente) : ?>
                                <?php foreach ($continente as $nombrePais => $pais) : ?>
                                    <tr>
                                        <td class="contenido-paises-td">
                                            <?php echo $nombreContinente ?>
                                        </td>
                                        <td class="contenido-paises-td">
                                            <?php echo $nombrePais ?>
                                        </td>
                                        <td class="contenido-paises-td">
                                            <?php echo $pais['capital'] ?>
                                        </td>
                                        <td class="contenido-paises-td">
                                            <img class="contenido-paises-img"
                                                 src="<?php echo $pais['bandera'] ?>">
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/arrays/countries.php'>Ver
                            código</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/arrays/srccountries.php'>Ver
                            código src</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
