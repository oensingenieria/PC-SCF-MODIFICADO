<?php
include_once '../../configuracion/path.php';
include_once $PATH.'controlador/control/Control.class.php';
include_once $PATH.'configuracion/parametros.php';

$control    = new Control();
$materiales = $control->_consultarMateriales();
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
                text: 'Consumo Materia Prima<br> (<?php echo $nombresme.' '.date('Y');?>)'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: ''
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
                <th>Serie</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th><?php echo $materiales[0]['unidad']?><br>
<?php echo $materiales[0]['nombre_material']?></th>
<?php
$fecha_inicio_c = date('Y').'-'.$mes.'-01';
$fecha_fin_c    = date('Y').'-'.$mes.'-31';
$ensayo         = $materiales[0]['Codigo_Material'];
$mixerconsumo   = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
?>
                <td><?php echo $mixerconsumo[0]['suma_total']?></td>
            </tr>
            <tr>
                <th><?php echo $materiales[1]['unidad']?><br>
<?php echo $materiales[1]['nombre_material']?></th>
<?php
$fecha_inicio_c = date('Y').'-'.$mes.'-01';
$fecha_fin_c    = date('Y').'-'.$mes.'-31';
$ensayo         = $materiales[1]['Codigo_Material'];
$mixerconsumo   = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
?>
                <td><?php echo $mixerconsumo[0]['suma_total']?></td>
            </tr>
            <tr>
                <th><?php echo $materiales[2]['unidad']?><br>
<?php echo $materiales[2]['nombre_material']?></th>
<?php
$fecha_inicio_c = date('Y').'-'.$mes.'-01';
$fecha_fin_c    = date('Y').'-'.$mes.'-31';
$ensayo         = $materiales[2]['Codigo_Material'];
$mixerconsumo   = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
?>
                <td><?php echo $mixerconsumo[0]['suma_total']?></td>
            </tr>
            <tr>
                <th><?php echo $materiales[3]['unidad']?><br>
<?php echo $materiales[3]['nombre_material']?></th>
<?php
$fecha_inicio_c = date('Y').'-'.$mes.'-01';
$fecha_fin_c    = date('Y').'-'.$mes.'-31';
$ensayo         = $materiales[3]['Codigo_Material'];
$mixerconsumo   = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
?>
                <td><?php echo $mixerconsumo[0]['suma_total']?></td>
            </tr>
            <tr>
                <th><?php echo $materiales[4]['unidad']?><br>
<?php echo $materiales[4]['nombre_material']?></th>
<?php
$fecha_inicio_c = date('Y').'-'.$mes.'-01';
$fecha_fin_c    = date('Y').'-'.$mes.'-31';
$ensayo         = $materiales[4]['Codigo_Material'];
$mixerconsumo   = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
?>
                <td><?php echo $mixerconsumo[0]['suma_total']?></td>
            </tr>
            <tr>
                <th><?php echo $materiales[5]['unidad']?><br>
<?php echo $materiales[5]['nombre_material']?></th>
<?php
$fecha_inicio_c = date('Y').'-'.$mes.'-01';
$fecha_fin_c    = date('Y').'-'.$mes.'-31';
$ensayo         = $materiales[5]['Codigo_Material'];
$mixerconsumo   = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
?>
                <td><?php echo $mixerconsumo[0]['suma_total']?></td>
            </tr>
            <tr>
                <th><?php echo $materiales[6]['unidad']?><br>
<?php echo $materiales[6]['nombre_material']?></th>
<?php
$fecha_inicio_c = date('Y').'-'.$mes.'-01';
$fecha_fin_c    = date('Y').'-'.$mes.'-31';
$ensayo         = $materiales[6]['Codigo_Material'];
$mixerconsumo   = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
?>
                <td><?php echo $mixerconsumo[0]['suma_total']?></td>
            </tr>
    </table>
</div>
