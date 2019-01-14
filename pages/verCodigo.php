<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: verCodigo.php
 * @Date: 28/09/18
 * @Description: Muestra el código de un archivo recibido por GET desde la URL.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
$url = htmlspecialchars($_SERVER['HTTP_REFERER']);
$previous = "javascript:history.go(-2)";
if (isset($_SERVER['HTTP_REFERER'])) {
  $previous = $_SERVER['HTTP_REFERER'];
}
?>
<?php if (isset($_GET['src'])) : ?>
    <section class='principal'>
        <h2>Ver código</h2>
        <article class='articulo'>
            <div class="contenedor-ejercicios">
                <div class="contenidoEjercicio">
                    <div class="ejercicio white">
                        <?php highlight_file($_GET['src']); ?>
                    </div>
                    <div class="botonera">
                        <div>
                            <a href="<?php echo $previous ?>" class="btnVolver">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </article>
    </section>
<?php else : ?>
    <?php header("Location: http:\\localhost"); ?>
    </br></br><a href=><?php echo $url ?>Volver</a>
<?php endif ?>