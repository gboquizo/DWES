<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: cookie.php
 * @Date: 15/10/18
 * @Description:crea la primera cookie y la muestra.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
?>
<section class='principal'>
    <h2>Crear cookie</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <?php
                        $value = "Mi primera cookie, Hola mundo";
                        if (isset($_COOKIE['cookie1'])) {
                            echo "Tengo creada la cookie: " . $_COOKIE['cookie1'];
                        } else {
                            echo "Aún no hay cookies, voy a crear la cookie: " . $value;
                            setcookie("cookie1", $value, time() + 20, "../../ejercicios/cookies/cookie.php", "");
                        }
                    ?>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/cookies/cookie.php'>Ver
                            código</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/cookies/includes/srclogincookies.php'>Ver
                            código src</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>