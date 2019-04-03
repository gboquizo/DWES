<?php
/**
 * Created by PhpStorm.
 * User: Guillermo
 * Date: 12/03/2019
 * Time: 11:08
 */
require_once('clases/Usuarios.php');

redireccionSinoAdmin();

$clientes = new Usuarios();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST["pago"])) {
        $date = getdate();
        $mes = $date["mon"];
        $date = $date["year"] . "-" . $date["mon"] . "-" . $date["mday"] . " " . $date["hours"] . ":" . $date["minutes"] . ":" . $date["seconds"];
        $mensaje = "";
        foreach ($clientes->getClientes() as $cliente) {
            $nombreUsuario = $cliente['nombre'];
            $nombre_archivo = "Facturación_" . $cliente['nombre'] . "_mes_" . $mes . ".txt";
            $carta = "";

            $carta =
                "CARTA DE PAGO \n 
                 $nombreUsuario\n 
                 Cuota mensual por la suscripción a RedFilm.\n 
                 Importe: 10€ \n 
                 $date";

            $path = "uploads/pagos/" . $nombre_archivo;

            if (!file_exists($path)) {

                $archivo = fopen($path, "a");
                fwrite($archivo, $carta . "\n");
                $mensaje .= "<li style=\"list-style: none;display: inline-block;color: #856F66; font-size:1.2rem; margin: 0 0 10px 0;\" >La carta de pago del usuario  " . $nombreUsuario . " generada correctamente</li>";
                fclose($archivo);

            } else {
                $mensaje .= "<li style=\"list-style: none;display: inline-block;color: #856F66; font-size:1.2rem; margin: 0 0 10px 0;\">La carta de pago del usuario  " . $nombreUsuario . " ya existe</li>";
            }

        };

    }
}

?>
<div>
    <h1 class="titulo">GENERAR LA CARTA DE PAGO</h1>
    <form action="" method="POST" name="login" enctype="multipart/form-data">
        <input style="margin-left:10px" class="btn btn-outline-success my-3 my-sm-3" type="submit" name="pago"
               value="Generar la carta de pago">
        <?php if (!empty($mensaje)): ?>
            <div class="error">
                <ul style="margin-top:20px;">
                    <?php echo $mensaje; ?>
                </ul>
            </div>
        <?php endif; ?>
    </form>

</div>
