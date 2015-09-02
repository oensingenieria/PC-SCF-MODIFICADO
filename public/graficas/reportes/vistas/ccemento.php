<?php
include_once '../../configuracion/path.php';
include_once $PATH . 'controlador/control/Control.class.php';
include_once $PATH . 'configuracion/parametros.php';

?>
<script src="../publico/js/funciones.js"></script>
<div class="row setup-content" id="step-1">
    <form id="form-step-1" class="form-step-1" enctype="multipart/form-data">
        <div class="bv_reportes">Reportes de Consumo de Cemento</div>
        <table style="width: 100%">
            <tr>
                <td>
                    <span style="text-align: left;"><strong>Descripci&oacute;n</strong></span>
                </td>
                <td>
                    <span style="text-align: left;"><strong>Mes Consultar</strong></span>
                </td>
            </tr>
            <tr>
                <td>
                    <select name="ensayo" id="ensayo" class="form-control">
                        <option value="e">--Seleccione--</option>
                        <option value="POSTES">Postes</option>
                        <option value="VIGUETAS06">Viguetas</option>
                        <option value="18012012">Losalex</option>
                        <option value="todos">Todos</option>
                    </select>
                </td>

                <td>
                    <select name="mes" id="mes" class="form-control" >
                        <option value="s">Seleccione</option>
                        <option value="1">Enero</option>
                        <option value="2">Febrero</option>
                        <option value="3">Marzo</option>
                        <option value="4">Abril</option>
                        <option value="5">Mayo</option>
                        <option value="6">Junio</option>
                        <option value="7">Julio</option>
                        <option value="8">Agosto</option>
                        <option value="9">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </td>
                <td>
                    <a id="buscar_mes_cemento" class="boton_reportes_1 btn btn-primary btn-lg">Buscar</a>
                </td>
            </tr>
        </table>
    </form>
    <div id="contenedor_informacion">
    </div>
</div>

