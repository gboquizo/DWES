<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: contadorVisitas.php
 * @Date: 30/11/18
 * @Description: Permite contar las visitas al sitio realizadas, almacenándolas en una cookie.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
$visitas = 0;
if (isset($_COOKIE['contadorVisitas'])) {
    $visitas = $_COOKIE['contadorVisitas'] + 1;
    setcookie("contadorVisitas", $visitas, time() +300);
} else {
    setcookie("contadorVisitas", 0, time() +300);
}
?>
<section class='principal'>
    <h2>Contador de visitas</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <h3 style='text-align: center'>Ha visitado <?php echo $visitas ?> veces este sitio.</h3>
                </div>
                <div class="botonera">
                    <div>
                        <a href="<?php echo $basepath ?>ejercicios/<?php echo isset($routes[4]) ? "cookies/contadorVisitas" : "" ?>" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='<?php echo $basepath ?>verCodigo?src=ejercicios/cookies/contadorVisitas.php'>Ver
                            código</a>
                    </div>
                </div>
            </div>
    </article>
</section>