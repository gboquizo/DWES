<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: .php
 * @Date: 30/10/18
 * @Description:
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
?>
<section class='principal'>
    <h2></h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">

                </div>
                <div class="botonera">
                    <div>
                        <a href="<?php echo $basepath ?>ejercicios/<?php echo isset($routes[4]) ? "sesiones/autentificacion" : "" ?>" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='<?php echo $basepath ?>verCodigo?src=ejercicios/sesiones/autentificacion.php'>Ver
                            código</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>