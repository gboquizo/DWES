<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: notas.php
 * @Date: 01/10/18
 * @Description: Muestra las notas de los alumnos de 2º de DAW
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
include 'srcnotas.php';
?>

<section class='principal'>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <h2 style='text-align: center'>Notas de los alumnos</h2>
                    <div style='text-align: center'>
                        <table style='border: 1px solid; margin: 0 auto'>
                            <tr>
                                <?php foreach ($tabla as $celda) : ?>
                                    <th style='border: 	1px solid; font-weight: bold; padding:16px; background-color: crimson;'>
                                        <?php echo $celda ?>
                                    </th>
                                <?php endforeach ?>
                            </tr>
                            <?php foreach ($alumnos as $array => $alumno) : ?>
                                <tr>
                                    <?php foreach ($alumno as $item) : ?>
                                        <td style='border: 1px solid; font-weight: lighter; padding:16px; background-color: #f0f7fa;'>
                                            <?php echo $item ?>
                                        </td>
                                    <?php endforeach ?>
                                </tr>
                            <?php endforeach ?>
                        </table>
                    </div>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/arrays/notas.php'>Ver
                            código</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/arrays/srcnotas.php'>Ver
                            código src</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>