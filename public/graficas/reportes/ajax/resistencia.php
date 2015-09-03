<?php
include_once '../../configuracion/path.php';
include_once $PATH . 'controlador/control/Control.class.php';
include_once $PATH . 'configuracion/parametros.php';

$control = new Control();
$ensayo = $_POST['ensayo'];
$caso = $_POST['caso'];
if ($caso == 1) {
    $fecha_inicio_c = $_POST['fecha_inicio'];
    $fecha_fin_c = $_POST['fecha_fin'];
    $ultimomes = explode("-", $fecha_fin_c);
    $mes = $ultimomes[1];
}
if ($caso == 2) {
    $mes = $_POST['mes'];
    $fecha_inicio_c = date('Y') . '-' . $mes . '-01';
    $fecha_fin_c = date('Y') . '-' . $mes . '-31';
}

$nombresme = $control->_fechaNombreMes($mes);

if ($ensayo == 'todos') {
    $resistenciat = $control->_consultarReporteFallat7($fecha_inicio_c, $fecha_fin_c);
}
if ($ensayo != 'todos') {
    if ($ensayo == 'transferencia') {
        $ensayonom = 'Tranferencia';
        $resistenciat = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
    }
    if ($ensayo == 'falla7') {
        $ensayonom = 'Falla 7 d&iacute;as';
        $resistenciat = $control->_consultarReporteFallat7($fecha_inicio_c, $fecha_fin_c);
    }
    if ($ensayo == 'falla28') {
        $ensayonom = 'Falla 28 d&iacute;as';
        $resistenciat = $control->_consultarReportesFallat28($fecha_inicio_c, $fecha_fin_c);
    }
}
?>
<body>
    <div class="row setup-content" id="step-1">
        <form id="form-step-1" class="form-step-1" enctype="multipart/form-data">
            <div class="col-xs-12">
                <div class="col-md-12 well">
                    <?php
                    if ($resistenciat[0]['id'] != '') {
                        ?>
                        <table width="100%">
                            <tr>
                                <td>
                                    <div id="tablewrapper">
                                        <table cellpadding="0" cellspacing="0" border="0" id="table" class="tinytable">
                                            <thead>
                                                <?php
                                                if ($ensayo != 'todos') {
                                                    ?>
                                                    <tr>
                                                        <th colspan="2"><?php echo $nombresme ?></th>
                                                        <th colspan="2"><?php echo $ensayonom ?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>Dise&ntilde;o</th>
                                                        <th>Resist.Nominal</th>
                                                        <th rowspan="2">Min</th>
                                                        <th rowspan="2">Max</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Tipo Concreto</th>
                                                        <th>Kg/cm2</th>
                                                    </tr>
                                                    <?php
                                                    $codigo_diseno = '07112007';
                                                    if ($codigo_diseno == '07112007') {
                                                        if ($ensayo == 'transferencia') {
                                                            $resistencia = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        }

                                                        if ($ensayo == 'falla7') {
                                                            $resistencia = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($ensayo == 'falla28') {
                                                            $resistencia = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($resistencia[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    } $codigo_diseno = '10017423';
                                                    if ($codigo_diseno == '10017423') {
                                                        if ($ensayo == 'transferencia') {
                                                            $resistencia = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        }

                                                        if ($ensayo == 'falla7') {
                                                            $resistencia = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($ensayo == 'falla28') {
                                                            $resistencia = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($resistencia[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    $codigo_diseno = '10017207';
                                                    if ($codigo_diseno == '10017207') {
                                                        if ($ensayo == 'transferencia') {
                                                            $resistencia = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        }

                                                        if ($ensayo == 'falla7') {
                                                            $resistencia = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($ensayo == 'falla28') {
                                                            $resistencia = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($resistencia[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    $codigo_diseno = '10017208-Auto';
                                                    if ($codigo_diseno == '10017208-Auto') {
                                                        if ($ensayo == 'transferencia') {
                                                            $resistencia = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        }

                                                        if ($ensayo == 'falla7') {
                                                            $resistencia = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($ensayo == 'falla28') {
                                                            $resistencia = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($resistencia[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    $codigo_diseno = '10017280';
                                                    if ($codigo_diseno == '10017280') {
                                                        if ($ensayo == 'transferencia') {
                                                            $resistencia = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        }

                                                        if ($ensayo == 'falla7') {
                                                            $resistencia = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($ensayo == 'falla28') {
                                                            $resistencia = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($resistencia[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    $codigo_diseno = '10017415';
                                                    if ($codigo_diseno == '10017415') {
                                                        if ($ensayo == 'transferencia') {
                                                            $resistencia = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        }

                                                        if ($ensayo == 'falla7') {
                                                            $resistencia = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($ensayo == 'falla28') {
                                                            $resistencia = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($resistencia[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    $codigo_diseno = '10017414';
                                                    if ($codigo_diseno == '10017414') {
                                                        if ($ensayo == 'transferencia') {
                                                            $resistencia = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        }

                                                        if ($ensayo == 'falla7') {
                                                            $resistencia = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($ensayo == 'falla28') {
                                                            $resistencia = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($resistencia[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    $codigo_diseno = '10017209';
                                                    if ($codigo_diseno == '10017209') {
                                                        if ($ensayo == 'transferencia') {
                                                            $resistencia = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        }

                                                        if ($ensayo == 'falla7') {
                                                            $resistencia = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($ensayo == 'falla28') {
                                                            $resistencia = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($resistencia[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    $codigo_diseno = 'Postes08';
                                                    if ($codigo_diseno == 'Postes08') {
                                                        if ($ensayo == 'transferencia') {
                                                            $resistencia = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        }

                                                        if ($ensayo == 'falla7') {
                                                            $resistencia = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($ensayo == 'falla28') {
                                                            $resistencia = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        }
                                                        if ($resistencia[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                if ($ensayo == 'todos') {
                                                    ?>
                                                    <tr>
                                                        <th colspan="2"><?php echo $nombresme ?></th>
                                                        <th colspan="2">Transferencia</th>
                                                        <th colspan="2">7 D&iacute;as</th>
                                                        <th colspan="2">28 D&iacute;as</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Dise&ntilde;o</th>
                                                        <th>Resist.Nominal</th>
                                                        <th rowspan="2">Min</th>
                                                        <th rowspan="2">Max</th>
                                                        <th rowspan="2">Min</th>
                                                        <th rowspan="2">Max</th>
                                                        <th rowspan="2">Min</th>
                                                        <th rowspan="2">Max</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Tipo Concreto</th>
                                                        <th>Kg/cm2</th>
                                                    </tr>
                                                    <?php
                                                    $codigo_diseno = '07112007';
                                                    if ($codigo_diseno == '07112007') {
                                                        $resistenciat = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        $resistencia7 = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $diseno = $control->_consultarDisenos($codigo_diseno);
                                                        if ($resistenciat[0]['id'] != '' || $resistencia7[0]['id'] != '' || $resistencia28[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    $codigo_diseno = '10017423';
                                                    if ($codigo_diseno == '10017423') {
                                                        $resistenciat = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        $resistencia7 = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $diseno = $control->_consultarDisenos($codigo_diseno);
                                                        if ($resistenciat[0]['id'] != '' || $resistencia7[0]['id'] != '' || $resistencia28[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    $codigo_diseno = '10017207';
                                                    if ($codigo_diseno == '10017207') {
                                                        $resistenciat = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        $resistencia7 = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $diseno = $control->_consultarDisenos($codigo_diseno);
                                                        if ($resistenciat[0]['id'] != '' || $resistencia7[0]['id'] != '' || $resistencia28[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    $codigo_diseno = '10017208-Auto';
                                                    if ($codigo_diseno == '10017208-Auto') {
                                                        $resistenciat = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        $resistencia7 = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $diseno = $control->_consultarDisenos($codigo_diseno);
                                                        if ($resistenciat[0]['id'] != '' || $resistencia7[0]['id'] != '' || $resistencia28[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    $codigo_diseno = '10017280';
                                                    if ($codigo_diseno == '10017280') {
                                                        $resistenciat = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        $resistencia7 = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $diseno = $control->_consultarDisenos($codigo_diseno);

                                                        if ($resistenciat[0]['id'] != '' || $resistencia7[0]['id'] != '' || $resistencia28[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    $codigo_diseno = '10017415';
                                                    if ($codigo_diseno == '10017415') {
                                                        $resistenciat = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        $resistencia7 = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $diseno = $control->_consultarDisenos($codigo_diseno);

                                                        if ($resistenciat[0]['id'] != '' || $resistencia7[0]['id'] != '' || $resistencia28[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    $codigo_diseno = '10017414';
                                                    if ($codigo_diseno == '10017414') {
                                                        $resistenciat = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        $resistencia7 = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $diseno = $control->_consultarDisenos($codigo_diseno);

                                                        if ($resistenciat[0]['id'] != '' || $resistencia7[0]['id'] != '' || $resistencia28[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    $codigo_diseno = '10017209';
                                                    if ($codigo_diseno == '10017209') {
                                                        $resistenciat = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        $resistencia7 = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $diseno = $control->_consultarDisenos($codigo_diseno);

                                                        if ($resistenciat[0]['id'] != '' || $resistencia7[0]['id'] != '' || $resistencia28[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['maax']; ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                    }
                                                    $codigo_diseno = 'Postes08';
                                                    if ($codigo_diseno == 'Postes08') {
                                                        $resistenciat = $control->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
                                                        $resistencia7 = $control->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $resistencia28 = $control->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
                                                        $diseno = $control->_consultarDisenos($codigo_diseno);

                                                        if ($resistenciat[0]['id'] != '' || $resistencia7[0]['id'] != '' || $resistencia28[0]['id'] != '') {
                                                            ?>
                                                            <tr>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['acronimo']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $diseno[0]['equivalencia']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistenciat[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia7[0]['maax']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['miin']; ?></td>
                                                                <td align="center"
                                                                    valign="middle"><?php echo $resistencia28[0]['maax']; ?></td>
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
                                <td height="24" colspan="6" align="center">
                                    <span>No se encontraron datos que mostrar</span></td>
                            </tr>
                        </table>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </form>
        <table style="width: 100%;">
            <tr>
                <td>
                    <?php include_once 'resistenciabarra1.php'; ?>
                </td>
                <td>
                    <?php include_once 'resistenciabarra2.php'; ?>
                </td>
                <td>
                    <?php include_once 'resistenciabarra3.php'; ?>
                </td>
            </tr>
        </table>
    </div>
</body>
