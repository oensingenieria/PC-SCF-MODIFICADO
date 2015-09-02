<?php
include_once '../../configuracion/path.php';
include_once $PATH . 'controlador/control/Control.class.php';
include_once $PATH . 'configuracion/parametros.php';

$control = new Control();
$proyectot=$proyecto;
$mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
?>
<script type="text/javascript">
    $(function() {
        $('#descripcion').highcharts({
            data: {
                table: 'datatabledescripcion'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Consumo Mes Vs Acumulado <br><?php echo $mixerconsumot[0]['elemento'];?>'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Consumo en (Kg)'
                }
            },
            tooltip: {
                formatter: function() {
                    return '<b>' + this.series.name + '</b><br/>' +
                            this.point.y + ' ' + this.point.name.toLowerCase();
                }
            }
        });
    });
</script>
<div id="descripcion" style="min-width: 300px; height: 400px; margin: 0 auto">
</div>

<div style="display: none;">

    <table id="datatabledescripcion">
        <thead>
            <tr>
                <th></th>
                <th>Consumo Cemento del Mes(Kg)</th>
                <th>Consumo Acumulado del Año(Kg)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Enero</th>
                <?php
                $fecha_inicio_ce = date('Y') . '-' . '01' . '-01';
                $fecha_fin_c = date('Y') . '-' . '01' . '-31';
                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
                <td><?php echo $mixacumt[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Febrero</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '02' . '-01';
                $fecha_fin_c = date('Y') . '-' . '02' . '-31';
                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
                <td><?php echo $mixacumt[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Marzo</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '03' . '-01';
                $fecha_fin_c = date('Y') . '-' . '03' . '-31';
                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
                <td><?php echo $mixacumt[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Abril</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '04' . '-01';
                $fecha_fin_c = date('Y') . '-' . '04' . '-31';
                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
                <td><?php echo $mixacumt[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Mayo</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '05' . '-01';
                $fecha_fin_c = date('Y') . '-' . '05' . '-31';
                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
                <td><?php echo $mixacumt[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Junio</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '06' . '-01';
                $fecha_fin_c = date('Y') . '-' . '06' . '-31';
                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
                <td><?php echo $mixacumt[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Julio</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '07' . '-01';
                $fecha_fin_c = date('Y') . '-' . '07' . '-31';
                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
                <td><?php echo $mixacumt[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Agosto</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '08' . '-01';
                $fecha_fin_c = date('Y') . '-' . '08' . '-31';
                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
                <td><?php echo $mixacumt[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Septiembre</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '09' . '-01';
                $fecha_fin_c = date('Y') . '-' . '09' . '-31';
                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
                <td><?php echo $mixacumt[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Octubre</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '10' . '-01';
                $fecha_fin_c = date('Y') . '-' . '10' . '-31';
                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
                <td><?php echo $mixacumt[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Noviembre</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '11' . '-01';
                $fecha_fin_c = date('Y') . '-' . '11' . '-31';
                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
                <td><?php echo $mixacumt[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Diciembre</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '12' . '-01';
                $fecha_fin_c = date('Y') . '-' . '12' . '-31';
                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
                <td><?php echo $mixacumt[0]['acumulado'] ?></td>
            </tr>
        </tbody>
    </table>
</div>
