<?php
include_once '../../configuracion/path.php';
include_once $PATH . 'controlador/control/Control.class.php';
include_once $PATH . 'configuracion/parametros.php';

$control = new Control();
?>
<script type="text/javascript">
    $(function() {
        $('#fallav').highcharts({
            data: {
                table: 'fallavv'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Falla a 28 días por tipo de diseño <br> (<?php echo $nombresme.' '.date('Y');?>)'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Falla a 28 días'
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
<div id="fallav" style="min-width: 300px; height: 400px; margin: 0 auto">
</div>
<div style="display: none;">

    <table id="fallavv">
        <thead>
        <tr>
            <th></th>
            <th>Min</th>
            <th>Max</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th>
                <?php
                $codigo_diseno='07112007';
                if($codigo_diseno=='07112007') {
                $diseno = $control->_consultarDisenos($codigo_diseno);
                echo $diseno[0]['equivalencia'];
                ?><br>
                <?php echo $diseno[0]['acronimo']; ?></th>
            <?php
            $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
            $fecha_fin_c = date('Y') . '-' . $mes . '-31';
            $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
            ?>
            <td><?php echo $resistencia28[0]['miin']; ?></td>
            <td><?php echo $resistencia28[0]['maax'];
                }?></td>
        </tr>

        <tr>
            <th>
                <?php
                $codigo_diseno='10017423';
                if($codigo_diseno=='10017423') {
                $diseno = $control->_consultarDisenos($codigo_diseno);
                echo $diseno[0]['equivalencia'];
                ?><br>
                <?php echo $diseno[0]['acronimo']; ?></th>
            <?php
            $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
            $fecha_fin_c = date('Y') . '-' . $mes . '-31';
            $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
            ?>
            <td><?php echo $resistencia28[0]['miin']; ?></td>
            <td><?php echo $resistencia28[0]['maax'];
                }?></td>
        </tr>
        <tr>
            <th>
                <?php
                $codigo_diseno='10017208-Auto';
                if($codigo_diseno=='10017208-Auto') {
                $diseno = $control->_consultarDisenos($codigo_diseno);
                echo $diseno[0]['equivalencia'];
                ?><br>
                <?php echo $diseno[0]['acronimo']; ?></th>
            <?php
            $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
            $fecha_fin_c = date('Y') . '-' . $mes . '-31';
            $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
            ?>
            <td><?php echo $resistencia28[0]['miin']; ?></td>
            <td><?php echo $resistencia28[0]['maax'];
                }?></td>
        </tr>
        <tr>
            <th>
                <?php
                $codigo_diseno='10017280';
                if($codigo_diseno=='10017280') {
                $diseno = $control->_consultarDisenos($codigo_diseno);
                echo $diseno[0]['equivalencia'];
                ?><br>
                <?php echo $diseno[0]['acronimo']; ?></th>
            <?php
            $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
            $fecha_fin_c = date('Y') . '-' . $mes . '-31';
            $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
            ?>
            <td><?php echo $resistencia28[0]['miin']; ?></td>
            <td><?php echo $resistencia28[0]['maax'];
                }?></td>
        </tr>
        <tr>
            <th>
                <?php
                $codigo_diseno='10017415';
                if($codigo_diseno=='10017415') {
                $diseno = $control->_consultarDisenos($codigo_diseno);
                echo $diseno[0]['equivalencia'];
                ?><br>
                <?php echo $diseno[0]['acronimo']; ?></th>
            <?php
            $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
            $fecha_fin_c = date('Y') . '-' . $mes . '-31';
            $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
            ?>
            <td><?php echo $resistencia28[0]['miin']; ?></td>
            <td><?php echo $resistencia28[0]['maax'];
                }?></td>
        </tr>
        <tr>
            <th>
                <?php
                $codigo_diseno='10017414';
                if($codigo_diseno=='10017414') {
                $diseno = $control->_consultarDisenos($codigo_diseno);
                echo $diseno[0]['equivalencia'];
                ?><br>
                <?php echo $diseno[0]['acronimo']; ?></th>
            <?php
            $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
            $fecha_fin_c = date('Y') . '-' . $mes . '-31';
            $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
            ?>
            <td><?php echo $resistencia28[0]['miin']; ?></td>
            <td><?php echo $resistencia28[0]['maax'];
                }?></td>
        </tr>
        <tr>
            <th>
                <?php
                $codigo_diseno='10017209';
                if($codigo_diseno=='10017209') {
                $diseno = $control->_consultarDisenos($codigo_diseno);
                echo $diseno[0]['equivalencia'];
                ?><br>
                <?php echo $diseno[0]['acronimo']; ?></th>
            <?php
            $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
            $fecha_fin_c = date('Y') . '-' . $mes . '-31';
            $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
            ?>
            <td><?php echo $resistencia28[0]['miin']; ?></td>
            <td><?php echo $resistencia28[0]['maax'];
                }?></td>
        </tr>
        <tr>
            <th>
                <?php
                $codigo_diseno='Postes08';
                if($codigo_diseno=='Postes08') {
                $diseno = $control->_consultarDisenos($codigo_diseno);
                echo $diseno[0]['equivalencia'];
                ?><br>
                <?php echo $diseno[0]['acronimo']; ?></th>
            <?php
            $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
            $fecha_fin_c = date('Y') . '-' . $mes . '-31';
            $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
            ?>
            <td><?php echo $resistencia28[0]['miin']; ?></td>
            <td><?php echo $resistencia28[0]['maax'];
                }?></td>
        </tr>
    </table>
</div>
