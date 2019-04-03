<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: administracion.php
 * Date: 11/12/18
 * @Description: Página de administración para el administrador del sitio.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */

require_once "clases/Usuarios.php";

redireccionSinoAdmin();

$gestionUsuarios = new Usuarios();
$usuarios = $gestionUsuarios->getUsuariosNoValidados();
$usuariosValidados = $gestionUsuarios->getUsuariosValidados();

if (isset($_POST["cancelar"])) {
    header("Location: index.php?page=administracion");
}

if (isset($_POST["validar"])) {

    foreach ($_POST as $nombreCampo => $valor) {
        if ($valor != "Validar" and $valor != "Cancelar") {
            $gestionUsuarios->validarUsuario($nombreCampo);
            header("Location: index.php?page=administracion");
        }
    }
}
if (isset($_POST["desactivar"])) {
    foreach ($_POST as $nombreCampo => $valor) {
        if ($valor != "Validar" and $valor != "Cancelar") {
            $gestionUsuarios->desactivarUsuarios($nombreCampo);
            header("Location: index.php?page=administracion");
        }
    }
}

if (isset($_POST["validarTodos"])) {
    $gestionUsuarios->validarTodos();
    header("Location: index.php?page=administracion");
}

if (isset($_POST["desvalidarTodos"])) {
    $gestionUsuarios->desvalidarTodos();
    header("Location: index.php?page=administracion");
}

?>

<?php if (isset($_POST["cerrarSesion"])) :
    session_unset();
    session_destroy();
    session_regenerate_id(true);
    session_start();
    header("Location:index.php"); ?>
<?php endif ?>
<h2>Panel de administración, hola <?php echo $_SESSION["nombreUsuario"] ?></h2>

<div style="margin: 20px auto;">
    <table class="table" id="tablaValidarUsuarios">
        <thead>
        <h3>Usuarios pendientes de validación</h3>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Pass</th>
            <th scope="col">Perfil</th>
            <th scope="col">Estado</th>
            <th><input type="checkbox" id="selectall2"></th>
        </tr>
        </thead>
        <tbody>
        <form method='post' action=''>
            <?php foreach ($usuarios as $usuario) :
                $idUsuario = $usuario["id"]; ?>
                <tr>
                    <td><?php echo $usuario["nombre"] ?></td>
                    <td><?php echo $usuario["email"] ?></td>
                    <td><?php echo $usuario["psw"] ?></td>
                    <td><?php echo $usuario["perfil"] ?></td>
                    <td><?php echo $usuario["estado"] ?></td>
                    <td><input type='checkbox' class="case2" name='<?php echo $idUsuario ?>'></td>
                </tr>
            <?php endforeach ?>
    </table>
    <input style="margin-top:20px" class="btn btn-outline-success my-3 my-sm-3" type="submit" name="validar"
           value="Validar">
    <input style="margin-top:20px" class="btn btn-outline-success my-3 my-sm-3" type="submit" name="validarTodos"
           value="Validar todos">
    <input style="margin-top:20px" class="btn btn-outline-success my-3 my-sm-3" type="submit" name="cancelar"
           value="Cancelar">
    </form>
</div>
<div style="margin: 20px auto;">

    <table class="table" id="tablaUsuariosValidados">
        <thead>
        <h3>Usuarios validados</h3>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Pass</th>
            <th scope="col">Perfil</th>
            <th scope="col">Estado</th>
            <th><input type="checkbox" id="selectall"></th>
        </tr>
        </thead>
        <tbody>
        <form method='post' action=''>
            <?php foreach ($usuariosValidados as $usuario) :
                $idUsuario = $usuario["id"]; ?>
                <tr>
                    <td><?php echo $usuario["nombre"] ?></td>
                    <td><?php echo $usuario["email"] ?></td>
                    <td><?php echo $usuario["psw"] ?></td>
                    <td><?php echo $usuario["perfil"] ?></td>
                    <td><?php echo $usuario["estado"] ?></td>
                    <td><input type='checkbox' class="case" name='<?php echo $idUsuario ?>'></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <input style="margin-top:20px" class="btn btn-outline-success my-3 my-sm-3" type="submit" name="desactivar"
           value="Desactivar">
    <input style="margin-top:20px" class="btn btn-outline-success my-3 my-sm-3" type="submit" name="desvalidarTodos"
           value="Desactivar todos">
    <input style="margin-top:20px" class="btn btn-outline-success my-3 my-sm-3" type="submit" name="cancelar"
           value="Cancelar">

    </form>
</div>
