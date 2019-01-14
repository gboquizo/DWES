<?php
/**
 * @User Guillermo Boquizo Sánchez
 * @File: tableroJuegoBarcos.php
 * @Date: 03/10/18
 * @Description: Muestra un tablero para jugar al juego de los barcos
 */
include 'srctablero.php';
?>
<section class='principal'>
    <h2>Tablero para el juego de los barcos</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <table style='margin: 0 auto'>
                        <tr>
                            <td></td>
                            <?php for ($i = 0; $i < 10; $i++) : ?>
                                <td style='border: 1px solid; font-weight: bold; padding:16px; background-color: crimson;'><?php echo $i + 1 ?></td>
                            <?php endfor ?>
                        </tr>

                        <?php for ($i = 0; $i < count($letras); $i++) : ?>
                            <tr>
                                <td style='border: 1px solid; font-weight: bold; padding:16px; background-color: crimson;'><?php echo $letras[$i] ?></td>
                                <?php for ($j = 0; $j < 10; $j++) : ?>
                                    <td style='border: 1px solid; font-weight: lighter; padding:16px; background-color: #f0f7fa;'><?php echo $letras[$i] . ($j + 1) ?></td>
                                <?php endfor ?>
                            </tr>
                        <?php endfor ?>
                    </table>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/arrays/tableroJuegoBarcos.php'>Ver
                            código</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/arrays/srctablero.php'>Ver
                            código src</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>