<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: footer.php
 * @Date: 11/12/18
 * @Description: Define el footer del examen.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
?>
<div class="footer-copyright">
    <p>Guillermo Boquizo Sánchez - DWES 2º DAW IES Gran Capitán</p>
    <p>Examen de Diciembre</p>
    <div>
        <img src="/~qbsagu/images/cc.png" alt="Licencia de Creative Commons">
        <p>Esta obra está bajo una
            <a class="cool-link" rel="license" href="http://creativecommons.org/licenses/by-sa/4.0/">
                licencia de Creative Commons Reconocimiento-CompartirIgual 4.0 Internacional.
            </a>
        </p>
    </div>
    <?php if ($routes[1] === "ejercicios" && isset($routes[3]) && $routes[3] === "buscaminas") : ?>
        <div>
            <p>Iconos diseñados por
                <a class="cool-link" href="https://www.flaticon.es/autores/twitter" title="Twitter" target="blank">
                    Twitter
                </a> desde
                <a class="cool-link" href="https://www.flaticon.es/" title="Flaticon"
                   target="blank">www.flaticon.com
                </a> con licencia
                <a class="cool-link" href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0"
                   target="blank">CC 3.0 BY
                </a>
            </p>
        </div>
        <div>
            <p>Iconos diseñados por
                <a class="cool-link" href="https://www.flaticon.es/autores/creaticca-creative-agency"
                   title="Creaticca Creative Agency" target="blank">Creaticca Creative Agency
                </a> desde
                <a class="cool-link" href="https://www.flaticon.es/" title="Flaticon" target="blank">
                    www.flaticon.com
                </a> con licencia
                <a class="cool-link" href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0"
                   target="blank">CC 3.0 BY
                </a>
            </p>
        </div>
    <?php endif ?>
</div>
<div class="social-icon">
    <a href="https://www.facebook.com/guillermo.boquizosanchez" target="blank">
        <i id="social-fb" class="fab fa-facebook-square fa-3x icon" title="Facebook"></i>
    </a>
    <a href="https://twitter.com/chekke26" target="blank">
        <i id="social-tw" class="fab fa-twitter-square fa-3x icon" title="Twitter"></i>
    </a>
    <a href="https://www.linkedin.com/in/guillermo-boquizo-s%C3%A1nchez-26152b2b/" target="blank">
        <i id="social-li" class="fab fa-linkedin fa-3x icon " title="LinkedIn"></i>
    </a>
    <a href="https://github.com/gboquizo" target="blank">
        <i id="social-gh" class="fab fa-github-square fa-3x icon" title="GitHub"></i></a>
    <a href="mailto:guillermoboquizosanchez@gmail.com?Subject=Hola%20de%20nuevo" title="Enviar correo"
       target="blank">
        <i id="social-em" class="fas fa-envelope-square fa-3x icon"></i>
    </a>
</div>
