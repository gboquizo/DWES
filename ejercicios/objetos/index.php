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
    <h2>Prueba</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <?php
                        require_once 'vendor/autoload.php';
                        use App\Models\Perro;
                        use App\Models\Persona;
                        use App\Models\Contador;
                        use App\Models\Preferencia;
                        Preferencia::init();
                        echo Preferencia::$timezone ."<br>";
                        echo Preferencia::$language."<br>";
                        echo Preferencia::$music."<br>";
                        echo Preferencia::$color."<br>";
                        echo "<br>";
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

                        $c1 = new Contador();
                        $c1->contar();
                        $c1->contar();
                        echo "<br/>Contador 1: " . $c1 . "<br/>";
                        echo "<br/>";
                        $c2 = new Contador();
                        $c2->contar();
                        $c2->contar();
                        $c2->contar();
                        echo "<br/>Contador 2: " . $c2 . "<br/>";

                        echo "<br/>Contador de instancias: " . Contador::contarInstancias(). "<br/>";
                    ?>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver" href='../../verCodigo?src=ejercicios/objetos/index.php'>Ver
                            código</a>
                    </div>
                </div>
            </div>
        </div>
    </article>
</section>
