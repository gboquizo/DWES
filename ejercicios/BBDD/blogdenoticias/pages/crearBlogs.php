<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
require_once "clases/Blogs.php";

redireccionSinoRedactor();

define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

$gestionBlogs = new Blogs();

$mensajes = "";
$titulo = "";
$blog = "";
$archivo = "";
$tags = "";
$idAutor = 1;
$activo = 1;
$salto = "<br/>";

if (isset($_POST["creacion"])) {

    if (empty($_POST["titulo"]) or strlen($_POST["titulo"]) < 3) {
        $mensajes = "El nombre debe tener una longitud igual o mayor a 3 carácteres.";
        $color = "red";
        $titulo = filter_var(strtolower($_POST['titulo']), FILTER_SANITIZE_STRING);
        $tags = $_POST["tags"];
    } else {
        $comprobarTitulo = $gestionBlogs->getBlog($_POST["titulo"]);
        if ($comprobarTitulo == $_POST["titulo"]) {
            $mensajes = "Ese blog ya existe";
            $color = "red";
        } else {
            $archivo = $_FILES['archivo']['name'];
            if (isset($archivo) && $archivo != "") {

                $tipo = $_FILES['archivo']['type'];
                $tamano = $_FILES['archivo']['size'];
                $temp = $_FILES['archivo']['tmp_name'];

                if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") ||strpos($tipo, "pdf") || strpos($tipo, "bmp") || strpos($tipo, "jpg")
                        || strpos($tipo, "png")) && ($tamano < 100 * MB))) {
                    $mensajes = "Error. La extensión o el tamaño de los archivos no es correcta" . $salto .
                        "- Se permiten archivos .pdf .bmp .gif, .jpg, .png. y de 100MB como máximo.";
                    $color = "red";
                } else {
                    if(isset($archivo) && $tipo == 'application/pdf'){
                        move_uploaded_file ($temp , 'upload/'. $archivo);
                        chmod('upload/' . $archivo, 0777);
                    }

                    if (move_uploaded_file($temp, 'images/' . $archivo)) {
                        chmod('images/' . $archivo, 0777);
                        if ($gestionBlogs->insertarBlog($_POST["titulo"], $_POST["blog"], $archivo, $_POST["tags"], $idAutor, $activo)) {
                            $mensajes = "Blog registrado correctamente";
                            $color = "green";
                        } else {
                            $mensajes = "Error al crear el blog";
                            $color = "red";
                        }

                    } else {

                        $mensajes = "Ocurrió algún error al subir el fichero. No pudo guardarse.";
                        $color = "red";
                    }
                }
            }
        }
    }
}
?>

<h2>Panel de creación de blogs, hola <?php echo $_SESSION["nombreUsuario"] ?></h2>

<form method='post' action='' style="margin: 20px auto" enctype="multipart/form-data">
    <div class="form-group">
        <label for="exampleInputTitulo">Título:</label>
        <input type="text" class="form-control" id="exampleInputTitulo" aria-describedby="titleHelp"
               placeholder="Título" name="titulo" value="<?php echo $titulo ?>"/><br>
        <label for="exampleInputBlog">Blog:</label>
        <textarea rows="3" class="form-control" id="exampleInputBlog" aria-describedby="blogHelp"
                  name="blog" placeholder="Contenido del blog"></textarea><br>
        <label for="exampleInputTags">Tags:</label><br>
        <input type="text" class="form-control" id="exampleInputTags" aria-describedby="tagsHelp"
               placeholder="Tags" name="tags" value="<?php echo $tags ?>"/><br>
        <label for="exampleInputFile">Imagen:</label><br>
        <input type='file' name='archivo' id="exampleInputFile"/>

    </div>
    <div class="form-group">
        <span style="background-color: <?php echo $color ?>; color: white"><?php echo $mensajes ?></span>
    </div>
    <button type="submit" name='creacion' class="btn btn-primary">Crear blog</button>
</form>