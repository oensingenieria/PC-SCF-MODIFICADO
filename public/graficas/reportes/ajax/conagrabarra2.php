<?php
include_once '../../configuracion/path.php';
include_once $PATH . 'controlador/control/Control.class.php';
include_once $PATH . 'configuracion/parametros.php';

$control = new Control();
$mixerconsumo = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
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
                text: 'Grafico de <?php echo $mixerconsumo[0]['nombre_material']; ?><br>Mes Vs Acumulado'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Consumo en <?php echo $mixerconsumo[0]['unidad']; ?>'
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
                <th>Consumo del Mes</th>
                <th>Acumulado</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th>Enero</th>
                <?php
                $fecha_inicio_c_e = date('Y') . '-' . '01' . '-01';
                $fecha_fin_c = date('Y') . '-' . '01' . '-31';
                $mixerconsumo = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
                $mixacum = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_c_e, $fecha_fin_c, $ensayo);
                ?>
                <td><?php echo $mixerconsumo[0]['suma_total'] ?></td>
                <td><?php echo $mixacum[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Febrero</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '02' . '-01';
                $fecha_fin_c = date('Y') . '-' . '02' . '-31';
                $mixerconsumo = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
                $mixacum = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_c_e, $fecha_fin_c, $ensayo);
                ?>
                <td><?php echo $mixerconsumo[0]['suma_total'] ?></td>
                <td><?php echo $mixacum[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Marzo</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '03' . '-01';
                $fecha_fin_c = date('Y') . '-' . '03' . '-31';
                $mixerconsumo = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
                $mixacum = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_c_e, $fecha_fin_c, $ensayo);
                ?>
                <td><?php echo $mixerconsumo[0]['suma_total'] ?></td>
                <td><?php echo $mixacum[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Abril</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '04' . '-01';
                $fecha_fin_c = date('Y') . '-' . '04' . '-31';
                $mixerconsumo = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
                $mixacum = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_c_e, $fecha_fin_c, $ensayo);
                ?>
                <td><?php echo $mixerconsumo[0]['suma_total'] ?></td>
                <td><?php echo $mixacum[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Mayo</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '05' . '-01';
                $fecha_fin_c = date('Y') . '-' . '05' . '-31';
                $mixerconsumo = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
                $mixacum = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_c_e, $fecha_fin_c, $ensayo);
                ?>
                <td><?php echo $mixerconsumo[0]['suma_total'] ?></td>
                <td><?php echo $mixacum[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Junio</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '06' . '-01';
                $fecha_fin_c = date('Y') . '-' . '06' . '-31';
                $mixerconsumo = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
                $mixacum = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_c_e, $fecha_fin_c, $ensayo);
                ?>
                <td><?php echo $mixerconsumo[0]['suma_total'] ?></td>
                <td><?php echo $mixacum[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Julio</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '07' . '-01';
                $fecha_fin_c = date('Y') . '-' . '07' . '-31';
                $mixerconsumo = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
                $mixacum = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_c_e, $fecha_fin_c, $ensayo);
                ?>
                <td><?php echo $mixerconsumo[0]['suma_total'] ?></td>
                <td><?php echo $mixacum[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Agosto</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '08' . '-01';
                $fecha_fin_c = date('Y') . '-' . '08' . '-31';
                $mixerconsumo = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
                $mixacum = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_c_e, $fecha_fin_c, $ensayo);
                ?>
                <td><?php echo $mixerconsumo[0]['suma_total'] ?></td>
                <td><?php echo $mixacum[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Septiembre</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '09' . '-01';
                $fecha_fin_c = date('Y') . '-' . '09' . '-31';
                $mixerconsumo = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
                $mixacum = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_c_e, $fecha_fin_c, $ensayo);
                ?>
                <td><?php echo $mixerconsumo[0]['suma_total'] ?></td>
                <td><?php echo $mixacum[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Octubre</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '10' . '-01';
                $fecha_fin_c = date('Y') . '-' . '10' . '-31';
                $mixerconsumo = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
                $mixacum = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_c_e, $fecha_fin_c, $ensayo);
                ?>
                <td><?php echo $mixerconsumo[0]['suma_total'] ?></td>
                <td><?php echo $mixacum[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Noviembre</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '11' . '-01';
                $fecha_fin_c = date('Y') . '-' . '11' . '-31';
                $mixerconsumo = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
                $mixacum = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_c_e, $fecha_fin_c, $ensayo);
                ?>
                <td><?php echo $mixerconsumo[0]['suma_total'] ?></td>
                <td><?php echo $mixacum[0]['acumulado'] ?></td>
            </tr>
            <tr>
                <th>Diciembre</th>
                <?php
                $fecha_inicio_c = date('Y') . '-' . '12' . '-01';
                $fecha_fin_c = date('Y') . '-' . '12' . '-31';
                $mixerconsumo = $control->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
                $mixacum = $control->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_c_e, $fecha_fin_c, $ensayo);
                ?>
                <td><?php echo $mixerconsumo[0]['suma_total'] ?></td>
                <td><?php echo $mixacum[0]['acumulado'] ?></td>
            </tr>
        </tbody>
    </table>
</div>
