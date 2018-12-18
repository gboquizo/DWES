<?php
include 'srccalculatebignumber.php';
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: calcularMayor.php
 * @Date: 28/09/18
 * @Description: Muestra el cálculo del mayor de dos números realizado en el archivo srccalculatebignumber.php
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
$number = calculateTheBigger(10, 8);
?>
<section class='principal'>
    <h2>Calcular mayor</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <h4>El número mayor es <?php echo $number ?></h4>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/basicos/calcularMayor.php'>Ver
                            código</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/basicos/srccalculatebignumber.php'>Ver
                            código src</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>