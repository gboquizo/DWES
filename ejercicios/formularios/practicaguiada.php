<?php
//Se pulsa submit cargamos en las variables los datos del formulario.
$lcolocaFormulario = false;
$vNombreErr = $vApellidosErr = "";

if (isset($_POST['enviar'])) {
    $vNombreErr = "";
    $vApellidosErr = "";
    $vNombre = $_POST['nombre'];
    $vApellidos = $_POST['apellidos'];
    if (empty($vNombre)) {
        $vNombreErr = "Nombre requerido";
        $lcolocaFormulario = true;
    } else {
        $vNombre = clearData($_POST["nombre"]);
    }
    if (empty($vApellidos)) {
        $vApellidosErr = "Apellidos requeridos";
        $lcolocaFormulario = true;
    } else {
        $vApellidos = clearData($_POST["apellidos"]);
    }
} else {
    $vNombre = "";
    $vApellidos = "";
}

function clearData($data) {
    $data = trim($data);
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<section class='principal'>
    <h2>Práctica guiada</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <div style='display:flex; text-align: center;'>
                        <?php if (!isset($_POST['enviar']) || $lcolocaFormulario) : ?>
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]) ?>">
                            Nombre: <input type="text" name="nombre" value="<?php echo $vNombre ?>">
                            <?php echo $vNombreErr ?>
                            <br/><br/>
                            Apellidos: <input type="text" name="apellidos" value="<?php echo $vApellidos ?>">
                            <?php echo $vApellidosErr ?>
                            <br/><br/>
                            <input type="submit" name="enviar" value="Enviar">

                            <?php else : ?>
                                <?php echo clearData($_POST['nombre']) ?>
                                <br/>
                                <?php echo clearData($_POST['apellidos']) ?>
                            <?php endif ?>
                    </div>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/formularios/practicaguiada.php'>Ver código</a>
                    </div>
                </div>
            </div>
    </article>
</section>