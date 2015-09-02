<?php
include_once '../../configuracion/path.php';
include_once $PATH . 'controlador/control/Control.class.php';
include_once $PATH . 'configuracion/parametros.php';

$control = new Control();
$mes = $_POST['mes'];
$proyecto = $_POST['ensayo'];
$nombresme = $control->_fechaNombreMes($mes);
$fecha_inicio_c = date('Y') . '-' . $mes . '-01';
$fecha_fin_c = date('Y') . '-' . $mes . '-31';

if ($proyecto == 'todos') {
    $mixerconsumo = $control->_consultarReportesMixerconsumo($fecha_inicio_c, $fecha_fin_c);
} else {
    $mixerconsumo = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c,$proyecto);
    $fecha_inicio_c = date('Y') . '-' . '01' . '-01';
    $mixacum = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_c, $fecha_fin_c, $proyecto);
}
?>
<div class="row setup-content" id="step-1">
    <form id="form-step-1" class="form-step-1" enctype="multipart/form-data">
        <div class="col-xs-12">
            <div class="col-md-12 well">
                <?php
                if ($mixerconsumo[0]['cont'] > 0) {
                    ?>
                    <table width="100%">
                        <tr>
                            <td>
                                <div id="tablewrapper">
                                    <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
                                        <thead>
                                            <tr>
                                                <th><h3>Elemento</h3></th>
                                        <th><h3>Consumo<br>cemento del<br>Mes (kg)</h3></th>
                                        <th><h3>Volumen<br> Mensual<br>(m3)</h3></th>
                                        <th><h3>Consumos<br>Unit. Promedio<br>(kg/m3)</h3></th>
                                        <th><h3>Consumos<br>Acumulado del<br>A&ntilde;o (kg)</h3></th>
                                        </tr>
                                        <?php
                                        if ($proyecto != 'todos') {
                                            foreach ($mixerconsumo as $per) {
                                                ?>
                                                <tr>
                                                    <td align="left"  valign="middle" style="padding-left: 10px;"><span><?php echo $per['elemento']; ?></span></td>
                                                    <td align="right" valign="middle" style="padding-right: 10px;"><span><?php echo $per['ccementomes']; ?></span></td>
                                                    <td align="right" valign="middle" style="padding-right: 10px;"><span><?php echo number_format(($per['volumen']),2,',','') ?></span></td>
                                                    <td align="right" valign="middle" style="padding-right: 10px;"><span><?php echo number_format(($per['ccementomes'] / $per['volumen']),2,',','') ?></span></td>
                                                    <td align="right" valign="middle" style="padding-right: 10px;"><span><?php echo $mixacum[0]['acumulado'] ?></span></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        if ($proyecto == 'todos') {
                                            $proyectot = 'POSTES';
                                            if ($proyectot == 'POSTES') {
                                                $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
                                                $fecha_fin_c = date('Y') . '-' . $mes . '-31';
                                                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c,$proyectot);
                                                $fecha_inicio_ce = date('Y') . '-' . '01' . '-01';
                                                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                                                if($mixerconsumot[0]['cont'] > 0) {
                                                    ?>
                                                    <tr>
                                                        <td align="left" valign="middle" style="padding-left: 10px;">
                                                            <span><?php echo $mixerconsumot[0]['elemento']; ?></span>
                                                        </td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;">
                                                            <span><?php echo $mixerconsumot[0]['ccementomes']; ?></span>
                                                        </td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;">
                                                            <span><?php echo number_format(($mixerconsumot[0]['volumen']), 2, ',', ''); ?></span>
                                                        </td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;">
                                                            <span><?php echo number_format(($mixerconsumot[0]['ccementomes'] / $mixerconsumot[0]['volumen']), 2, ',', '') ?></span>
                                                        </td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;">
                                                            <span><?php echo $mixacumt[0]['acumulado'] ?></span></td>
                                                    </tr>
                                                <?php
                                                }
                                            }
                                            $proyectot = 'VIGUETAS06';
                                            if ($proyectot == 'VIGUETAS06') {
                                                $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
                                                $fecha_fin_c = date('Y') . '-' . $mes . '-31';
                                                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c,$proyectot);
                                                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                                                if($mixerconsumot[0]['cont'] > 0) {
                                                    ?>
                                                    <tr>
                                                        <td align="left" valign="middle" style="padding-left: 10px;">
                                                            <span><?php echo $mixerconsumot[0]['elemento']; ?></span>
                                                        </td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;">
                                                            <span><?php echo $mixerconsumot[0]['ccementomes']; ?></span>
                                                        </td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;">
                                                            <span><?php echo number_format(($mixerconsumot[0]['volumen']), 2, ',', ''); ?></span>
                                                        </td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;">
                                                            <span><?php echo number_format(($mixerconsumot[0]['ccementomes'] / $mixerconsumot[0]['volumen']), 2, ',', '') ?></span>
                                                        </td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;">
                                                            <span><?php echo $mixacumt[0]['acumulado'] ?></span></td>
                                                    </tr>
                                                <?php
                                                }
                                            }
                                            $proyectot = '18012012';
                                            if ($proyectot == '18012012') {
                                                $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
                                                $fecha_fin_c = date('Y') . '-' . $mes . '-31';
                                                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                                                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                                                if ($mixerconsumot[0]['cont'] > 0) {
                                                    ?>
                                                    <tr>
                                                        <td align="left" valign="middle" style="padding-left: 10px;">
                                                            <span><?php echo $mixerconsumot[0]['elemento']; ?></span>
                                                        </td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;">
                                                            <span><?php echo $mixerconsumot[0]['ccementomes']; ?></span>
                                                        </td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;">
                                                            <span><?php echo number_format(($mixerconsumot[0]['volumen']), 2, ',', ''); ?></span>
                                                        </td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;">
                                                            <span><?php echo number_format(($mixerconsumot[0]['ccementomes'] / $mixerconsumot[0]['volumen']), 2, ',', '') ?></span>
                                                        </td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;">
                                                            <span><?php echo $mixacumt[0]['acumulado'] ?></span></td>
                                                    </tr>
                                                <?php
                                                }
                                            }
                                            $proyectot = 'proyectos';
                                            if ($proyectot == 'proyectos') {
                                                $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
                                                $fecha_fin_c = date('Y') . '-' . $mes . '-31';
                                                $mixerconsumot = $control->_consultarReportesMixerConsumoCementoProy($fecha_inicio_c, $fecha_fin_c);
                                                $mixacumt = $control->_consultarReportesMixerConsumoCementoProyAcum($fecha_inicio_ce, $fecha_fin_c);
                                                if ($mixerconsumot[0]['cont'] > 0) {
                                                    ?>
                                                    <tr>
                                                        <td align="left" valign="middle" style="padding-left: 10px;">
                                                            <span>Proyectos</span></td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;">
                                                            <span><?php echo $mixerconsumot[0]['ccementomes']; ?></span>
                                                        </td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;">
                                                            <span><?php echo number_format(($mixerconsumot[0]['volumen']), 2, ',', ''); ?></span>
                                                        </td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;">
                                                            <span><?php echo number_format(($mixerconsumot[0]['ccementomes'] / $mixerconsumot[0]['volumen']), 2, ',', '') ?></span>
                                                        </td>
                                                        <td align="right" valign="middle" style="padding-right: 10px;">
                                                            <span><?php echo $mixacumt[0]['acumulado'] ?></span></td>
                                                    </tr>
                                                <?php
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
    if ($mixerconsumo[0]['cont'] > 0 && $proyecto != 'todos') {
        ?>
        <table style="width: 100%;">
            <tr>
                <td>
                    <?php include_once 'concementobarra2.php'; ?>
                </td>
                <td>
                    <?php include_once 'concementobarra1.php'; ?>
                </td>
            </tr>
        </table>
    <?php
    }
    if ($mixerconsumo[0]['cont'] > 0 && $proyecto == 'todos') {
        ?>
        <table style="width: 100%;">
            <tr>
                <td>
                    <?php include_once 'concementobarra3.php'; ?>
                </td>
                <td>
                    <?php include_once 'concementobarra1.php'; ?>
                </td>
            </tr>
        </table>
    <?php
    }
    ?>
</div>
</body>

