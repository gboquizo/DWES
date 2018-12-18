<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: nav.php
 * @Date: 10/11/18
 * @Description: Define el nav general del sitio.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
?>
<nav class="nav-icon">
    <a href="/../../~qbsagu">
        <i id="nav-inicio" class="fab fa-fort-awesome fa-3x icon" title="Inicio"></i>
    </a>
    <a href="/../../~qbsagu/ejercicios">
        <i id="nav-exercises" class="fas fa-code fa-3x icon <?php echo $routes[1] == "ejercicios" ? "activo" : "" ?>"
           title="Ejercicios"></i>
    </a>
    <a href="/../../~qbsagu/proyectos">
        <i id="nav-projects" class="fa fa-tasks fa-3x icon <?php echo $routes[1] == "proyectos" ? "activo" : "" ?>"
           title="Proyectos"></i>
    </a>
    <a href="https://programandodesdeitaca.animeomega.es/sobre-mi/" target="blank">
        <i id="nav-about" class="fa fa-info-circle fa-3x icon" title="Acerca de"></i>
    </a>
    <a href="https://programandodesdeitaca.animeomega.es/contacto/" target="blank">
        <i id="nav-contact" class="fa fa-phone fa-3x icon" title="Contacto"></i>
    </a>
</nav>
<?php include("includes/social-media.php") ?>
