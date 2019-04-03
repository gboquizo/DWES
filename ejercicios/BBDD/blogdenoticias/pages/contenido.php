<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 08/03/2019
 * Time: 14:16
 */
require_once "clases/Blogs.php";
require_once "clases/Valoracion.php";
require_once "funciones.php";
$gestionBlogs = new Blogs();
$valoracion = new Valoracion();
$blogsAMostrar = $gestionBlogs->getBlogsActivos();
$errores = "";
$id = $gestionBlogs->obtenerIds();
$i = 0;
for($i = 0; $i < count($id); $i++) {
    if(isset($_POST['valorar'.$id[$i]['id']])){
        if(!$valoracion->valorarBlog($_SESSION['idUsuario'],$id[$i]['id'],$_POST['select'.$id[$i]['id']])){
            $errores= '<br/>' .'No se puede valorar más de una vez el mismo blog';
        }
    }
}
if(isset($_POST['top'])){
    $blogsAMostrar = $valoracion->getMejoresBlog();
    header("Location: index.php?page=recomendaciones");
}
?>
<?php if (isset($_POST['busqueda']) and isset ($_POST['buscar']) and $_POST['busqueda'] !== "") :
    $blogsBuscados = $gestionBlogs->getBlogsBuscados($_POST['busqueda']); ?>
    <table id="tablaBuscarBlogs">
        <?php foreach ($blogsBuscados as $blog) :
            $idBlog = $blog["id"]; ?>
            <article class="blog">
                <header style="margin: 10px auto;">
                    <div class="date">
                        <?php $creationDate = new DateTime($blog["created"]); ?>
                        <time datetime="<?php echo $creationDate->format('c'); ?> ">
                            <?php
                            setlocale(LC_ALL,'es_ES.UTF-8');
                            echo ucfirst((strftime("%A, %e de %B de %Y, a las %T.",
                                strtotime( $creationDate->format('l, F j, Y H:i:s')))))
                            ?>
                        </time></div>
                </header>
                <img src="images/<?php echo $blog["image"] ?>"
                     alt="<?php echo $blog["title"] ?> image not found" class="large"/>
                <div class="snippet">
                    <p><?php echo substr($blog["blog"], 0, 1000) ?></p>
                </div>
                <footer class="meta">
                    <p><?php echo $blog["tags"] ?></p>
                    <p style="margin-top: 20px">Valoración media del blog: <?php echo $valoracion->getPuntuacionMedia($idBlog)[0]['ROUND(AVG(val),2)'] ?></p>
                    <?php if (isset($_SESSION['perfil']) && $_SESSION['perfil'] != 'Administrador' && $_SESSION['perfil'] != 'Redactor') : ?>
                        <!--                                    <div class="star-rating">-->
                        <!--                                        <a class="star" href="#">&#9733;</a>-->
                        <!--                                        <a href="#">&#9733;</a>-->
                        <!--                                        <a href="#">&#9733;</a>-->
                        <!--                                        <a href="#">&#9733;</a>-->
                        <!--                                        <a href="#">&#9733;</a>-->
                        <!--                                    </div>-->

                        <form style="margin-top: 10px" action='' method='post'>
                            <label for='select<?php echo $idBlog ?>'>Valorar el blog: </label>
                            <select class="form-control form-control-sm" name='select<?php echo $idBlog ?>' id='select<?php echo $idBlog ?>'>
                                <option name='1'>1</option>
                                <option name='2'>2</option>
                                <option name='3'>3</option>
                                <option name='4'>4</option>
                                <option name='5'>5</option>
                            </select>
                            <button style="margin-top: 10px" type="submit" class="btn btn-primary" name='valorar<?php echo $idBlog ?>' data-toggle="button" aria-pressed="false" autocomplete="off">
                                Votar
                            </button>
                            <button style="margin-top: 10px" type="submit" class="btn btn-primary" name="top" data-toggle="button" aria-pressed="false">
                                Top
                            </button>
                        </form>
                    <?php else : ?>
                        <p>Regístrate como lector para valorar este blog</p>
                    <?php endif ?>
                </footer>
            </article>
        <?php endforeach ?>
        <span style="display: inline-block;color: #856F66; font-size:1.2rem; margin-top: 10px;"><?php echo $errores ?></span>
    </table>
<?php endif ?>
            <?php if (isset ($_POST['buscar']) and empty($blogsBuscados)) : ?>
    <h2>No se han encontrado resultados</h2>
<?php endif ?>
            <?php include("includes/pages.php"); ?>
            <?php if (!isset ($_POST['buscar']) and (isset($_GET['page']) and ($_GET['page']) !== "loginPage" and ($_GET['page']) !== "registro" or !isset($_GET['page']))) : ?>
    <span style="display: inline-block;color: #856F66; font-size:1.2rem; margin: 0 0 10px 0;"><?php echo $errores ?></span>
    <?php foreach ($blogsAMostrar as $blog) :
        $idBlog = $blog["id"]; ?>
        <article class="blog">
            <header style="margin: 10px auto;">
                <div class="date">
                    <?php $creationDate = new DateTime($blog["created"]); ?>
                    <time datetime="<?php echo $creationDate->format('c'); ?> ">
                        <?php
                        setlocale(LC_ALL,'es_ES.UTF-8');
                        echo ucfirst((strftime("%A, %e de %B de %Y, a las %T.", strtotime( $creationDate->format('l, F j, Y H:i:s'))))) ?>
                    </time></div>
                <h2><?php echo $blog["title"] ?></h2>
            </header>

            <a href="images/<?php echo $blog["image"] ?>" download="<?php echo $blog["image"] ?>">
                <img src="images/<?php echo $blog["image"] ?>" alt="<?php echo $blog["title"] ?> image not found" class="large" />
            </a>
            <div class="snippet">
                <p><?php echo substr($blog["blog"], 0, 1000) ?></p>
            </div>
            <footer class="meta">
                <p><?php echo $blog["tags"] ?></p>
                <p style="margin-top: 20px">Valoración media del blog: <?php echo $valoracion->getPuntuacionMedia($idBlog)[0]['ROUND(AVG(val),2)'] ?></p>
                <?php if (isset($_SESSION['perfil']) && $_SESSION['perfil'] != 'Administrador' && $_SESSION['perfil'] != 'Redactor') : ?>
                    <!--                                    <div class="star-rating">-->
                    <!--                                        <a class="star" href="#">&#9733;</a>-->
                    <!--                                        <a href="#">&#9733;</a>-->
                    <!--                                        <a href="#">&#9733;</a>-->
                    <!--                                        <a href="#">&#9733;</a>-->
                    <!--                                        <a href="#">&#9733;</a>-->
                    <!--                                    </div>-->
                    <?php if (isset($_GET['page']) && $_GET['page'] === "lector") : ?>
                    <form style="margin-top: 10px" action='' method='post'>
                        <label for='select<?php echo $idBlog ?>'>Valorar el blog: </label>
                        <select class="form-control form-control-sm" name='select<?php echo $idBlog ?>' id='select<?php echo $idBlog ?>'>
                            <option name='1'>1</option>
                            <option name='2'>2</option>
                            <option name='3'>3</option>
                            <option name='4'>4</option>
                            <option name='5'>5</option>
                        </select>

                        <button style="margin-top: 10px" type="submit" class="btn btn-primary" name='valorar<?php echo $idBlog ?>' data-toggle="button" aria-pressed="false">
                            Votar
                        </button>
                        <button style="margin-top: 10px" type="submit" class="btn btn-primary" name="top" data-toggle="button" aria-pressed="false">
                            Top
                        </button>
                        <?php endif ?>
                    </form>

                <?php else : ?>
                    <p>Regístrate como lector para valorar este blog</p>
                <?php endif ?>
            </footer>
        </article>
    <?php endforeach ?>
<?php endif ?>