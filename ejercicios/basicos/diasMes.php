<?php
include 'srcdaysofmonth.php';
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: diaMes.php
 * @Date: 28/09/18
 * @Description: Muestra el cálculo del total de días del mes realizado en el archivo srcdaysofmonth.php
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
$month = "Febrero";
$year = 2020;
$days = calculateDaysOfMonth($month, $year);
?>
<section class='principal'>
    <h2>Calcular los días del mes</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <h4><?php echo $month ?> del año <?php echo $year ?> tiene <?php echo $days ?> días.</h4>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/basicos/diasMes.php'>Ver
                            código</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/basicos/srcdaysofmonth.php'>Ver
                            código src</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
