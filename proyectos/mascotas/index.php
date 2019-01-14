<?php
/**
 *
 * Ejercicio de objetos, con la clase Perro
 *
 * @author Guillermo Boquizo Sánchez.
 * @copyright  2018-2019
 * @version 1.0
 * @category agenda.php
 * @package  mascotas
 */
?>
<section class='principal'>
    <h2>Mascotas</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <?php
                        require_once 'vendor/autoload.php';
                        use App\Models\Perro;
                        use App\Models\Persona;
                       // require_once 'app/models/Perro.php';
                        //require_once 'app/models/Persona.php';
                        $humano = new Persona("Guillermo", "Boquizo", "Sánchez");
                        $humano->nombre();
                        $humano->saluda();
                        $mascota = new Perro("Laika", "Marrón");
                        $mascota->entrenar();
                        $mascota->darPata();
                        $mascota->entrenar();
                        $mascota->darPata();
                        $mascota->entrenar();
                        $mascota->darPata();
                        $mascota->entrenar();
                        $mascota->darPata();
                        $mascota->entrenar();
                        $mascota->darPata();
                    ?>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../proyectos" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=proyectos/mascotas/index.php'>Ver
                            código</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
