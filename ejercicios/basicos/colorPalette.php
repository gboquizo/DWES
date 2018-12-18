<?php
include 'srccolorpalette.php';
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: colorPalette.php
 * @Date: 01/10/18
 * @Description: Permite mostrar una paleta de colores.
 */
?>
<section class='principal'>
    <h2>Mostrar paleta de colores</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <?php
                        generateSimpleColorPalette() ?>
                        </br>
                        </br>
                    <?php generateColorPalette()?>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/basicos/colorPalette.php'>Ver
                            código</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/basicos/srccolorpalette.php'>Ver
                            código src</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
