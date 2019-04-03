<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: index.php
 * @Date: 11/12/18
 * @Description: Index general del sitio.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
require_once "funciones.php";
ob_start();
session_start();
?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <?php include("includes/header.php"); ?>
    </head>
    <body>
    <section id="wrapper">
        <header id="header">
            <div class="top">
                <?php generarMenu(); ?>
            </div>
            <hgroup>
                <h2><a href="#">Blog de noticias</a></h2>
                <h3><a id="custom-a" href="#">Práctica de clase</a></h3>
            </hgroup>
        </header>
        <section class="main-col">
            <?php include("pages/contenido.php"); ?>

        </section>
        <aside class="sidebar">
            <div>
            <form name="formulario" action="" method="POST" class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" name="busqueda" placeholder="Buscar blog" aria-label="Search">
                <button style="margin-top:20px" class="btn btn-outline-success my-3 my-sm-3" name="buscar" value="Buscar" type="submit">Buscar</button>
                <button style="margin-left:10px" class="btn btn-outline-success my-3 my-sm-3" name="top" type="submit">Top</button>
            </form>

            </div>
            <?php if (empty($_SESSION["aut"])) include("includes/login.php"); ?>
        </aside>
        <div id="footer">
            <?php include("includes/footer.php"); ?>
        </div>
    </section>
    </body>
    </html>
<?php
ob_end_flush();
?>