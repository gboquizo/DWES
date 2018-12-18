<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: index.php
 * @Date: 10/11/18
 * @Description: Index general del sitio.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
ob_start();
?>
<?php include("includes/router.php"); ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <?php include("includes/header.php"); ?>
    </head>
    <body>
    <div class="web">
        <div class="header">
            <h1>Desarrollo Web en Entorno Servidor</h1>
        </div>
        <div class="nav">
            <?php include("includes/nav.php"); ?>
        </div>
        <main class="contenido">
            <?php include("pages.php"); ?>
        </main>
        <footer class="footer">
            <?php include("includes/footer.php"); ?>
        </footer>
    </div>
    </body>
    </html>
<?php
ob_end_flush();
?>