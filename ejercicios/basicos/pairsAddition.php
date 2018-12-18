<?php
include 'srcpairsaddition.php';
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: pairsAddition.php
 * @Date: 28/09/18
 * @Description: Muestra el cálculo de la suma de los tres primeros pares realizado en el archivo srcpairsaddition.php
 */
?>
<section class='principal'>
    <h2>Suma los tres primeros números pares</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <h4><?php pairsAddition(); ?></h4>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/basicos/pairsAddition.php'>Ver
                            código</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/basicos/srcpairsaddition.php'>Ver
                            código src</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
