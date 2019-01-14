<?php

$usuario = "";
$password = "";
$usuarioError = $passError = "";
$form = true;
$check = "";

if (isset($_COOKIE["usuario"]) && isset($_COOKIE["password"])) {
    $usuario = $_COOKIE["usuario"];
    $password = $_COOKIE["password"];
    $check = "checked";
}

if (isset($_POST["submit"])) {
    if (empty($usuario)) {
        $usuarioError = "Usuario requerido";
        $form = true;
    } else {
        $usuario = clearData($_POST["usuario"]);
    }
    if (empty($password)) {
        $passError = "Contraseña requerida";
        $form = true;
    } else {
        $password = clearData($_POST["password"]);
    }

    if ($_POST["usuario"] == "usuario" && $_POST["password"] == "usuario") {
        $usuarioError = "";
        $passError = "";
        echo "<p style='text-align: center'>Acceso autorizado.</p>";
        $form = false;
        if (isset($_POST["recordar"]) && $_POST["recordar"] == '1' && ($_POST["usuario"] === "usuario" && $_POST["password"] === "usuario")) {
            $usuarioError = "";
            $passError = "";
            setcookie("usuario", $_POST["usuario"], time() + 60);
            setcookie("password", $_POST["password"], time() + 60);
        }
    } else {
        echo "<p style='text-align: center'>Usuario o contraseña incorrecto.</p>";
        $form = true;
    }
    if (!isset($_POST["recordar"])) {
        setcookie("usuario", $_POST['usuario'], time() - 5);
        setcookie("password", $_POST['password'], time() - 5);
        $usuario = "";
        $password = "";
        $check = "";
    }
}
function clearData($data)
{
    $data = trim($data);
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
<?php if ($form) :?>
    <div style="text-align: center; justify-content: center">
        <h3>Usuario: usuario <br> Contraseña: usuario <br><br></h3>

        <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">

            <h4>Usuario:
                <input type="text" name="usuario" value="<?php echo $usuario; ?>">

                <span class="error">* <?php echo $usuarioError; ?></span></h4>
            <h4>Contraseña:
                <input type="text" name="password" value="<?php echo $password; ?>">
                <span class="error">* <?php echo $passError; ?></span></h4>
            <h4> Recordar credenciales: <input type="checkbox" name="recordar" value="1"></h4>

            <input type="submit" name="submit" value="Enviar">
        </form>
    </div>
<?php endif ?>