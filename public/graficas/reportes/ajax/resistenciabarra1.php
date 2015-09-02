<?php
include_once '../../configuracion/path.php';
include_once $PATH . 'controlador/control/Control.class.php';
include_once $PATH . 'configuracion/parametros.php';

$control = new Control();
?>
<script type="text/javascript">
    $(function() {
        $('#transferencia').highcharts({
            data: {
                table: 'trans'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Transferencia por tipo de diseño <br> (<?php echo $nombresme.' '.date('Y');?>)'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Transferencia'
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
<div id="transferencia" style="min-width: 300px; height: 400px; margin: 0 auto">
</div>
<div style="display: none;">

    <table id="trans">
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
            $mixerconsumo = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
            ?>
            <td><?php echo $resistenciat[0]['miin']; ?></td>
            <td><?php echo $resistenciat[0]['maax'];
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
            $mixerconsumo = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
            ?>
            <td><?php echo $resistenciat[0]['miin']; ?></td>
            <td><?php echo $resistenciat[0]['maax'];
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
            $mixerconsumo = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
            ?>
            <td><?php echo $resistenciat[0]['miin']; ?></td>
            <td><?php echo $resistenciat[0]['maax'];
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
            $mixerconsumo = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
            ?>
            <td><?php echo $resistenciat[0]['miin']; ?></td>
            <td><?php echo $resistenciat[0]['maax'];
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
            $mixerconsumo = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
            ?>
            <td><?php echo $resistenciat[0]['miin']; ?></td>
            <td><?php echo $resistenciat[0]['maax'];
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
            $mixerconsumo = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
            ?>
            <td><?php echo $resistenciat[0]['miin']; ?></td>
            <td><?php echo $resistenciat[0]['maax'];
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
            $mixerconsumo = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
            ?>
            <td><?php echo $resistenciat[0]['miin']; ?></td>
            <td><?php echo $resistenciat[0]['maax'];
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
            $mixerconsumo = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
            ?>
            <td><?php echo $resistenciat[0]['miin']; ?></td>
            <td><?php echo $resistenciat[0]['maax'];
                }?></td>
        </tr>
    </table>
</div>
