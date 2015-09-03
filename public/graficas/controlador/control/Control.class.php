<?php

include_once $PATH . 'modelo/reportes.class.php';

class Control {

    function Control() {
        
    }

    public function _consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c) {
        try {
            $Transferencia = new Reportes();
            return $Transferencia->_consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c);
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function _consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno) {
        try {
            $ReporteFalla7 = new Reportes();
            return $ReporteFalla7->_consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function _consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno) {
        try {
            $ReporteFalla28 = new Reportes();
            return $ReporteFalla28->_consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno);
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function _consultarReporteFallat7($fecha_inicio_c, $fecha_fin_c) {
        try {
            $ReporteFalla7 = new Reportes();
            return $ReporteFalla7->_consultarReportesFallat7($fecha_inicio_c, $fecha_fin_c);
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function _consultarReportesFallat28($fecha_inicio_c, $fecha_fin_c) {
        try {
            $ReporteFalla28 = new Reportes();
            return $ReporteFalla28->_consultarReportesFallat28($fecha_inicio_c, $fecha_fin_c);
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function _consultarDisenos($codigo_diseno) {
        try {
            $Disenos = new Reportes();
            return $Disenos->_consultarDisenos($codigo_diseno);
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function _consultarReportesMixerconsumo($fecha_inicio_c, $fecha_fin_c) {
        try {
            $mixerconsumo = new Reportes();
            return $mixerconsumo->_consultarReportesMixerconsumo($fecha_inicio_c, $fecha_fin_c);
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function _consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo) {
        try {
            $mixerconsumo = new Reportes();
            return $mixerconsumo->_consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo);
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function _consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_c, $fecha_fin_c, $ensayo) {
        try {
            $mixerconsumo = new Reportes();
            return $mixerconsumo->_consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_c, $fecha_fin_c, $ensayo);
        } catch (Exception $e) {
            echo $e;
        }
    }

    public function _consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyecto) {
        try {
            $mixerconsumo = new Reportes();
            return $mixerconsumo->_consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c, $proyecto);
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function _consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_c, $fecha_fin_c, $proyecto) {
        try {
            $mixerconsumo = new Reportes();
            return $mixerconsumo->_consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_c, $fecha_fin_c, $proyecto);
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function _consultarReportesMixerConsumoCementoProy($fecha_inicio_c, $fecha_fin_c) {
        try {
            $mixerconsumo = new Reportes();
            return $mixerconsumo->_consultarReportesMixerConsumoCementoProy($fecha_inicio_c, $fecha_fin_c);
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function _consultarReportesMixerConsumoCementoProyAcum($fecha_inicio_c, $fecha_fin_c) {
        try {
            $mixerconsumo = new Reportes();
            return $mixerconsumo->_consultarReportesMixerConsumoCementoProyAcum($fecha_inicio_c, $fecha_fin_c);
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function _consultarMateriales() {
        try {
            $codigo_materiales = new Reportes();
            return $codigo_materiales->_consultarMateriales();
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function _diseno() {
        try {
            $codigo_diseno = new Reportes();
            return $codigo_diseno->_diseno();
        } catch (Exception $e) {
            echo $e;
        }
    }
    public function _fechaNombreMes($mes) {
        try {
            $mesnombre = new Reportes();
            return $mesnombre->_fechaNombreMes($mes);
        } catch (Exception $e) {
            echo $e;
        }
    }
}
