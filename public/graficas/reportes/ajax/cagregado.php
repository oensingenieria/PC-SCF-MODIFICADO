<?php
include_once '../../configuracion/path.php';
include_once $PATH . 'controlador/control/Control.class.php';
include_once $PATH . 'configuracion/parametros.php';

$control = new Control();
$mes = $_POST['mes'];
$ensayo = $_POST['ensayo'];
$nombresme = $control->_fechaNombreMes($mes);
$fecha_inicio_c = date('Y') . '-' . $mes . '-01';
$fecha_fin_c = date('Y') . '-' . $mes . '-31';
if ($ensayo == 'todos') {
    $mixerconsumo = $control->_consultarReportesMixerconsumo($fecha_inicio_c, $fecha_fin_c);
}
if ($ensayo != 'todos') {
    $mixerconsumo = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
    $fecha_inicio_c = date('Y') . '-' . '01' . '-01';
    $mixacum = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_c, $fecha_fin_c, $ensayo);
}
?>
<body>
    <div class="row setup-content" id="step-1">
        <form id="form-step-1" class="form-step-1" enctype="multipart/form-data">
            <div class="col-xs-12" style="margin-top:10px;">
                <div class="col-md-12 well">
                    <?php
                    if ($mixerconsumo[0]['cont'] > 0) {
                        ?>
                        <table style="width: 100%;">
                            <tr>
                                <td>
                                    <div id="tablewrapper">
                                        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
                                            <thead>
                                                <tr>
                                                    <th><h3>Descripci&oacute;n</h3></th>
                                            <th><h3>Unidad</h3></th>
                                            <th><h3><?php echo $nombresme; ?></h3></th>
                                            <th><h3>Acumulado</h3></th>
                                            </tr>
                                            <?php
                                            $suma = 0;
                                            $acum = 0;

                                                if ($ensayo != 'todos') {
                                                    foreach ($mixerconsumo as $per) {
                                                    ?>
                                                    <tr>
                                                        <td align="left" valign="middle" style="padding-left: 10px;"><span><?php echo $per['nombre_material']; ?></span></td>
                                                        <td align="center"   valign="middle"><span><?php echo $per['unidad']; ?></span></td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;"><span><?php echo $per['suma_total']; ?></span></td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;"><span><?php echo $mixacum[0]['acumulado'] ?></span></td>
                                                    </tr>
                                                    <?php
                                                    }
                                                }
                                                if ($ensayo == 'todos') {
                                                    $ensayot = 10014836;
                                                    if ($ensayot == 10014836) {
                                                        $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
                                                        $fecha_fin_c = date('Y') . '-' . $mes . '-31';
                                                        $mixerconsumot = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayot);
                                                        $fecha_inicio_ce = date('Y') . '-' . '01' . '-01';
                                                        $mixacumt = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_ce, $fecha_fin_c, $ensayot);
                                                        ?>
                                                        <tr>
                                                            <td align="left" valign="middle"
                                                                style="padding-left: 10px;">
                                                                <span><?php echo $mixerconsumot[0]['nombre_material']; ?></span>
                                                            </td>
                                                            <td align="center" valign="middle">
                                                                <span><?php echo $mixerconsumot[0]['unidad']; ?></span>
                                                            </td>
                                                            <td align="right" valign="middle"
                                                                style="padding-right: 10px;">
                                                                <span><?php echo $mixerconsumot[0]['suma_total']; ?></span>
                                                            </td>
                                                            <td align="right" valign="middle"
                                                                style="padding-right: 10px;">
                                                                <span><?php echo $mixacumt[0]['acumulado'] ?></span>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    $ensayot = 10043776;
                                                    if ($ensayot == 10043776) {
                                                        $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
                                                        $fecha_fin_c = date('Y') . '-' . $mes . '-31';
                                                        $mixerconsumot = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayot);
                                                        $mixacumt = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_ce, $fecha_fin_c, $ensayot);
                                                        ?>
                                                        <tr>
                                                            <td align="left" valign="middle"
                                                                style="padding-left: 10px;">
                                                                <span><?php echo $mixerconsumot[0]['nombre_material']; ?></span>
                                                            </td>
                                                            <td align="center" valign="middle">
                                                                <span><?php echo $mixerconsumot[0]['unidad']; ?></span>
                                                            </td>
                                                            <td align="right" valign="middle"
                                                                style="padding-right: 10px;">
                                                                <span><?php echo $mixerconsumot[0]['suma_total']; ?></span>
                                                            </td>
                                                            <td align="right" valign="middle"
                                                                style="padding-right: 10px;">
                                                                <span><?php echo $mixacumt[0]['acumulado'] ?></span>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    $ensayot = 10033766;
                                                    if ($ensayot == 10033766) {
                                                        $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
                                                        $fecha_fin_c = date('Y') . '-' . $mes . '-31';
                                                        $mixerconsumot = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayot);
                                                        $mixacumt = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_ce, $fecha_fin_c, $ensayot);
                                                        ?>
                                                        <tr>
                                                            <td align="left" valign="middle"
                                                                style="padding-left: 10px;">
                                                                <span><?php echo $mixerconsumot[0]['nombre_material']; ?></span>
                                                            </td>
                                                            <td align="center" valign="middle">
                                                                <span><?php echo $mixerconsumot[0]['unidad']; ?></span>
                                                            </td>
                                                            <td align="right" valign="middle"
                                                                style="padding-right: 10px;">
                                                                <span><?php echo $mixerconsumot[0]['suma_total']; ?></span>
                                                            </td>
                                                            <td align="right" valign="middle"
                                                                style="padding-right: 10px;">
                                                                <span><?php echo $mixacumt[0]['acumulado'] ?></span>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    $ensayot = 10015184;
                                                    if ($ensayot == 10015184) {
                                                        $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
                                                        $fecha_fin_c = date('Y') . '-' . $mes . '-31';
                                                        $mixerconsumot = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayot);
                                                        $mixacumt = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_ce, $fecha_fin_c, $ensayot);
                                                        if ($mixerconsumot[0]['cont'] > 0) {
                                                            ?>
                                                            <tr>
                                                                <td align="left" valign="middle"
                                                                    style="padding-left: 10px;">
                                                                    <span><?php echo $mixerconsumot[0]['nombre_material']; ?></span>
                                                                </td>
                                                                <td align="center" valign="middle">
                                                                    <span><?php echo $mixerconsumot[0]['unidad']; ?></span>
                                                                </td>
                                                                <td align="right" valign="middle"
                                                                    style="padding-right: 10px;">
                                                                    <span><?php echo $mixerconsumot[0]['suma_total']; ?></span>
                                                                </td>
                                                                <td align="right" valign="middle"
                                                                    style="padding-right: 10px;">
                                                                    <span><?php echo $mixacumt[0]['acumulado'] ?></span>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        $ensayot = 10029324;
                                                        if ($ensayot == 10029324) {
                                                            $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
                                                            $fecha_fin_c = date('Y') . '-' . $mes . '-31';
                                                            $mixerconsumot = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayot);
                                                            $mixacumt = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_ce, $fecha_fin_c, $ensayot);
                                                            if ($mixerconsumot[0]['cont'] > 0) {
                                                                ?>
                                                                <tr>
                                                                    <td align="left" valign="middle"
                                                                        style="padding-left: 10px;">
                                                                        <span><?php echo $mixerconsumot[0]['nombre_material']; ?></span>
                                                                    </td>
                                                                    <td align="center" valign="middle">
                                                                        <span><?php echo $mixerconsumot[0]['unidad']; ?></span>
                                                                    </td>
                                                                    <td align="right" valign="middle"
                                                                        style="padding-right: 10px;">
                                                                        <span><?php echo $mixerconsumot[0]['suma_total']; ?></span>
                                                                    </td>
                                                                    <td align="right" valign="middle"
                                                                        style="padding-right: 10px;">
                                                                        <span><?php echo $mixacumt[0]['acumulado'] ?></span>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                        }
                                                        $ensayot = 10017581;
                                                        if ($ensayot == 10017581) {
                                                            $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
                                                            $fecha_fin_c = date('Y') . '-' . $mes . '-31';
                                                            $mixerconsumot = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayot);
                                                            $mixacumt = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_ce, $fecha_fin_c, $ensayot);
                                                            if ($mixerconsumot[0]['cont'] > 0) {
                                                                ?>
                                                                <tr>
                                                                    <td align="left" valign="middle"
                                                                        style="padding-left: 10px;">
                                                                        <span><?php echo $mixerconsumot[0]['nombre_material']; ?></span>
                                                                    </td>
                                                                    <td align="center" valign="middle">
                                                                        <span><?php echo $mixerconsumot[0]['unidad']; ?></span>
                                                                    </td>
                                                                    <td align="right" valign="middle"
                                                                        style="padding-right: 10px;">
                                                                        <span><?php echo $mixerconsumot[0]['suma_total']; ?></span>
                                                                    </td>
                                                                    <td align="right" valign="middle"
                                                                        style="padding-right: 10px;">
                                                                        <span><?php echo $mixacumt[0]['acumulado'] ?></span>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                        }
                                                        $ensayot = 10033765;
                                                        if ($ensayot == 10033765) {
                                                            $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
                                                            $fecha_fin_c = date('Y') . '-' . $mes . '-31';
                                                            $mixerconsumot = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayot);
                                                            $mixacumt = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_ce, $fecha_fin_c, $ensayot);
                                                            if ($mixerconsumot[0]['cont'] > 0) {
                                                                ?>
                                                                <tr>
                                                                    <td align="left" valign="middle"
                                                                        style="padding-left: 10px;">
                                                                        <span><?php echo $mixerconsumot[0]['nombre_material']; ?></span>
                                                                    </td>
                                                                    <td align="center" valign="middle">
                                                                        <span><?php echo $mixerconsumot[0]['unidad']; ?></span>
                                                                    </td>
                                                                    <td align="right" valign="middle"
                                                                        style="padding-right: 10px;">
                                                                        <span><?php echo $mixerconsumot[0]['suma_total']; ?></span>
                                                                    </td>
                                                                    <td align="right" valign="middle"
                                                                        style="padding-right: 10px;">
                                                                        <span><?php echo $mixacumt[0]['acumulado'] ?></span>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                            }
                                                        }
                                                    }
                                                }
                                                ?>
                                            </thead>
                                        </table>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <?php
                    } else {
                        ?>
                        <table class="tinytable">
                            <tr>
                                <td height="24" colspan="6" align="center"><span>No se encontraron datos que mostrar</span></td>
                            </tr>
                        </table>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </form>
        <?php
        if ($mixerconsumo[0]['cont'] > 0 && $ensayo != 'todos') {
            ?>
            <table style="width: 100%;">
                <tr>
                    <td>
                        <?php include_once 'conagrabarra2.php'; ?>
                    </td>
                    <td>
                        <?php include_once 'conagrabarra1.php'; ?>
                    </td>
                </tr>
            </table>
            <?php
        }
        if ($mixerconsumo[0]['cont'] > 0 && $ensayo == 'todos') {
            ?>
            <table style="width: 100%;">
                <tr>
                    <td>
                        <?php include_once 'conagrabarra1.php'; ?>
                    </td>
                    <td>
                        <?php include_once 'conagrabarra3.php'; ?>
                    </td>
                </tr>
            </table>
            <?php
        }
        ?>
    </div>
</body>
