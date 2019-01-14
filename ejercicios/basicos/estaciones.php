<?php
include 'srcseassons.php';
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: estaciones.php
 * @Date: 28/09/18
 * @Description: Muestra el funcionamiento  que carga una u otra imagen según la estación realizado
 *  en el archivo srcseassons.php
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
$imagen = changeSeassonImage();
$estacion = checkSeasson();
?>

<section class='principal'>
    <h2>Estaciones</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <img src="<?php echo $imagen ?>"/>
                    <h4><?php echo $estacion ?></h4>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/basicos/estaciones.php'>Ver
                            código</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/basicos/srcseassons.php'>Ver
                            código src</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>