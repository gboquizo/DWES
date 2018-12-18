<?php
include 'srcusertype.php';
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: tipoUsuario.php
 * @Date: 28/09/18
 * @Description: Muestra el funcionamiento que permite comprobar y mostrar en función del tipo de usuario
 * realizado en el archivo srcusertype.php
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
$userType = checkUser("user");
$userTypeErr = checkUser("");
?>
<section class='principal'>
    <h2>Perfiles de usuario</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <ul>
                        <?php foreach ($userType as $user) : ?>
                            <?php if ($userType === $userTypeErr) : ?>
                                <h4><?php echo $user ?></h4>
                            <?php else : ?>
                                <li class="userTypeLi">
                                    <a href="#">
                                        <?php echo $user ?>
                                    </a>
                                </li>
                            <?php endif ?>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/basicos/tipoUsuario.php'>Ver
                            código</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/basicos/srcusertype.php'>Ver
                            código src</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>

