<?php
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: registro.php
 * @Date: 11/12/18
 * @Description: Página encargada del registro de usuarios.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
require_once "clases/Usuarios.php";

$mensajeContrasenias = "";
$nombre = "";
$email = "";

if (isset($_POST["registro"])) {
    if (empty($_POST["nombreUsuario"]) or strlen($_POST["nombreUsuario"]) < 3) {
        $mensajeContrasenias = "El nombre debe tener una longitud igual o mayor a 3 carácteres.";
        $color = "red";
        $nombre = $_POST["nombreUsuario"];
        $email = $_POST["email"];
    } else {
        if (strlen($_POST["passReg"]) <= 3) {
            $mensajeContrasenias = "Las contraseñas deben tener una longitud mayor a 3 carácteres.";
            $color = "red";
            $nombre = $_POST["nombreUsuario"];
            $email = $_POST["email"];
        } else {
            if ($_POST["passReg"] != $_POST["passReg2"]) {
                $mensajeContrasenias = "Las contraseñas no coinciden";
                $color = "red";
                $nombre = $_POST["nombreUsuario"];
                $email = $_POST["email"];
            } else {
                $gestionUsuarios = new Usuarios();
                $comprobarNombre = $gestionUsuarios->getUsuario($_POST["nombreUsuario"]);
                if ($comprobarNombre == $_POST["nombreUsuario"]) {
                    $mensajeContrasenias = "Ese usuario ya existe";
                    $color = "red";
                } else {
                    if ($gestionUsuarios->crearUsuario($_POST["nombreUsuario"], $_POST["email"], $_POST["passReg"])) {
                        $mensajeContrasenias = "Usuario registrado correctamente";
                        $color = "green";
                    } else {
                        $mensajeContrasenias = "Error al crear usuario";
                    }
                }
            }
        }
    }
}

?>
<form method='post' action='' style="margin: 20px auto">
    <div class="form-group">
        <label for="exampleInputName">Nombre:</label>
        <input type="text" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Nombre" name="nombreUsuario" value="<?php echo $nombre ?>"><br>
        <label for="exampleInputEmail">Email:</label><br>
        <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Correo electrónico" name="email" value="<?php echo $email ?>"><br>
        <label for="exampleInputPassword1">Contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name='passReg' placeholder="Contraseña"><br>
        <label for="exampleInputPassword2">Repita contraseña</label>
        <input type="password" class="form-control" id="exampleInputPassword2" name='passReg2' placeholder="Repita contraseña"><br>
    </div>
    <div class="form-group">
        <span style="background-color: <?php echo $color ?>; color: white"><?php echo $mensajeContrasenias ?></span>
    </div>
    <button type="submit" name='registro' class="btn btn-primary">Registrar</button>
</form>
