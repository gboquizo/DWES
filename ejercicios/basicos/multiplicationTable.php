<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: multiplicationTable.php
 * @Date: 28/09/18
 * @Description: Muestra el cálculo de la tabla de multiplicar.
 */
?>

<section class='principal'>
    <h2>Tabla de multiplicar</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <?php for ($i = 1; $i <= 10; $i++) : ?>
                        <div>
                            <h4><?php echo "Tabla del " . $i ?></h4>
                            <?php for ($j = 0; $j <= 10; $j++) : ?>
                                <?php $result = $j * $i ?>
                                <p><?php echo $i . " x " . $j . " = " . $result ?></p>
                            <?php endfor ?>
                            </br>
                        </div>
                    <?php endfor ?>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/basicos/multiplicationTable.php'>Ver código</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>