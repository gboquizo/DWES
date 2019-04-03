<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 08/03/2019
 * Time: 9:54
 */
require_once "clases/Series.php";
require_once "clases/Usuarios.php";

redireccionSinoRol1();

$usuario = new Usuarios;
$serie = new Series();
$id = $usuario->getUsuariosPerfil($_SESSION['idUsuario']);
$seriesFavoritas = $serie->getSeriesRecomendadas($id);?>
<h2 style="margin-bottom: 10px">Estás en series recomendadas, <?php echo $_SESSION["nombreUsuario"] ?></h2>
<?php foreach ($seriesFavoritas as $serie) :?>
<span style="display: inline-block;color: #856F66; font-size:1.2rem; margin: 0 0 10px 0;"><?php echo $errores ?></span>
<article class="blog">
    <header style="margin: 10px auto;">
        <div class="date">
            <?php $creationDate = new DateTime("2019/03/12 09:40"); ?>
            <time datetime="<?php echo $creationDate->format('c'); ?> ">
                <?php
                setlocale(LC_ALL, 'es_ES.UTF-8');
                echo ucfirst((strftime("%A, %e de %B de %Y, a las %T.", strtotime($creationDate->format('l, F j, Y H:i:s'))))) ?>
            </time>
        </div>
        <h2>Serie favorita:  <?php echo $serie["titulo"] ?></h2>
    </header>

    <a href="images/beach.jpg" download="<?php echo $serie["image"] ?>">
        <img src="images/beach.jpg" alt="<?php echo $serie["titulo"] ?> image not found"
             class="large"/>
    </a>
    <div class="snippet">
        <?php $contenido = "Lorem ipsum dolor sit 
                amet consectetur adipiscing elit tincidunt congue, 
                taciti dictum mus semper penatibus dictumst maecenas proin nulla, 
                 nascetur duis fermentum aliquam cum lobortis habitant. 
                  ultrices per sociosqu purus aliquam vehicula ac, luctus dignissim suscipit 
                  ridiculus neque. Penatibus imperdiet id congue inceptos dui rutrum non lobortis 
                  ligula leo, commodo venenatis justo porttitor sollicitudin condimentum conubia ad maecenas.
                  Condimentum urna enim suscipit ante velit phasellus commodo blandit, facilisis penatibus ad bibendum vestibulum eu 
                  elementum, cum hac ornare mattis montes semper dictumst. Ridiculus fusce leo facilisis a non imperdiet suspendisse 
                  mauris integer, consequat litora eu nam lacinia metus phasellus. Diam quis augue hendrerit primis mollis, 
                  varius convallis aliquet vulputate molestie integer, neque orci cras velit." ?>
        <p><?php echo substr($contenido, 0, 1000) ?></p>
    </div>
    <footer class="meta">
        <p><?php echo $serie["titulo"] ?></p>
    </footer>
</article>
<?php endforeach ?>
<hr style="height:3px; border:none; color:rgb(60,90,180); background-color:rgb(60,90,180);">
