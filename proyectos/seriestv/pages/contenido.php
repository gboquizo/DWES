<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 08/03/2019
 * Time: 14:16
 */
require_once "clases/Series.php";
require_once "funciones.php";
$gestionSeries = new Series();
$seriesAmostrar = $gestionSeries->getSeries();
$errores = "";
$id = $gestionSeries->obtenerIds();
$i = 0;
for ($i = 0; $i < count($id); $i++) {
    if (isset($_POST['valorar' . $id[$i]['id']])) {
        if (!$valoracion->valorarBlog($_SESSION['idUsuario'], $id[$i]['id'], $_POST['select' . $id[$i]['id']])) {
            $errores = '<br/>' . 'No se puede valorar más de una vez la misma serie';
        }
    }
}
?>
<?php if (isset($_POST['busqueda']) and isset ($_POST['buscar']) and $_POST['busqueda'] !== "") :
    $seriesBuscadas = $gestionSeries->getSeriesBuscadas($_POST['busqueda']); ?>
    <table id="tablaBuscarBlogs">
        <?php foreach ($seriesBuscadas as $serie) :
            $idSerie = $serie["id"]; ?>
            <article class="blog">
                <header style="margin: 10px auto;">
                    <div class="date">
                        <?php $creationDate = new DateTime("2019/03/12 09:40"); ?>
                        <time datetime="<?php echo $creationDate->format('c'); ?> ">
                            <?php
                            setlocale(LC_ALL, 'es_ES.UTF-8');
                            echo ucfirst((strftime("%A, %e de %B de %Y, a las %T.",
                                strtotime($creationDate->format('l, F j, Y H:i:s')))))
                            ?>
                        </time>
                    </div>
                    <h2><?php echo $serie["titulo"] ?></h2>
                </header>
                <img src="/~qbsagu/proyectos/seriestv/images/giphy.gif"
                     alt="<?php echo $serie["titulo"] ?> image not found" class="large"/>
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
        <span style="list-style:none;display: inline-block;color: #856F66; font-size:1.2rem; margin-top: 10px;"><?php echo $errores ?></span>
    </table>
<?php endif ?>
<?php if (isset ($_POST['buscar']) and empty($seriesBuscadas)) : ?>
    <h2>No se han encontrado resultados</h2>
<?php endif ?>
<?php include("includes/pages.php"); ?>
<?php if (!isset ($_POST['buscar']) and (isset($_GET['page']) and ($_GET['page']) !== "loginPage" and ($_GET['page']) !== "registro" or !isset($_GET['page']))) : ?>
    <?php foreach ($seriesAmostrar as $serie) :
        $idSerie = $serie["id"]; ?>
        <span style="list-style: none;display: inline-block;color: #856F66; font-size:1.2rem; margin: 0 0 10px 0;"><?php echo $errores ?></span>
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
                <h2><?php echo $serie["titulo"] ?></h2>
            </header>

            <a href="/~qbsagu/proyectos/seriestv/images/giphy.gif" download="<?php echo $serie["image"] ?>">
                <img src="/~qbsagu/proyectos/seriestv/images/giphy.gif" alt="<?php echo $serie["titulo"] ?> image not found"
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
                <?php if (isset($_SESSION['perfil']) && $_SESSION['perfil'] != 'admin' && $_SESSION['perfil'] != 'rol1') : ?>
                    <?php if (isset($_GET['page']) && $_GET['page'] === "rol1") : ?>
                        <form style="margin-top: 10px" action='' method='post'>
                        <label for='select<?php echo $idSerie ?>'>Valorar la serie: </label>
                        <select class="form-control form-control-sm" name='select<?php echo $idSerie ?>'
                                id='select<?php echo $idSerie ?>'>
                            <option name='1'>1</option>
                            <option name='2'>2</option>
                            <option name='3'>3</option>
                            <option name='4'>4</option>
                            <option name='5'>5</option>
                        </select>

                        <button style="margin-top: 10px" type="submit" class="btn btn-primary"
                                name='valorar<?php echo $idSerie ?>' data-toggle="button" aria-pressed="false">
                            Votar
                        </button>
                        <button style="margin-top: 10px" type="submit" class="btn btn-primary" name="top"
                                data-toggle="button" aria-pressed="false">
                            Top
                        </button>
                    <?php endif ?>
                    </form>
                <?php endif ?>
            </footer>
        </article>
    <?php endforeach ?>
<?php endif ?>