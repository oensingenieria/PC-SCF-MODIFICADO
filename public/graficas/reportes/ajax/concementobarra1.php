<?php
include_once '../../configuracion/path.php';
include_once $PATH.'controlador/control/Control.class.php';
include_once $PATH.'configuracion/parametros.php';

$control    = new Control();
$mes        = $_POST['mes'];
?>
<script type="text/javascript">
    $(function() {
        $('#todos').highcharts({
            data: {
                table: 'datatabletodos'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Consumo de Cemento del mes (Kg) <br>(<?php echo $nombresme.' '.date('Y');?>)'
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
<div id="todos" style="min-width: 300px; height: 400px; margin: 0 auto">
</div>
<div style="display: none;">

    <table id="datatabletodos">
        <thead>
            <tr>
                <th>Departamentos</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Postes</th>
                    <?php
                    $fecha_inicio_c = date('Y').'-'.$mes.'-01';
                    $fecha_fin_c    = date('Y').'-'.$mes.'-31';
                    $proyectot         = 'POSTES';
                    $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                    ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
            </tr>
            <tr>
                <th>Viguetas</th>
                    <?php
                    $fecha_inicio_c = date('Y').'-'.$mes.'-01';
                    $fecha_fin_c    = date('Y').'-'.$mes.'-31';
                    $proyectot         = 'VIGUETAS06';
                    $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                    ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
            </tr>
            <tr>
                <th>Losalex</th>
                    <?php
                    $fecha_inicio_c = date('Y').'-'.$mes.'-01';
                    $fecha_fin_c    = date('Y').'-'.$mes.'-31';
                    $proyectot         = '18012012';
                    $mixerconsumot = $control->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyectot);
                    ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
            </tr>
            <tr>
                <th>Proyectos</th>
                    <?php
                    $fecha_inicio_c = date('Y').'-'.$mes.'-01';
                    $fecha_fin_c    = date('Y').'-'.$mes.'-31';
                    $mixerconsumot = $control->_consultarReportesMixerConsumoCementoProy($fecha_inicio_c, $fecha_fin_c);
                    ?>
                <td><?php echo $mixerconsumot[0]['ccementomes']?></td>
            </tr>
    </table>
</div>
