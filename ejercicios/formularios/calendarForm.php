<?php
include 'srccalendarform.php';
/**
 * @User: Guillermo Boquizo Sánchez
 * @File: calendarForm.php
 * @Date: 10/10/18
 * @Description:Muestra un calendario introduciendo el mes y el año en un formulario.
 * @license http://opensource.org/licenses/gpl-license.php  GNU Public License
 */
$annoErr = $mesErr = "";
$flagError = false;
$mes = "";
$anno = "";

if (!empty($_POST)) {
    foreach ($_POST as $key => $value) {
        $$key = $value;
    }
    if (empty($anno) || !filter_var($anno, FILTER_VALIDATE_INT)) {
        $annoErr = "Año erróneo";
        $flagError = true;
    }
}
?>
<section class='principal'>
    <h2>Calendario con formulario</h2>
    <article class='articulo'>
        <div class="contenedor-ejercicios">
            <div class="contenidoEjercicio">
                <div class="ejercicio violet">
                    <div style='display:flex; text-align: center;'>
                        <?php if (!isset($_POST['enviar']) || $flagError) : ?>
                            <form method="post" action="<?php echo htmlspecialchars($_SERVER["REQUEST_URI"]) ?>">
                                <span><label>Mes</label></span>
                                <select id="mes" name="mes">
                                    <?php for ($i = 1; $i <= 12; $i++): ?>
                                        <option value=
                                                "<?php echo $i ?>"
                                            <?php echo $mes == $i ? "selected" : "" ?>>
                                            <?php echo $meses[$i] ?>
                                        </option>
                                    <?php endfor ?>
                                </select>
                                <br/><br/>
                                <span><label>Año </label></span>
                                <select name='anno'>
                                    <?php for ($i = 1962; $i <= date("Y") + 20; $i++): ?>
                                        <option value=<?php echo $i ?>><?php echo $i ?></option>
                                    <?php endfor ?>
                                </select>
                                <span><?php echo $annoErr; ?></span>
                                <br/><br/>
                                <input type="submit" name="enviar" value="Enviar">
                            </form>
                        <?php else : ?>
                            <?php
                            $diaActual = date("j");
                            $diaSemana = date("w", mktime(0, 0, 0, $mes, 1, $anno)) + 7;
                            $mesActual = date("n");
                            $ultimoDiaMes = date("d", (mktime(0, 0, 0, $mes + 1, 1, $anno) - 1));
                            ?>
                            <table style='border: 1px solid; margin: 0 auto;'>
                                <caption
                                        style='margin: 0 auto; font-weight: bold; padding:16px; font-size: 2rem;'><?php echo $meses[$mes] . " " . $anno ?></caption>
                                <tr>
                                    <?php foreach ($tabla as $celda) : ?>
                                        <th style='border: 	1px solid; font-weight: bold; padding:16px; background-color: crimson;'>
                                            <?php echo $celda; ?>
                                        </th>
                                    <?php endforeach ?>
                                </tr>
                                <?php $ultimaCelda = $diaSemana + $ultimoDiaMes; ?>
                                <?php for ($i = 1; $i <= 42; $i++) : ?>

                                    <?php if ($i == $diaSemana) : ?>
                                        <?php $day = 1 ?>
                                    <?php endif ?>
                                    <?php if ($i < $diaSemana || $i >= $ultimaCelda) : ?>
                                        <td style='border: 1px dotted; font-weight: lighter; padding:16px; background-color: #875ECD'>
                                            &nbsp;
                                        </td>
                                    <?php else : ?>
                                        <?php if ($day == $diaActual && $mes == $mesActual) : ?>
                                            <?php $color = "#078307" ?>
                                        <?php elseif ($i % 7 == 0) : ?>
                                            <?php $color = "#FA0303" ?>
                                        <?php else : ?>
                                            <?php $color = "#FFFFFF" ?>
                                        <?php endif ?>

                                        <td style='border: 1px solid; font-weight: lighter; padding:16px; background-color:<?php echo $color ?>'>
                                            <?php echo $day ?>
                                        </td>
                                        <?php $day++ ?>
                                    <?php endif ?>

                                    <?php echo $i % 7 == 0 ? "</tr><tr>\n" : "" ?>
                                <?php endfor ?>
                            </table>
                        <?php endif ?>
                    </div>
                </div>
                <div class="botonera">
                    <div>
                        <a href="../../ejercicios" class="btnVolver">Volver</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/formularios/calendarForm.php'>Ver código</a>
                    </div>
                    <div>
                        <a class="btnVolver"
                           href='../../verCodigo?src=ejercicios/formularios/srccalendarform.php'>Ver código src</a>
                    </div>
                </div>
            </div>
    </article>
</section>