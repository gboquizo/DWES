<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: buscaminas.php
 * @Date: 31/10/18
 * @Description: Permite jugar al buscaminas, en un tablero generado con números y minas en posiciones aleatorias.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
?>
<section class='principal'>
    <h2>Buscaminas</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <?php include('includes/srcbuscaminas.php')?>
                    <div class="buscaminas" id="buscaminas">
                        <?php for ($fila = 0; $fila < NFILAS; $fila++) : ?>
                            <?php for ($columna = 0; $columna < NCOLUMNAS; $columna++) : ?>
                                <?php if ($_SESSION["visible"][$fila][$columna] == 1) :
                                    $valor = $_SESSION["tablero"][$fila][$columna] ?>
                                    <img src=/~qbsagu/ejercicios/sesiones/images/buscaminas/<?php echo $valor ?>.png>
                                <?php elseif (comprobarGanador() == true) :
                                    $valor = $_SESSION["tablero"][$fila][$columna] ?>
                                    <img src=/~qbsagu/ejercicios/sesiones/images/buscaminas/<?php echo $valor ?>.png>
                                <?php elseif ($_SESSION['gameover']) :
                                    mostrarBombas() ?>
                                    <img src=/~qbsagu/ejercicios/sesiones/images/buscaminas/cuadrado.png>
                                <?php else : ?>
                                    <a href="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]); ?>/<?php echo $fila ?>/<?php echo $columna ?>">
                                        <img src=/~qbsagu/ejercicios/sesiones/images/buscaminas/cuadrado.png></a>
                                <?php endif ?>
                            <?php endfor ?>
                            <br/>
                        <?php endfor ?>
                        <?php if ($_SESSION['gameover']) : ?>
                            <div style='text-align: center'>
                                <h5>Mina encontrada, has perdido.</h5>
                                <form action="/~qbsagu/ejercicios/sesiones/cerrarsession.php" method="post">
                                    <input class="btnVolver" type="submit" name="cierre" value="Reiniciar">
                                </form>
                            </div>
                        <?php elseif (comprobarGanador() == true) : ?>
                            <div style='text-align: center'>
                                <h5>Has ganado.</h5>
                                <form action="/~qbsagu/ejercicios/sesiones/cerrarsession.php" method="post">
                                    <input class="btnVolver" type="submit" name="cierre" value="Nueva partida">
                                </form>
                            </div>
                        <?php else : ?>
                            <div style='text-align: center'>
                                <form action="/~qbsagu/ejercicios/sesiones/cerrarsession.php" method="post">
                                    <input class="btnVolver" type="submit" name="cierre" value="Nueva partida">
                                </form>
                            </div>
                        <?php endif ?>

                    </div>

                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/sesiones/buscaminas.php'>Ver
                            código</a>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/sesiones/includes/srcbuscaminas.php'>Ver
                            código src</a>
                    </div>

                </div>
            </div>
        </div>
    </article>
</section>