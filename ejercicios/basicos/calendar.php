<?php
include 'srccalendar.php';
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: calendar.php
 * @Date: 28/09/18
 * @Description: Permite mostrar un calendario con los festivos señalados.
 */
$mes = 10; //Mes elegido
$anio = 2018;  //Año elegido
$numeroDias = 31; //Número del mes elegido
$primerDia = 1; //Primer dia del mes.
$dia = 1;
$diaActual = date("j");
$mesActual = date("n");
?>
<section class='principal'>
    <h2>Calendario</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <table style='border: 1px solid; margin: 0 auto'>
                        <tr>
                            <?php foreach ($tabla as $celda) : ?>
                                <th style='border: 	1px solid; font-weight: bold; padding:16px; background-color: crimson;'>
                                    <?php echo $celda; ?>
                                </th>
                            <?php endforeach ?>
                        </tr>
                        <?php while ($dia <= $numeroDias) : ?>
                            <tr>
                                <?php for ($i = 0; $i < 7; $i++) : ?>
                                    <?php if ($dia == $numeroDias + 1) : ?>
                                        <?php break; ?>
                                    <?php elseif ($dia == $diaActual && $mes == $mesActual) : ?>
                                        <td style='border: 1px solid; font-weight: lighter; padding:16px; background-color: #078307'><?php echo $dia++ ?></td>
                                    <?php elseif ($i == 6) : ?>
                                        <td style='border: 1px solid; font-weight: lighter; padding:16px; background-color: #FA0303'><?php echo $dia++ ?></td>
                                    <?php else : ?>
                                        <td style='border: 1px solid; font-weight: lighter; padding:16px; background-color: #FFFFFF'><?php echo $dia++ ?></td>
                                    <?php endif ?>
                                <?php endfor ?>
                            </tr>
                        <?php endwhile ?>
                    </table>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/basicos/calendar.php'>Ver
                            código</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/basicos/srccalendar.php'>Ver
                            código src</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>