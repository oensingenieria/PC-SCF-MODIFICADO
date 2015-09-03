<?php
include_once '../../configuracion/path.php';
include_once $PATH . 'controlador/control/Control.class.php';
include_once $PATH . 'configuracion/parametros.php';

$control = new Control();
$mes = $_POST['mes'];
?>
<script type="text/javascript">
    $(function() {
        $('#todostodos').highcharts({
            data: {
                table: 'datatabletodostodos'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Consumo Mes Vs Acumulado <br> de Todos los Departamentos'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Consumo Cemento (Kg)'
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
<div id="todostodos" style="min-width: 300px; height: 400px; margin: 0 auto">
</div>
<div style="display: none;">

    <table id="datatabletodostodos">
        <thead>
            <tr>
                <th></th>
                <th>Consumo Cemento del Mes(Kg)</th>
                <th>Consumo Acumulado del Año(Kg)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Postes</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
                $fecha_fin_c    = date('Y') . '-' . $mes . '-31';
                $fecha_inicio_ce = date('Y') . '-' . '01' . '-01';
                $proyectot         = 'POSTES';
                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
                <td><?php echo $mixacumt[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Viguetas</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
                $fecha_fin_c    = date('Y') . '-' . $mes . '-31';
                $proyectot         = 'VIGUETAS06';
                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
                <td><?php echo $mixacumt[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Losalex</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
                $fecha_fin_c    = date('Y') . '-' . $mes . '-31';
                $proyectot         = '18012012';
                $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                $mixacumt = $control->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_ce, $fecha_fin_c, $proyectot);
                ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
                <td><?php echo $mixacumt[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Proyectos</th>
                <?php
                    $fecha_inicio_c = date('Y').'-'.$mes.'-01';
                    $fecha_fin_c    = date('Y').'-'.$mes.'-31';
                    $mixerconsumot = $control->_consultarReportesMixerConsumoCementoProy($fecha_inicio_c, $fecha_fin_c);
                    $mixacumt = $control->_consultarReportesMixerConsumoCementoProyAcum($fecha_inicio_ce, $fecha_fin_c);
                    ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
                <td><?php echo $mixacumt[0]['acumulado'] ?></td>
            </tr>
    </table>
</div>
