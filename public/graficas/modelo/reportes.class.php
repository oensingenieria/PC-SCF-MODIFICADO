<?php

include_once $PATH . 'conexion/conexion.class.php';

class Reportes extends Conexion {

    private $link;

    function Reportes() {
        
    }
//Consultas para los Reportes de Resistencias
    public function _consultarReportesTransferencia($fecha_inicio_c, $fecha_fin_c) {
        $link = self::conectarse();
        $array = array();
        $i = 0;
        $busqueda = mysqli_query($link , "SELECT
                                    a.id,
                                    a.Codigo_Diseno,
                                    min(a.Resis_Promedio) AS miin,
                                    max(a.Resis_Promedio) AS maax,
                                    b.acronimo,
                                    b.equivalencia
                                FROM
                                    transferencia a,
                                    disenos b
                                WHERE
                                    a.Fecha_Falla between '$fecha_inicio_c' AND '$fecha_fin_c'
                                AND a.Codigo_Diseno=b.codigo
                                ORDER BY a.Codigo_Diseno");
        if (!(@mysqli_num_rows($busqueda) == 0)) {
            while ($row = mysqli_fetch_array($busqueda)) {
                $array[$i] = $row;
                $i++;
            }
            return $array;
        }
    }
    public function _consultarReporteFalla7($fecha_inicio_c, $fecha_fin_c, $codigo_diseno) {
        $link = self::conectarse();
        $array = array();
        $i = 0;
        $busqueda = mysqli_query($link ,"SELECT
                                    a.id,
                                    a.Codigo_Diseno,
                                    min(a.Resis_Promedio) AS miin,
                                    max(a.Resis_Promedio) AS maax,
                                    b.acronimo,
                                    b.equivalencia
                                FROM
                                    falla7 a,
                                    disenos b
                                WHERE
                                    a.Fecha_Falla between '$fecha_inicio_c' AND '$fecha_fin_c'
                                AND a.Codigo_Diseno=b.codigo
                                AND a.Codigo_Diseno='$codigo_diseno'
                                ORDER BY a.Codigo_Diseno");
        if (!(@mysqli_num_rows($busqueda) == 0)) {
            while ($row = mysqli_fetch_array($busqueda)) {
                $array[$i] = $row;
                $i++;
            }
            return $array;
        }
    }

    public function _consultarReportesFalla28($fecha_inicio_c, $fecha_fin_c, $codigo_diseno) {
        $link = self::conectarse();
        $array = array();
        $i = 0;
        $busqueda = mysqli_query($link ,"SELECT
                                    a.id,
                                    a.Codigo_Diseno,
                                    min(a.Resis_Promedio) AS miin,
                                    max(a.Resis_Promedio) AS maax,
                                    b.acronimo,
                                    b.equivalencia
                                FROM
                                    falla28 a,
                                    disenos b
                                WHERE
                                    a.Fecha_Falla between '$fecha_inicio_c' AND '$fecha_fin_c'
                                AND a.Codigo_Diseno=b.codigo
                                AND a.Codigo_Diseno='$codigo_diseno'
                                ORDER BY a.Codigo_Diseno");
        if (!(@mysqli_num_rows($busqueda) == 0)) {
            while ($row = mysqli_fetch_array($busqueda)) {
                $array[$i] = $row;
                $i++;
            }
            return $array;
        }
    }
    public function _consultarReportesFallat7($fecha_inicio_c, $fecha_fin_c) {
        $link = self::conectarse();
        $array = array();
        $i = 0;
        $busqueda = mysqli_query($link ,"SELECT a.id FROM falla7 a WHERE a.Fecha_Falla between '$fecha_inicio_c' AND '$fecha_fin_c'");
        if (!(@mysqli_num_rows($busqueda) == 0)) {
            while ($row = mysqli_fetch_array($busqueda)) {
                $array[$i] = $row;
                $i++;
            }
            return $array;
        }
    }
    public function _consultarReportesFallat28($fecha_inicio_c, $fecha_fin_c) {
        $link = self::conectarse();
        $array = array();
        $i = 0;
        $busqueda = mysqli_query($link ,"SELECT a.id FROM falla28 a WHERE a.Fecha_Falla between '$fecha_inicio_c' AND '$fecha_fin_c'");
        if (!(@mysqli_num_rows($busqueda) == 0)) {
            while ($row = mysqli_fetch_array($busqueda)) {
                $array[$i] = $row;
                $i++;
            }
            return $array;
        }
    }
//Fin Consultas para los Reportes de Resistencias
//Consultas para los Reportes de Consumo de Agregados
//Funcion para consulta general de Agregados Y Cemento
    public function _consultarReportesMixerconsumo($fecha_inicio_c, $fecha_fin_c) {
        $link = self::conectarse();
        $array = array();
        $i = 0;
        $busqueda = mysqli_query($link ,"SELECT
                                    a.id AS cont,
                                    a.Codigo_Material,
                                    a.Fecha_de_Carga,
                                    a.Cantidad_Total AS suma,
                                    b.nombre_material,
                                    b.unidad
                                FROM
                                    mixerconsumo a,
                                    materiales b
                                WHERE
                                    a.Fecha_de_Carga between '$fecha_inicio_c' AND '$fecha_fin_c'
                                AND a.Codigo_Material=b.Codigo_Material
                                ORDER BY a.Codigo_Material");
        if (!(@mysqli_num_rows($busqueda) == 0)) {
            while ($row = mysqli_fetch_array($busqueda)) {
                $array[$i] = $row;
                $i++;
            }
            return $array;
        }
    }
//Fin Funcion para consulta general de Agregados Y Cemento
//Funcion para consulta Agregados por tipo de ensayo
    public function _consultarReportesMixerconsumoPorEnsayo($fecha_inicio_c, $fecha_fin_c, $ensayo) {
        $link = self::conectarse();
        $array = array();
        $i = 0;
        $busqueda = mysqli_query($link ,"SELECT
                                    a.Codigo_Material,
                                    a.Fecha_de_Carga,
                                    a.Cantidad_Total,
                                    a.Fecha_de_Carga,
                                    count(a.id) AS cont,
                                    sum(a.Cantidad_Total) AS suma_total,
                                    b.nombre_material,
                                    b.unidad
                                FROM
                                    mixerconsumo a,
                                    materiales b
                                WHERE
                                    a.Fecha_de_Carga between '$fecha_inicio_c' AND '$fecha_fin_c'
                                AND a.Codigo_Material=b.Codigo_Material
                                AND a.Codigo_Material='$ensayo'
                                ORDER BY a.Codigo_Material");
        if (!(@mysqli_num_rows($busqueda) == 0)) {
            while ($row = mysqli_fetch_array($busqueda)) {
                $array[$i] = $row;
                $i++;
            }
            return $array;
        }
    }
//Fin Funcion para consulta Agregados por tipo de ensayo
//Funcion para consulta Agregados por tipo de ensayo acumulado
    public function _consultarReportesMixerPorEnsayoAcumulado($fecha_inicio_c, $fecha_fin_c, $ensayo) {
        $link = self::conectarse();
        $array = array();
        $i = 0;
        $busqueda = mysqli_query($link ,"SELECT
                                    a.Fecha_de_Carga,
                                    count(a.id) AS cont,
                                    sum(a.Cantidad_Total) AS acumulado
                                FROM
                                    mixerconsumo a
                                WHERE
                                    a.Fecha_de_Carga between '$fecha_inicio_c' AND '$fecha_fin_c'
                                AND a.Codigo_Material='$ensayo' 
                                ORDER BY a.Codigo_Material");
        if (!(@mysqli_num_rows($busqueda) == 0)) {
            while ($row = mysqli_fetch_array($busqueda)) {
                $array[$i] = $row;
                $i++;
            }
            return $array;
        }
    }
//Fin Funcion para consulta Agregados por tipo de ensayo acumulado
//Fin Consultas para los Reportes de Consumo de Agregados
//Consultas para los Reportes de Consumo de Cementos
//Funcion para consulta Cemento por tipo de departamento
    public function _consultarReportesMixerConsumoCemento($fecha_inicio_c, $fecha_fin_c,$proyecto) {
        $link = self::conectarse();
        $array = array();
        $i = 0;
        $busqueda = mysqli_query($link,"SELECT
                                    a.id AS cont,
                                    a.Codigo_Proyecto,
                                    a.Nombre_Proyecto AS elemento,
                                    a.Codigo_Material,
                                    sum(a.Cantidad_Total) AS ccementomes,
                                    sum(a.Volumen_de_Carga) AS volumen
                                FROM
                                    mixerconsumo a
                                WHERE
                                    a.Fecha_de_Carga between '$fecha_inicio_c' AND '$fecha_fin_c'
                                AND a.Codigo_Proyecto='$proyecto'
                                AND a.Codigo_Material='10014510'
                                ORDER BY a.Codigo_Proyecto");
        if (!(@mysqli_num_rows($busqueda) == 0)) {
            while ($row = mysqli_fetch_array($busqueda)) {
                $array[$i] = $row;
                $i++;
            }
            return $array;
        }
    }
//Fin Funcion para consulta Cemento por tipo de departamento
//Funcion para consulta Cemento por tipo de departamento acumulado
    public function _consultarReportesMixerConsumoCementoAcumulado($fecha_inicio_c, $fecha_fin_c,$proyecto) {
        $link = self::conectarse();
        $array = array();
        $i = 0;
        $busqueda = mysqli_query($link ,"SELECT
                                    a.id AS cont,
                                    sum(a.Cantidad_Total) AS acumulado
                                FROM
                                    mixerconsumo a
                                WHERE
                                    a.Fecha_de_Carga between '$fecha_inicio_c' AND '$fecha_fin_c'
                                AND a.Codigo_Proyecto='$proyecto'
                                AND a.Codigo_Material='10014510'
                                ORDER BY a.Codigo_Proyecto");
        if (!(@mysqli_num_rows($busqueda) == 0)) {
            while ($row = mysqli_fetch_array($busqueda)) {
                $array[$i] = $row;
                $i++;
            }
            return $array;
        }
    }
//Fin Funcion para consulta Cemento por tipo de departamento acumulado
//Funcion para consulta Cemento sin tipo de departamento definido
    public function _consultarReportesMixerConsumoCementoProy($fecha_inicio_c, $fecha_fin_c) {
        $link = self::conectarse();
        $array = array();
        $i = 0;
        $busqueda = mysqli_query($link ,"SELECT
                                    a.id AS cont,
                                    a.Codigo_Proyecto,
                                    a.Nombre_Proyecto AS elemento,
                                    a.Codigo_Material,
                                    sum(a.Cantidad_Total) AS ccementomes,
                                    sum(a.Volumen_de_Carga) AS volumen
                                FROM
                                    mixerconsumo a
                                WHERE
                                    a.Fecha_de_Carga between '$fecha_inicio_c' AND '$fecha_fin_c'
                                AND a.Codigo_Proyecto!='POSTES'
                                AND a.Codigo_Proyecto!='VIGUETAS06'
                                AND a.Codigo_Proyecto!='18012012'
                                AND a.Codigo_Material='10014510'
                                ORDER BY a.Codigo_Proyecto");
        if (!(@mysqli_num_rows($busqueda) == 0)) {
            while ($row = mysqli_fetch_array($busqueda)) {
                $array[$i] = $row;
                $i++;
            }
            return $array;
        }
    }
//Fin Funcion para consulta Cemento sin tipo de departamento definido
//Funcion para consulta Cemento sin tipo de departamento definido acumulado
    public function _consultarReportesMixerConsumoCementoProyAcum($fecha_inicio_c, $fecha_fin_c) {
        $link = self::conectarse();
        $array = array();
        $i = 0;
        $busqueda = mysqli_query($link , "SELECT
                                    a.id AS cont,
                                    sum(a.Cantidad_Total) AS acumulado
                                FROM
                                    mixerconsumo a
                                WHERE
                                    a.Fecha_de_Carga between '$fecha_inicio_c' AND '$fecha_fin_c'
                                AND a.Codigo_Proyecto!='POSTES'
                                AND a.Codigo_Proyecto!='VIGUETAS06'
                                AND a.Codigo_Proyecto!='18012012'
                                AND a.Codigo_Material='10014510'
                                ORDER BY a.Codigo_Proyecto");
        if (!(@mysqli_num_rows($busqueda) == 0)) {
            while ($row = mysqli_fetch_array($busqueda)) {
                $array[$i] = $row;
                $i++;
            }
            return $array;
        }
    }
//Fin Funcion para consulta Cemento sin tipo de departamento definido acumulado
//Fin Consultas para los Reportes de Consumo de Cementos
//Consultas de materiales
    public function _consultarMateriales() {
        $link = self::conectarse();
        $array = array();
        $i = 0;
        $busqueda = mysqli_query($link , "SELECT * FROM materiales ORDER BY nombre_material");
        if (!(@mysqli_num_rows($busqueda) == 0)) {
            while ($row = mysqli_fetch_array( $busqueda)) {
                $array[$i] = $row;
                $i++;
            }
            return $array;
        }
    }
//Fin Consultas de materiales
//Consultas de disenos
    public function _consultarDisenos($codigo_diseno) {
        $link = self::conectarse();
        $array = array();
        $i = 0;
        $busqueda = mysqli_query($link , "SELECT acronimo, equivalencia FROM disenos WHERE codigo='$codigo_diseno' ORDER BY codigo");
        if (!(@mysqli_num_rows($busqueda) == 0)) {
            while ($row = mysqli_fetch_array($busqueda)) {
                $array[$i] = $row;
                $i++;
            }
            return $array;
        }
    }
//Fin Consultas de disenos
//Funcion para imprimir el nombre del mes según el seleccionado
    public function _fechaNombreMes($mes) {
        try {
            if ($mes == 1) {
                $nommes = 'Enero';
            }
            if ($mes == 2) {
                $nommes = 'Febrero';
            }
            if ($mes == 3) {
                $nommes = 'Marzo';
            }
            if ($mes == 4) {
                $nommes = 'Abril';
            }
            if ($mes == 5) {
                $nommes = 'Mayo';
            }
            if ($mes == 6) {
                $nommes = 'Junio';
            }
            if ($mes == 7) {
                $nommes = 'Julio';
            }
            if ($mes == 8) {
                $nommes = 'Agosto';
            }
            if ($mes == 9) {
                $nommes = 'Septiembre';
            }
            if ($mes == 10) {
                $nommes = 'Octubre';
            }
            if ($mes == 11) {
                $nommes = 'Noviembre';
            }
            if ($mes == 12) {
                $nommes = 'Diciembre';
            }

            return $nommes;
        } catch (Exception $e) {
            echo 'Error al dar formato a la fecha';
        }
    }
//Fin Funcion para imprimir el nombre del mes según el seleccionado

}
