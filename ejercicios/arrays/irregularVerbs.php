<?php
include 'srcirregularverbs.php';
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: irregularVerbs.php
 * @Date: 07/10/18
 * @Description: Muestra la lista completa de verbos irregulares en inglés
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
?>
<section class='principal'>
    <h2></h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <h2 style='text-align: center'>Lista de verbos irregulares</h2>
                    <div style='text-align: center'>
                        <table style='border: 1px solid; margin: 0 auto'>
                            <tr>
                                <?php foreach ($tabla as $celda) : ?>
                                    <th style='border: 	1px solid; font-weight: bold; padding:16px; background-color: crimson;'>
                                        <?php echo $celda; ?>
                                    </th>
                                <?php endforeach ?>
                            </tr>
                            <?php foreach ($verbos as $array => $verbo) : ?>
                                <tr>
                                    <?php foreach ($verbo as $item) : ?>
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
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/arrays/irregularVerbs.php'>Ver
                            código</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/arrays/srcirregularverbs.php'>Ver
                            código src</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>