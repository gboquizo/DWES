<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: funciones.php
 * @Date: 11/12/18
 * @Description: Página encargada del manejo de algunas funciones.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
function generarMenu()
{
     ?>
    <?php if (isset($_SESSION['perfil']) && $_SESSION['perfil'] == 'admin') : ?>
    <nav>
        <ul class="navigation">
            <li><a id="custom-a" href='index.php'>Inicio</a></li>
            <li><a id="custom-a" href='index.php?page=administracion'>Administración</a></li>
            <li><a id="custom-a" href='index.php?page=cierreSesion'>Cerrar</a></li>
        </ul>
    </nav>
<?php elseif (isset($_SESSION['perfil']) && $_SESSION['perfil'] == 'rol1') : ?>
    <nav>
        <ul class="navigation">
            <li><a id="custom-a" href="index.php?page=rol1">Inicio</a></li>
            <li><a id="custom-a" href="index.php?page=recomendaciones">Recomendaciones</a></li>
            <li><a id="custom-a" href='index.php?page=cierreSesion'>Cerrar</a></li>
        </ul>
    </nav>
<?php else :?>
    <nav>
        <ul class="navigation">
            <li><a id="custom-a" href="index.php">Inicio</a></li>
            <li><a id="custom-a" href="/~qbsagu/ejercicios">Volver al servidor</a></li>
        </ul>
    </nav>
<?php endif ?>

    <?php
}

function redireccionSinoRol1()
{
    if (empty($_SESSION['perfil']) or $_SESSION['perfil'] != 'rol1' or !$_SESSION['aut']) {
        header('Location: index.php?page=cierreSesion');
    }
}

function redireccionSinoAdmin()
{
    if (empty($_SESSION['perfil']) or $_SESSION['perfil'] != 'admin' or !$_SESSION['aut']) {
        header('Location: index.php?page=cierreSesion');
    }

}