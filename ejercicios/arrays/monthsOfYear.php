<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: monthsOfYear.php
 * @Date: 01/10/18
 * @Description: Muestra los meses del año.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
include 'srcmonths.php';
?>
<section class='principal'>
    <h2>Meses del año</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <div style='text-align: center'>
                        <table style='border: 1px solid; margin: 0 auto'>
                            <tr style='text-align: center'>
                                <?php foreach ($tabla as $celda) : ?>
                                    <td style='border: 	1px solid; font-weight: bold; padding:16px; background-color: crimson;'>
                                        <?php
                                        echo $celda
                                        ?>
                                    </td>
                                <?php endforeach ?>
                            </tr>
                            <tr>
                                <?php foreach ($meses

                                as $mes) : ?>
                            <tr>
                                <td style='text-align: center; border: 1px solid; font-weight: lighter; padding:16px; background-color: #f0f7fa;'>
                                    <?php echo $mes ?>
                                </td>
                                <?php endforeach ?>
                            </tr>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/arrays/monthsOfYear.php'>Ver
                            código</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/arrays/srcmonths.php'>Ver
                            código src</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>


