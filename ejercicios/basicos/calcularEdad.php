<?php
include 'srccalculateage.php';
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: calcularEdad.php
 * @Date: 28/09/18
 * @Description: Muestra el cálculo de la edad pasada por el archivo srccalculateage.php
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
$age = calculateAge(21, 2, 1986);
?>
<section class='principal'>
    <h2>Calcular Edad</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <h4>
                        Tienes <?php echo $age ?> años
                    </h4>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/basicos/calcularEdad.php'>Ver
                            código</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/basicos/srccalculateage.php'>Ver
                            código src</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>

